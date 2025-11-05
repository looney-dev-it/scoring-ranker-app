<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
      <th scope="col">Topic</th>
      <th scope="col">Type</th>
      <th scope="col">Unit</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($score_topics as $st)
        <tr>
            <th scope="row">{{$st->id}}</th>
            <td>
                <button class="btn btn-sm btn-outline-secondary" wire:click="edit({{$st->id}})">
                    O
                </button>
                <button wire:click="delete({{ $st->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Are you to delete this ScoreTopic ?')">
                    X
                </button>
            </td>
            <td>{{ $st->title }}</td>
            <td>{{ $st->type->name }}</td>
            <td>{{ $st->unit }}</td>
        </tr>        
        @empty
            <tr>
                <th colspan="5">No ScoreTopic yet!</th>
            </tr>
        @endforelse
  </tbody>
</table>