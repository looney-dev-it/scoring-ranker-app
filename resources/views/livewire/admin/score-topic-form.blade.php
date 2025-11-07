<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" wire:model="title">
                <div>
                    @error('title') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="type_id" class="col-sm-2 col-form-label">Type:</label>
            <div class="col-sm-10">
                <select wire:model="type_id">
                    <option value="">--Choose--</option>
                    @foreach($scoretypes as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>
                <div>
                    @error('type_id') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="type_id" class="col-sm-2 col-form-label">Unit:</label>
            <div class="col-sm-10">
                <select wire:model="unit">
                    <option value="">--Choose--</option>
                    <option value="Pts">Pts</option>
                    <option value="KM">KM</option>
                    <option value="M">M</option>
                    <option value="KM">KM</option>
                </select>
                <div>
                    @error('unit') <span class="error">{{ $message }}</span> @enderror 
                </div>
            </div>
        </div>
        <div class="form-group row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-3">
                    <button wire:click="closeAddModel" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </div>
    </form>
</div>
