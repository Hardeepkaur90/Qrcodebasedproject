<div>
    <div class="card-body">
        
    @if(session()->has('message'))

<div class="alert alert-success">
    {{session('message')}}
</div>

@endif

 <div class=" me-3 my-3 text-end">
        <a class="btn bg-gradient-dark mb-0" href="chef-management"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage
            Chef
        </a>
    </div>

        <form >
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
                <input type="email" class="form-control border border-2 p-2" wire:model="location" required>
            </div>
            @error('location') <span class="text-danger">{{ $message }}</span> @enderror

        
            <div class="input-group input-group-outline mb-3">
              <input type="file" class="form-control" wire:model="profile" required>
            </div>
            @error('profile') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control border border-2 p-2" wire:model="password" required>
            </div>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
          
            <div class="text-center">
                <button type="submit"  wire:click.prevent="store()"  class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save User</button>
            </div>
        </form>

    </div>

</div>