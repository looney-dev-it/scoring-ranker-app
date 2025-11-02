<div>
    <div class="container py-5">
        <h2>My Profile</h2>

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card p-4 shadow-sm">
            <div class="text-center">
                @if($profile->photo)
                    <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle mb-3" width="120">
                @endif
                <h4>{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->email }}</p>
                <p>{{ $profile->bio }}</p>
                <p><strong>Birth date:</strong> {{ $profile->birth_date?->format('d/m/Y') }}</p>

                <button wire:click="openModal" class="btn btn-outline-primary mt-3">Edit Profile</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Profile</h5>
                            <button type="button" class="btn-close" wire:click="$set('showModal', false)"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Bio</label>
                                <textarea wire:model.defer="bio" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Birth Date</label>
                                <input type="date" wire:model.defer="birth_date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" wire:model="photo" class="form-control">
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
