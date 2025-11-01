<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
      <th scope="col">User</th>
      <th scope="col">Admin</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($users as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>
                <button class="btn btn-sm btn-outline-secondary" wire:click="change_password({{$item->id}})">
                    P
                </button>
                <button class="btn btn-sm btn-outline-secondary" wire:click="edit({{$item->id}})">
                    O
                </button>
                <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Are you to delete this user ?')">
                    X
                </button>
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->admin }}</td>
        </tr>        
        @empty
            <tr>
                <th colspan="4">No users yet!</th>
            </tr>
        @endforelse
  </tbody>
</table>