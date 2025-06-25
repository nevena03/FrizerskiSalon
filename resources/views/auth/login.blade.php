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
                font-family: "Cinzel";
                background-color: #D9D9D9;
            }
            .btn-custom{
                background-color: #8F2D9C;
                color: #ECAEF4;
                border-radius: 8px;


            }
            .btn-custom:hover{
              
                background-color:rgb(195, 177, 194);
                color:rgb(112, 0, 126);

            }
        </style>

</head>
<body>
<div class="container">
    <h1 style="color: #870F96;" class="text-center display-2 mt-4" >Login</h1>
    <div style="height: 70vh;" class="row justify-content-center align-items-center">
        <div style="border:2px solid #790888; background-color: #E8EC97; border-radius:10px" class="col-md-8 p-5 ">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row align-items-center">
                    <label style="color: #870F96" for="username" class="col-form-label col-3 font-weight-bold">
                        Korisničko ime:


                    </label>
                   <div class="col-9">
                        <input type="text" name="username" class="form-control" placeholder="Unesite korisničko ime" required>
                        
                   </div>
                </div>
                <div class="form-group row align-items-center">
                    <label style="color: #870F96" for="password" class="col-form-label col-3 font-weight-bold">
                        Lozinka:


                    </label>
                   <div class="col-9">
                        <input type="password" name="password" class="form-control" placeholder="Unesite lozinku" required>

                   </div>
           
                </div>
                @error('username')
                    <p class="text-danger text-center">{{$message}}</p>
                @enderror
                <div class="row justify-content-center">
                    <button class="btn btn-custom font-weight-bold" type="submit">Login</button>

                </div>
            </form>
        </div>
    </div>
</div>

</body>
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
