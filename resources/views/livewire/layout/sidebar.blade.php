<div class="app-menu">

    <a href="#" class="logo-box">
        <div class="logo-light">
            <img src="{{ asset('images/logo.png') }}" class="h-10" alt="logo">
            <img src="{{ asset('/images/logo-sm.png') }}" class="logo-sm" alt="Small logo">
        </div>
    </a>

    <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
        <span class="sr-only"></span>
        <i class="mgc_round_line text-xl"></i>
    </button>

    <div class="srcollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="mgc_home_3_line"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

        </ul>
    </div>
</div>
