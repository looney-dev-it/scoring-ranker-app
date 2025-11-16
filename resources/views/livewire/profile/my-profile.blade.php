<div>
    <div class="container py-5">
        <h2>My Profile</h2>

        
        <div class="card p-4 shadow-sm">
            <div class="text-center mb-4">
                @if($profile->photo)
                     <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle mb-3" width="180" height="180">
                @endif
                <h4>{{ $user->name }}</h4>
            </div>

            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Email :</div>
                    <div class="col-sm-9">{{  $user->email }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Bio :</div>
                    <div class="col-sm-9" style="white-space: pre-line;">{{ $profile->bio }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Birth date :</div>
                    <div class="col-sm-9">{{ $profile->birth_date?->format('d/m/Y') }}</div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button wire:click="openModal" class="btn btn-outline-primary">Edit Profile</button>
            </div>
        </div>

    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Profile</h5>
                            <button type="button" class="btn-close" wire:click="$set('showModal', false)"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Bio</label>
                                <textarea wire:model.defer="bio" class="form-control"></textarea>
                                <div>
                                    @error('bio') <span class="error">{{ $message }}</span> @enderror 
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Birth Date</label>
                                <input type="date" wire:model.defer="birth_date" class="form-control">
                                <div>
                                    @error('date') <span class="error">{{ $message }}</span> @enderror 
                                </div>
                            </div>
                            @if(!is_null($profileId) && !is_null($existingPhoto))
                                <img src="{{asset('storage/' . $existingPhoto) }}" alt="..." class="card-img-top img-fluid" style="max-height: 150px; object-fit: cover;">
                            @endif
                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" wire:model="photo" class="form-control">
                                <div>
                                    @error('photo') <span class="error">{{ $message }}</span> @enderror 
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="$set('showModal', false)">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
