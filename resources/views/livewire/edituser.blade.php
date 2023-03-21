<div>
    <div class="card-body">
        
    
        <form>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="name" required>
            </div>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="phone" required>
            </div>
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label class="form-label">email</label>
                <input type="email" class="form-control border border-2 p-2" wire:model="email" required>
            </div>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="location" required>
            </div>
            @error('location') <span class="text-danger">{{ $message }}</span> @enderror

        
            <!-- <div class="input-group input-group-outline mb-3">
              <input type="file" class="form-control" wire:model="profile" required>
            </div> -->
         

                    <div class="mb-3">
                <!-- <label class="form-label">Password</label> -->
                <input type="hidden" class="form-control border border-2 p-2" wire:model="password" required>
            </div>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
         
            <div class="text-center">
                <button type="submit"  wire:click.prevent="update()"  class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update User</button>
            </div>
        </form>

    </div>

</div>