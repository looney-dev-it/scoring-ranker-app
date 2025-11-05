<x-layout>
    <div class="container py-5">
        <h2>Profile of {{ $user->name }}</h2>
        @if(!is_null($profile))
            <div class="card p-4 shadow-sm">
                <div class="text-center mb-4">
                    @if($profile->photo)
                        <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle mb-3" width="180" height="180">
                    @endif
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
            </div>
         @else
            <h4>This user has not yet entered his profile</h4>
        @endif
    </div>
</x-layout>
