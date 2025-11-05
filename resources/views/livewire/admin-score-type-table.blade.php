<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($score_types as $st)
        <tr>
            <th scope="row">{{$st->id}}</th>
            <td>
                <button class="btn btn-sm btn-outline-secondary" wire:click="edit({{$st->id}})">
                    O
                </button>
                <button wire:click="delete({{ $st->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Are you to delete this ScoreType ?')">
                    X
                </button>
            </td>
            <td>{{ $st->name }}</td>
        </tr>        
        @empty
            <tr>
                <th colspan="3">No ScoreType yet!</th>
            </tr>
        @endforelse
  </tbody>
</table>