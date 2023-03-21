<div>
    <div class="card-body">
    @if(session()->has('message'))

<div class="alert alert-success">
    {{session('message')}}
</div>

@endif
<div class=" me-3 my-3 text-end">
        <a class="btn bg-gradient-dark mb-0" href="manage-category"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage
            Category
        </a>
    </div>

        <form enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="name" required>
            </div>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label class="form-label">Category Image</label>
                <input type="file" class="form-control border border-2 p-2" wire:model="image" required>
            </div>
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <select class="form-control border border-2 p-2" wire:model="status">
                    <option hidden>Status</option>
                    <option value="1">Ready</option>
                    <option value="0">not-ready</option>
                </select>

            </div>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="text-center">
                <button type="submit" wire:click.prevent="store()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add Category</button>
            </div>
        </form>

    </div>
</div>