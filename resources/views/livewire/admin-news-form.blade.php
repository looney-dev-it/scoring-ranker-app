<div>
    <form wire:submit.prevent="submit">
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" wire:model="title">
                <div>
                    @error('title') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content:</label>
            <div class="col-sm-10">
                <textarea type="content" class="form-control" id="content" wire:model="content"></textarea>
                <div>
                    @error('content') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="is_published" class="col-sm-2 col-form-label">Published:</label>
            <div class="col-sm-10">
                <input class="form-check-input" type="checkbox" id="is_published" wire:model="is_published"/>
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
