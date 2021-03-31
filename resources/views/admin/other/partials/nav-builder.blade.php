<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
        <img class="c-sidebar-brand-full main-logo" src="{{asset("/logo.png")}}" alt="CoreUI Logo">
        <img class="c-sidebar-brand-minimized main-logo" src="{{asset("/logo.png")}}" width="118" height="46"
             alt="CoreUI Logo">
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <i class="cil-cog c-sidebar-nav-icon"></i>
                Главная страница</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('promotions.index') }}">
                <i class="cil-tags c-sidebar-nav-icon"></i>
                Акции</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('instapromos.index') }}">
                <i class="cil-filter-photo c-sidebar-nav-icon"></i>
                Акции Instagram</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('events.index') }}">
                <i class="cil-star c-sidebar-nav-icon"></i>
                Мероприятия</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('companies.index') }}">
                <i class="cil-monitor c-sidebar-nav-icon"></i>
                Компании</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('categories.index') }}">
                <i class="cil-puzzle c-sidebar-nav-icon"></i>
                Категории</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
                <i class="cil-people c-sidebar-nav-icon"></i>
                Пользователи</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('achievements.index') }}">
                <i class="cil-star c-sidebar-nav-icon"></i>
                Достижения</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('cashback.index') }}">
                <i class="cil-money c-sidebar-nav-icon"></i>
                История кэшбэка
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('refferals.index') }}">
                <i class="cil-qr-code c-sidebar-nav-icon"></i>
                История рефералов
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('payments.index') }}">
                <i class="cil-loop c-sidebar-nav-icon"></i>
                История оплаты баллами
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('articles.index') }}">
                <i class="cil-newspaper c-sidebar-nav-icon"></i>
                Статьи
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('promocodes.index') }}">
                <i class="cil-font c-sidebar-nav-icon"></i>
                Промокоды
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('prizes.index') }}">
                <i class="cil-gift c-sidebar-nav-icon"></i>
                Призы
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('lang') }}">
                <i class="cil-excerpt c-sidebar-nav-icon"></i>
                Перевод
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('charities.index') }}">
                <i class="cil-arrow-thick-to-bottom c-sidebar-nav-icon"></i>
                Благотворительные акции</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('charityhistories.index') }}">
                <i class="cil-action-redo c-sidebar-nav-icon"></i>
                История донатов</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('geo_quests.index') }}">
                <i class="cil-location-pin c-sidebar-nav-icon"></i>
                Гео-задания</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('geo_positions.index') }}">
                <i class="cil-share-boxed c-sidebar-nav-icon"></i>
                Квестовые гео-точки</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('geo_histories.index') }}">
                <i class="cil-share-boxed c-sidebar-nav-icon"></i>
                История выполнения<br>квестов</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('geo_histories.index') }}">
                <i class="cil-share-boxed c-sidebar-nav-icon"></i>
                Бонусы пользователей<br>за квесты</a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('bot_hubs.index') }}">
                <i class="cil-share-boxed c-sidebar-nav-icon"></i>
                Управление ботами</a>
        </li>

    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
