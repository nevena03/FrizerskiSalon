<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Frizerski Salon</title>
        
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
                font-family: 'Cinzel';
                overflow-x: hidden;
                background-color: #E8EC97;
            
            }
            h1{
                color: #870F96;
            }
            .navbar-nav{
                font-size: medium;
            }
            .nav-item{
                height: 100%;
            }
            .nav-custom-link{
                margin: 50px;
            }
            .nav-custom-link:hover{
                color: #870F96;
                font-weight: bold;
                text-decoration: none;
            }
            .dropdown:hover{

            color: #870F96 !important;
            font-weight: bold;
            text-decoration: none;
            }
            .table thead th{
                border-top: none;
                border-bottom: none;
                color: #870F96;
                font-size: medium;

            }
            .table thead{
                border-bottom: 2px solid #790888;
            }
            .table tbody td{
                border-top: 1px solid #790888;
                color: #000000;
                
            }
            .nav-tabs{
                border-bottom: solid 2px #790888;
                padding: 1px;
            }
            .nav-tabs .nav-item{
                border-radius: 10px;
                background-color: #E8EC97;
                display:flex;
                justify-content: center;
                align-items: center;

            }
            .nav-custom-link{
                color: #870F96;
            }
            .nav-tabs .nav-item .nav-link{
                color: #870F96;
                border: none;
            }
            .nav-tabs .nav-item:hover{
                background-color: #D9D9D9;
                
            
            }
            .nav-tabs .nav-item .nav-link:hover{
                color: #870F96;
                font-weight: bold;
                border: none;
            }
            .nav-tabs .nav-link.active{
                background-color: #D9D9D9;
                color: #870F96;
                font-weight: bold;
                border-radius: 10px;
            }
            
            .navbar-nav .nav-item.active{
                background-color: #870F96;
                height: 100%;
                border-radius: 20px;
            }
            .navbar-nav .nav-item .nav-custom-link.active{
                color: #D9D9D9;
                font-weight: bold;
            }
            .btn-custom{
                background-color: #8F2D9C;
                color: #ECAEF4;
                border-radius: 8px;
                font-weight: bold;


            }
            .btn-custom:hover{
              
                background-color:rgb(195, 177, 194);
                color:rgb(112, 0, 126);

            }

        </style>
    </head>
    
    <body>
        <div id="app">
            @include('layouts.nav')
        
            <main class="py-4">
                @yield('content')
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