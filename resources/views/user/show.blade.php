<x-layout>
    <h2>Profile of {{ $user->name }}</h2>
    @if(!is_null($profile))
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">

                            <!-- Photo -->
                            @if($profile->photo)
                                <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile photo"
                                    class="rounded-circle mb-3" width="120" height="120" style="object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary mb-3" style="width: 120px; height: 120px;"></div>
                            @endif

                            <!-- Name -->
                            <h3 class="mb-1">{{ $user->name }}</h3>
                            <p class="text-muted">{{ $user->email }}</p>

                            <!-- Bio -->
                            @if($profile->bio)
                                <p class="mt-3">{{ $profile->bio }}</p>
                            @endif

                            <!-- Birth date -->
                            @if($profile->birth_date)
                                <p><strong>Born on:</strong> {{ $profile->birth_date->format('d/m/Y') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h4>This user has not yet entered his profile</h4>
    @endif
</x-layout>
