<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($categories as $c)
        <tr>
            <th scope="row">{{$c->id}}</th>
            <td>
                <button class="btn btn-sm btn-outline-secondary" wire:click="edit({{$c->id}})">
                    O
                </button>
                <button wire:click="delete({{ $c->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Are you to delete this Category ?')">
                    X
                </button>
            </td>
            <td>{{ $c->name }}</td>
        </tr>        
        @empty
            <tr>
                <th colspan="3">No Category yet!</th>
            </tr>
        @endforelse
  </tbody>
</table>