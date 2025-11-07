<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
      <th scope="col">Category</th>
      <th scope="col">Question</th>
      <th scope="col">Answer</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($questions as $q)
        <tr>
            <th scope="row">{{$q->id}}</th>
            <td>
                <button class="btn btn-sm btn-outline-secondary" wire:click="edit({{$q->id}})">
                    O
                </button>
                <button wire:click="delete({{ $q->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Are you to delete this Question ?')">
                    X
                </button>
            </td>
            <td>{{ $q->category->name }}</td>
            <td>{{ $q->question }}</td>
            <td>{{ $q->answer }}</td>
        </tr>        
        @empty
            <tr>
                <th colspan="5">No Questions yet!</th>
            </tr>
        @endforelse
  </tbody>
</table>