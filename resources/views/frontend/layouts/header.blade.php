<header class="c-header">
    <div class="c-header_wrap">
        <a href="{{ route('welcome') }}">
            <h1 class="">
                <img src="{{ URL::asset('assets/img/logo-pc.png') }}" alt="" class="pc_logo">
            </h1>
        </a>
        <ul class="c-header__items">
            <li class="__item">
                <a href="{{ route('about-me') }}">マイポワントとは？</a>
            </li>
            @if (Route::has('login'))
            @auth
            <li class="__item">
                <a class="dropdown_btn dropdown_arrow">
                    {{ Auth::user()->nickname }}さん    
                    <svg fill="#FF9293" height="15px" width="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-89.1 -89.1 508.20 508.20" xml:space="preserve" stroke="#FF9293" stroke-width="33" transform="rotate(0)">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#FF9293" stroke-width="7.26"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"></path>
                        </g>
                    </svg>
                </a>
                <ul class="dropdown_menu hide">
                    <li class="menu-item">
                        <a href="{{ route('profile.edit') }}">マイページ</a>
                    </li>
                    <li class="menu-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();">ログアウト</a>
                        </form>
                    </li>
                </ul>
            </li>

            @else
            <li class="__item">
                <a href="{{ route('login') }}">ログイン</a>
            </li>

            @if (Route::has('register'))
            <li class="__item_input">
                <a href="{{ route('register') }}">新規会員登</a>
            </li>
            @endif
            @endauth
            @endif
        </ul>
    </div>
</header>

<div id="hamburg-btn" class="hamburg-btn">
    <span></span>
</div>
<div class="c-header__sp">
    <ul class="c-header__sp--items">
        <li class="__sp-item">
            <a href="{{ route('about-me') }}">マイポワントとは？</a>
        </li>
        <li class="__sp-item">
            <a href="{{ route('login') }}">ログイン</a>
        </li>
        <li class="__sp-item">
            <a href="{{ route('register') }}">新規会員登</a>
        </li>

    </ul>
</div>