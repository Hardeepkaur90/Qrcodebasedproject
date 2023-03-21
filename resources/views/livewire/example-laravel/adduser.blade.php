<div>
    <div class="card-body">
        
    
        <form>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" wire:model="name" required>
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" wire:model="description" required>
            </div>
            <div class="text-center">
                <button type="submit"  wire:click.prevent="store()"  class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save User</button>
            </div>
        </form>

    </div>
</div>