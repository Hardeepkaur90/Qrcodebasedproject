<div>
    <div>
    @if(session()->has('message'))

<div class="alert alert-success">
    {{session('message')}}
</div>

@endif

    <div class="container-fluid">
        <div class="d-flex me-3 my-3 justify-content-between align-items-center">
            <h5 class="font-weight-bolder mb-0 text-capitalize">Add Category</h5>
            <a class="btn btn-primary mb-0" href="manage-category"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage Category</a>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="row" style="min-height:calc(100vh - 310px)">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" class="form-control border border-2 p-2" wire:model="name" required>
                                    </div>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Category Image</label>
                                        <input type="file" class="form-control border border-2 p-2" wire:model="image" required>
                                    </div>
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-control border border-2 p-2" wire:model="status">
                                            <option hidden>Status</option>
                                            <option value="1">Ready</option>
                                            <option value="0">not-ready</option>
                                        </select>
                                    </div>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="width:100%; max-width:200px;">
                                        <button type="submit" wire:click.prevent="store()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add Category</button>
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
</div>