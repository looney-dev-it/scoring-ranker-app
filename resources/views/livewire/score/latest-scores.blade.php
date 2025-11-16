<div class="card shadow-sm mb-4" wire:poll.5000ms>
    <div class="card-header">
        <a class="text-dark text-decoration-none" href="{{route('score')}}">
            <h5 class="mb-0">Latest Scores</h5>
        </a>
    </div>

    <div class="card-body p-0">
        @if($scores->isEmpty())
            <div class="alert alert-warning text-center mb-0">
                No scores yet ...
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>User</th>
                            <th>Topic</th>
                            <th>Score</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $s)
                            <tr>
                                <td>
                                    <a class="text-decoration-none" href="{{ route('user.show', ['id' => $s->user->id]) }}">
                                        {{ $s->user->name }}
                                    </a>
                                </td>
                                <td>{{ $s->topic->title }}</td>
                                <td>
                                    <span class="badge bg-success">{{ $s->score }}</span>
                                </td>
                                <td>{{ $s->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>