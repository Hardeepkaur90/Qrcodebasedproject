<div>

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <div class="container-fluid">
        <div class="d-flex me-3 my-3 justify-content-between align-items-center">
            <h5 class="font-weight-bolder mb-0 text-capitalize"> <a class="btn btn-primary mb-0" href="manageitem"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage
                Item
            </a></h5>
           
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row" style="min-height:calc(100vh - 310px)">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="item-add" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Item Name</label>
                                    <input type="text" class="form-control border border-2 p-2" wire:model="title" required>
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Item Image</label>
                                    <input type="file" accept="image/*" class="form-control border border-2 p-2" wire:model="image" required>
                                    @error('image') <span class=" text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Choose Category</label>
                                    <select class="form-control border border-2 p-2" wire:model="type" id="category">
                                        <option hidden>Choose Category</option>
                                        @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control border border-2 p-2" wire:model="price" required>
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" class="form-control border border-2 p-2" wire:model="quentity" required>
                                    @error('quentity') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cooking</label>
                                    <input type="text" class="form-control border border-2 p-2" wire:model="cooking" required>
                                    @error('cooking') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Content</label>
                                    <input type="text" class="form-control border border-2 p-2" wire:model="content" required>
                                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Instructions</label>
                                    <input type="text" class="form-control border border-2 p-2" wire:model="instructions" required>
                                    @error('instructions') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Select Status</label>
                                    <select class="form-control border border-2 p-2" wire:model="status">
                                        <option hidden>Status</option>
                                        <option value="1">Ready</option>
                                        <option value="0">not-ready</option>
                                    </select>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Discount</label>
                                    <input type="text" class="form-control border border-2 p-2" wire:model="discount" required>
                                    @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="width:100%; max-width:200px;">
                                        <button type="submit" wire:click.prevent="store()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add Item</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>