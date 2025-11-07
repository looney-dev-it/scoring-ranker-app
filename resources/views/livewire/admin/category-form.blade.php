<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" wire:model="name">
                <div>
                    @error('name') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-3">
                    <button wire:click="closeAddModel" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </div>
    </form>
</div>
