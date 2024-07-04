<footer class="c-footer">
    <div class="c-footer__wrap">
        <ul class="c-footer__items">
            <li class="__item">
                <a href="{{ route('tos') }}" class="{{ Request::is('tos') ? 'active' : '' }}">利用規約</a>
            </li>
            <li class="__item">
                <a href="{{ route('privacy') }}" class="{{ Request::is('privacy') ? 'active' : '' }}">プライバシーポリシー</a>
            </li>
            <li class="__item">
                <a href="{{ route('guideline') }}" class="{{ Request::is('guideline') ? 'active' : '' }}">コミュニティガイドライン</a>
            </li>
            <li class="__item">
                <a href="{{ route('faq') }}" class="{{ Request::is('faq') ? 'active' : '' }}">ご利用ガイド</a>
            </li>
            <li class="__item">
                <a href="{{ route('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">問い合わせ</a>
            </li>
        </ul>
    </div>
</footer>