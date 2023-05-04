<div>

    @if(session()->has('message'))

    <div class="alert alert-success">
        {{session('message')}}
    </div>

    @endif

    <div class="container-fluid">
        <div class="d-flex me-3 my-3 justify-content-between align-items-center">
            <h5 class="font-weight-bolder mb-0 text-capitalize">Edit Item</h5>
            <a class="btn btn-primary mb-0" href="{{ URL::route('manageitem'); }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage
            Item
        </a>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="row" style="min-height:calc(100vh - 310px)">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form wire.submit.prevent="edititem" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Item Name</label>
                                        <input type="text"  class="form-control border border-2 p-2"  wire:model="title" >
                                    </div>
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" accept="image/*" class="form-control border border-2 p-2" wire:model="image" required>

                                    </div>
                                    @error('image') <span class=" text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <!-- <select class="form-control border border-2 p-2" wire:model="type"   id="category">
                                        <option hidden>Choose Category</option>
                                        <option value="veg">VEG</option>
                                        <option value="non-veg">NON-VEG</option>
                                    </select> -->
                                    <label class="form-label">Select Category</label>
                                    <select class="form-control border border-2 p-2" wire:model="type" id="category">
                                                <option hidden>Choose Category</option>
                                                @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>


                                    </div>
                                    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control border border-2 p-2" wire:model="price" required>
                                    </div>
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" class="form-control border border-2 p-2" wire:model="quentity" required>
                                    </div>
                                    @error('quentity') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Cooking</label>
                                        <input type="text" class="form-control border border-2 p-2"   wire:model="cooking" required>

                                    </div>
                                    @error('cooking') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Content</label>
                                        <input type="text" class="form-control border border-2 p-2"  wire:model="content" required>
                                    </div>
                                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Instructions</label>
                                        <input type="text" class="form-control border border-2 p-2"  wire:model="instructions" required>
                                    </div>
                                    @error('instructions') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Select Status</label>
                                        <select class="form-control border border-2 p-2" wire:model="status">
                                            <option hidden>Status</option>
                                            <option value="1">Ready</option>
                                            <option value="0">not-ready</option>
                                        </select>
                                    </div>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Discount</label>
                                        <input type="text" class="form-control border border-2 p-2" wire:model="discount" required>
                                    </div>
                                    @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div style="width:100%; max-width:200px;">
                                        <button type="submit" wire:click.prevent="edit()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">update Item</button>
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