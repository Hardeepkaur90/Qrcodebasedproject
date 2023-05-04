<div>
    
        
    @if(session()->has('message'))

    <div class="alert alert-success">
        {{session('message')}}
    </div>

    @endif

    <div class="container-fluid">
        <div class="d-flex me-3 my-3 justify-content-between align-items-center">
            <h5 class="font-weight-bolder mb-0 text-capitalize">Add User</h5>
            <a class="btn btn-primary mb-0" href="manageuser"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage User</a>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row" style="min-height:calc(100vh - 310px)">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form  enctype="multipart/form-data">
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
                                        <label class="form-label">email</label>
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
                                <div class="col-md-6">
                                    <label class="form-label">Browse</label>
                                    
                                        <input type="file" class="form-control border border-2 p-2"  wire:model="profile" required>
                                    
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
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select class="form-control" wire:model="role" id="category">
                                            <option hidden>Choose Category</option>
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
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