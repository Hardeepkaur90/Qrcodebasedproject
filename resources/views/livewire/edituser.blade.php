<div>

    <div class="container-fluid py-4">
        <div class="row" style="min-height:calc(100vh - 210px)">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">


                        <form enctype="multipart/form-data">
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
                                        <input type="text" class="form-control border border-2 p-2" wire:model="location" required>
                                    </div>
                                    @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">User Status</label>
                                        <select style="border: 2px solid lightgray;
                                        padding: 8px;" wire:model="status" class="form-control">
                                            <option value="Active">Active</option>
                                            <option value="Passive">Passive</option>
                                        </select>
                                    </div>
                                    @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <!-- <label class="form-label">Password</label> -->
                                        <input type="hidden" class="form-control border border-2 p-2" wire:model="password" required>
                                    </div>
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="width:100%; max-width:200px;">
                                        <button type="submit" wire:click.prevent="update()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update User</button>
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