<div>
    <div class="container-fluid">
        <div class="d-flex me-3 my-3 justify-content-between align-items-center">
            <h5 class="font-weight-bolder mb-0 text-capitalize">Add Table</h5>
            <a class="btn btn-primary mb-0" href="manage-table"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage Table</a>
        </div>
    </div>
    <div>
        @if(session()->has('message'))

        <div class="alert alert-success">
            {{session('message')}}
        </div>

        @endif

        <div class="container-fluid py-4">
            <div class="row" style="min-height:calc(100vh - 310px)">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control border border-2 p-2" wire:model="name" required>
                                    </div>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control border border-2 p-2" wire:model="description" required>
                                    </div>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div style="max-width:200px"><button type="submit" wire:click.prevent="store()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add Table</button></div>
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