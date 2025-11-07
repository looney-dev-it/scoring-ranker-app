<table class="table">
  <thead>
    <tr>
      <th scope="col">User</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($scores as $s)
            <tr>
                <td>
                    <a href="{{ route('user.show', ['id' => $s->user->id ]) }}">{{ $s->user->name }}</a>
                </td>
                <td>{{ $s->total_score }}</td>
            </tr>        
        @empty
            <tr>
                <th colspan="2">No Scores yet!</th>
            </tr>
        @endforelse
  </tbody>
</table>