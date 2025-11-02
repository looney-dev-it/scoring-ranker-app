<x-layout>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-3 bg-white border-end min-vh-100 p-3">
                @include('components.admin-sidebar')
            </aside>
            <main class="col-md-9 py-4">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-layout>