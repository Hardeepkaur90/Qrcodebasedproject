<div>
    <div class="card-body">
        
    @if(session()->has('message'))

<div class="alert alert-success">
    {{session('message')}}
</div>

@endif

    <div class="container-fluid">
        <div class="d-flex me-3 my-3 justify-content-between align-items-center">
            <h5 class="font-weight-bolder mb-0 text-capitalize">Add Chef</h5>
            <a class="btn btn-primary mb-0" href="chef-management"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage
            Chef
        </a>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="row" style="min-height:calc(100vh - 310px)">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form >
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
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control border border-2 p-2" wire:model="phone" required>
                                    </div>
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control border border-2 p-2" wire:model="email" required>
                                    </div>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="email" class="form-control border border-2 p-2" wire:model="location" required>
                                    </div>
                                    @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Browse File</label>
                                    <input type="file" class="form-control" wire:model="profile" required>
                                    @error('profile') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control border border-2 p-2" wire:model="password" required>
                                    </div>
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="width:100%; max-width:200px;">
                                        <button type="submit"  wire:click.prevent="store()"  class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save User</button>
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