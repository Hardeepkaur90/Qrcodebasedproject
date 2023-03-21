<div>
    <div class="card-body">
        @if(session()->has('message'))

        <div class="alert alert-success">
            {{session('message')}}
        </div>

        @endif
        <div class=" me-3 my-3 text-end">
            <a class="btn bg-gradient-dark mb-0" href="manage-table"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage Table
            </a>
        </div>

        <form>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="name" required>
            </div>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="description" required>
            </div>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="text-center">
                <button type="submit" wire:click.prevent="store()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add Table</button>
            </div>
        </form>

    </div>


</div>