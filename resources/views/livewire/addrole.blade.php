<div class="container-fluid">
    <div class="card-body">
        @if(session()->has('message'))
          <div class="alert alert-success">
             {{ session('message')}}
          </div>
        @endif
        
        <div class=" me-3 my-3 text-end">
            <a class="btn bg-gradient-dark mb-0" href="managerole"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Manage
                Role
            </a>
        </div>
        <form>
            <div class="mb-3">
                <label class="form-label">Role Name</label>
                <input type="text" class="form-control border border-2 p-2" wire:model="role_name" required>
            </div>
            @error('role_name') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="text-center">
                <button type="submit" wire:click.prevent="store()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Add Role</button>
            </div>
        </form>

    </div>
</div>