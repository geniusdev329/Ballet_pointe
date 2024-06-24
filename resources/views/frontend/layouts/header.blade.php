<header class="c-header">
    <div class="c-header_wrap">
        <a href="{{ route('welcome') }}">
            <h1 class="">
                <img src="./assets/img/logo-pc.png" alt="" class="pc_logo">
            </h1>
        </a>
        <ul class="c-header__items">
            <li class="__item">
                <a href="{{ route('about-me') }}">マイポワントとは？</a>
            </li>
            @if (Route::has('login'))
                @auth
                    <li class="__item">
                        <a href="{{ route('profile.edit') }}">profile</a>
                    </li>
                    <li class="__item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">log
                                out</a>
                        </form>

                    </li>
                @else
                    <li class="__item">
                        <a href="{{ route('login') }}">ログイン</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="__item_input">
                            <a href="{{ route('register') }}">会員登録</a>
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
            <a href="{{ route('register') }}">会員登録</a>
        </li>

    </ul>
</div>
