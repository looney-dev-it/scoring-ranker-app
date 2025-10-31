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
            <td>Edit/Delete</td>
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