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
                <a href="/" class="logo-brand">
                    @isset($overlay)
                        <img class="retina" src="/assets/img/logo-dark.png" alt="Massive">
                    @else  
                        <img class="retina" src="/assets/img/logo.png" alt="Massive"> 
                    @endisset
                    
                </a>
                <!--logo end-->

                <!--mega menu start-->
               
                <ul class="menuzord-menu menuzord-right c-nav_s-standard">
                    <li class="@if(request()->is('/')) active @endif">
                        <a href="/">首頁</a>   
                    </li>
                    <li class="@if(request()->is('about')) active @endif">
                        <a href="/about">關於我</a>   
                    </li>
                    <li class="@if(request()->is('contact')) active @endif">
                        <a href="/contact">聯繫我</a>   
                    </li>
                    <li class="@if(request()->is('posts')) active @endif">
                        <a href="/posts">文章頁</a>   
                    </li>

                </ul>
                

            </nav>
        </div>
    </div>

</header>