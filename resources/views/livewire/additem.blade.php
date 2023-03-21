<div>

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <div class=" me-3 my-3 text-end">
        <a class="btn bg-gradient-dark mb-0" href="manageitem"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage
            Item
        </a>
    </div>
    <div class="card-body">
        <form id="item-add" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Item Name</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="title" required>

            </div>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <input type="file" accept="image/*" class="form-control border border-2 p-2" wire:model="image" required>

            </div>
            @error('image') <span class=" text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">

           

            <select class="form-control border border-2 p-2" wire:model="type" id="category">
                            <option hidden>Choose Category</option>
                            @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
              

            </div>
            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
            <div class=" mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="price" required>

            </div>
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="mb-3">
                <label class="form-label">Quentity</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="quentity" required>

            </div>
            @error('quentity') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label class="form-label">Cooking</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="cooking" required>

            </div>
            @error('cooking') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label class="form-label">Content</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="content" required>

            </div>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label class="form-label">Instructions</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="instructions" required>

            </div>
            @error('instructions') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <select class="form-control border border-2 p-2" wire:model="status">
                    <option hidden>Status</option>
                    <option value="1">Ready</option>
                    <option value="0">not-ready</option>
                </select>

            </div>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label class="form-label">Discount</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="discount" required>

            </div>
            @error('discount') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="text-center">
                <button type="submit" wire:click.prevent="store()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add Item</button>
            </div>
        </form>

    </div>
</div>