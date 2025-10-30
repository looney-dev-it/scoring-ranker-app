<x-layout>
   <x-slot:title>
        Scoring Ranker
    </x-slot:title>

    <div class="row">
        <div class="col-sm-4">
            User Management
        </div>
        <div class="col-sm-8">
            <h4>TBD User component</h4>
        </div>
    </div>
<div class="border-top my-6"></div> 
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