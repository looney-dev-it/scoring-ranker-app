<div class="row">
    <div class="col-sm-3">
        User Management
    </div>
    <div class="col-sm-1">
        <button wire:click="openAddModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit="save">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" wire:model="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" wire:model="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" wire:model="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirm" class="col-sm-2 col-form-label">Confirm Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_confirm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admin" class="col-sm-2 col-form-label">Admin:</label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="form-control" id="admin">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <x-admin_users :users="$users" />
    </div>
    <div>

        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    </div>
</div>