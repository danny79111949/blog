<header class="l-header @isset($overlay) l-header_overlay @endisset">

    <div class="l-navbar l-navbar_expand 
    @isset($overlay) 
    l-navbar_t-dark-trans 
    @else 
    l-navbar_t-light 
    @endisset 
    js-navbar-sticky">
        <div class="container-fluid">
            <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                <!--logo start-->
                <a href="index.html" class="logo-brand">
                    @isset($overlay)
                        <img class="retina" src="assets/img/logo-dark.png" alt="Massive">
                    @else  
                        <img class="retina" src="assets/img/logo.png" alt="Massive"> 
                    @endisset
                    
                </a>
                <!--logo end-->

                <!--mega menu start-->
               
                <ul class="menuzord-menu menuzord-right c-nav_s-standard">
                    <li class="@if(request()->is('/')) active @endif">
                        <a href="/">Home</a>   
                    </li>
                    <li class="@if(request()->is('about')) active @endif">
                        <a href="/about">About</a>   
                    </li>
                    <li class="@if(request()->is('contact')) active @endif">
                        <a href="/contact">Contact</a>   
                    </li>
                    <li>
                        <a href="/blog">Blog</a>   
                    </li>

                </ul>
                

            </nav>
        </div>
    </div>

</header>