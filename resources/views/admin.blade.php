<x-layout>
   <x-slot:title>
        Admin
    </x-slot:title>

    
    <livewire:useradmin />
<div class="border-top mt-6 mb-6"></div> 
  <div class="row">
        <div class="col-sm-3">
            News Management
        </div>
        <div class="col-sm-1">
            <button type="button" class="btn btn-primary">Add</button>
        </div>
        <div class="col-sm-8">
            <x-admin_news :news="$news" />   
        </div>
  </div>

</x-layout>