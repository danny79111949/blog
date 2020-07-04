<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    @include('layouts.preloader')

    <div class="wrapper">

        @include('layouts.header')  

        @yield('hero')
        
        <section class="body-content">
            @yield('content')
        </section>
        @include('layouts.footer')
        
    </div>

    @include('layouts.js')
</body>

</html>
