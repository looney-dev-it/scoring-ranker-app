<div>
    <form wire:submit.prevent="submit">
        @csrf
        @if(!$changePasswordOnly)
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
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" wire:model="email">
                    <div>
                        @error('email') <span class="error">{{ $message }}</span> @enderror 
                    </div>
                </div>
            </div>
        @endif
        @if(is_null($userId) or $changePasswordOnly)
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" wire:model="password">
                    <div>
                        @error('password') <span class="error">{{ $message }}</span> @enderror 
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_confirmation" wire:model="password_confirmation">
                    <div>
                        @error('password_confirmationpassword_confirm') <span class="error">{{ $message }}</span> @enderror 
                    </div>
                </div>
            </div>
        @endif
        @if(!$changePasswordOnly)
            <div class="form-group row">
                <label for="admin" class="col-sm-2 col-form-label">Admin:</label>
                <div class="col-sm-10">
                    <input class="form-check-input" type="checkbox" id="admin" wire:model="admin"/>
                </div>
            </div>
        @endif
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
