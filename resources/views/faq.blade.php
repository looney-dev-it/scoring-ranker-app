<x-layout>
   <x-slot:title>
        FAQ
   </x-slot:title>

   <div class="container my-4">
       <h2 class="mb-4">Frequently Asked Questions</h2>

       <div class="accordion" id="faqAccordion">
           @foreach($categories as $category)
               <div class="accordion-item">
                   <h2 class="accordion-header" id="heading-{{ $category->id }}">
                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $category->id }}" aria-expanded="false" aria-controls="collapse-{{ $category->id }}">
                           {{ $category->name }}
                       </button>
                   </h2>
                   <div id="collapse-{{ $category->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $category->id }}" data-bs-parent="#faqAccordion">
                       <div class="accordion-body">
                           @forelse($category->questions as $question)
                               <div class="mb-3">
                                   <h6 class="fw-bold">{{ $question->question }}</h6>
                                   <p class="text-muted">{{ $question->answer }}</p>
                               </div>
                           @empty
                               <p class="text-muted">No questions yet for this category.</p>
                           @endforelse
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
</x-layout>
