<!DOCTYPE html>
<html lang="en" data-theme="lofi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ isset($title) ? $title . ' - Scoring-Ranker' : 'Scoring-Ranker' }}</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen flex flex-col bg-base-200 font-sans">        
        
        @if(session('success'))
            <div class="position-fixed start-50 top-0 translate-middle" style="z-index: 1050;margin-top: 20px;">
                <div id="successToast" class="toast align-items-center bg-success text-white border-0 rounded-shadow" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const toastEl = document.getElementById('successToast');
                    const toast = new bootstrap.Toast(toastEl, { delay: 3000 }); 
                    toast.show();
                });
            </script>
        @endif

        <x-menu />
        
        <div class="container">
            <main class="flex-1 container mx-auto px-4 py-8">
                {{ $slot }}
            </main>
        </container>

        <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
            <div>
                <p>© 2025 Scoring & Ranking Website</p>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <!-- Toast component for notification -->
        <div id="livewire-toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1055"></div>

        <script>
            window.addEventListener('show-toast', event => {
                const { type, message } = event.detail[0];
                
                const toastId = 'toast-' + Date.now();
                const toast = document.createElement('div');
                toast.className = `toast align-items-center text-white bg-${type} border-0 show`;
                toast.id = toastId;
                toast.setAttribute('role', 'alert');
                toast.setAttribute('aria-live', 'assertive');
                toast.setAttribute('aria-atomic', 'true');
                toast.innerHTML = `
                    <div class="d-flex">
                        <div class="toast-body">${message}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                `;

                document.getElementById('livewire-toast-container').appendChild(toast);

                setTimeout(() => {
                    const toastEl = bootstrap.Toast.getOrCreateInstance(document.getElementById(toastId));
                    toastEl.hide();
                }, 3000);
            });
        </script>
    </body>
</html>