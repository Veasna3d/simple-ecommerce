<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tailwind -->
    <link href="{{ url('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css')}}" rel="stylesheet">

    <!-- AOS -->
    <link rel="stylesheet" href="{{ url('https://unpkg.com/aos@next/dist/aos.css' )}} />

    <!-- Poppins font -->
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com')}}">
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap')}}"
        rel="stylesheet" />
    <link href="{{ asset('css/skilline.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ url('https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap')}}">

 
   
    <!-- AOS init -->
    <script src="{{('https://unpkg.com/aos@next/dist/aos.js')}}" ></script>
    
     <!-- Alpine -->
    <script type="module" src="{{ url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js')}}" ></script>
    <script nomodule src="{{ url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js')}}" defer ></script>
    <script>
    	AOS.init();
    </script>
    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>