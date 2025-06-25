<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Vintage Vogue Vanity</title>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">        
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        
        <!-- Icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        
        @livewireStyles
        <style>
            body{

                background-image: url('/pozadina.jpg');
                font-family: "Cinzel";
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                min-height: 100vh;
                
               
            }
            .btn-custom{
                color: #870F96;
                background-color: #D9D9D9;
                border: 1px solid #790888;
                border-radius: 8px;
                padding: 14px 28px;
                font-size: 1.2rem;



            }
            .btn-custom:hover{
                background-color:rgb(195, 177, 194);
                color:rgb(112, 0, 126);
            }

        </style>
    </head>
    
    <body>
        <div id="app">
            
        
            <main class="py-4">
                <div class="container">
                    <h1 style="color: #870F96;" class="text-center display-1">Vintage Vogue Vanity</h1>
                    <h2 style="color: #870F96" class="text-center mt-5">Dobrodošli u frizerski salon "Vintage Vogue Vanity"</h2>
                    <br>
                    <h3 style="color:#870F96" class="text-center" > "Tamo gde stil susreće eleganciju prošlih vremena"!</h3>
                    <div style="height: 50vh;" class="row justify-content-around align-items-center">
                        <a href="{{route('login')}}"class="btn btn-custom col-3">Login</a>
                        <a href="{{route('register')}}"class="btn btn-custom col-3">Registruj se</a>

                    </div>

                </div>
            </main>
        </div>

        @stack('modals')
        
        @livewireScripts
        
        @stack('scripts')
        
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        
        @if (session()->has('success')) 
        <script>
            var notyf = new Notyf({dismissible: true})
            notyf.success('{{ session('success') }}')
        </script> 
        @endif
        
        <script>
            /* Simple Alpine Image Viewer */
            document.addEventListener('alpine:init', () => {
                Alpine.data('imageViewer', (src = '') => {
                    return {
                        imageUrl: src,
        
                        refreshUrl() {
                            this.imageUrl = this.$el.getAttribute("image-url")
                        },
        
                        fileChosen(event) {
                            this.fileToDataUrl(event, src => this.imageUrl = src)
                        },
        
                        fileToDataUrl(event, callback) {
                            if (! event.target.files.length) return
        
                            let file = event.target.files[0],
                                reader = new FileReader()
        
                            reader.readAsDataURL(file)
                            reader.onload = e => callback(e.target.result)
                        },
                    }
                })
            })
        </script>
    </body>
</html>