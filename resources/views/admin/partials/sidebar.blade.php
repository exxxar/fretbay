<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
        <img class="c-sidebar-brand-full main-logo" src="/images/logo.svg" width="118" height="46" alt="AlloTrans Logo">
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.index')}}">
                <i class="fab fa-amazon c-sidebar-nav-icon"></i>
                Главная страница
            </a>
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show"><a
                class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle c-active" href="#">
                <i class="fab fa-amazon c-sidebar-nav-icon"></i>
                Объекты</a>
            <ul class="c-sidebar-nav-dropdown-items">

                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("objects.categories")}}"><span
                            class="c-sidebar-nav-icon"></span>Категории объектов</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("objects.types")}}"><span
                            class="c-sidebar-nav-icon"></span>Типы объектов</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("objects.transport-types")}}"><span
                            class="c-sidebar-nav-icon"></span>Типы транспортировки</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("objects.transport")}}"><span
                            class="c-sidebar-nav-icon"></span>Транспорт</a></li>
            </ul>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.orders')}}">
                <i class="fab fa-amazon c-sidebar-nav-icon"></i>
                Заказы</a>
        </li>


        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show"><a
                class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle c-active" href="#">
                <i class="fab fa-amazon c-sidebar-nav-icon"></i>
                Пользователи</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("users.list")}}"><span
                            class="c-sidebar-nav-icon"></span>Пользователи</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("users.profiles")}}"><span
                            class="c-sidebar-nav-icon"></span>Профайлы</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("users.roles")}}"><span
                            class="c-sidebar-nav-icon"></span>Роли</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("users.permissions")}}"><span
                            class="c-sidebar-nav-icon"></span>Роли и разрешения</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle c-active" href="#">
                <i class="fab fa-amazon c-sidebar-nav-icon"></i>
                Локализация
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="/admin/languages">
                        <span class="c-sidebar-nav-icon fas fa-globe"></span>
                        Языки
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="/admin/languages/translations">
                        <span class="c-sidebar-nav-icon fas fa-language"></span>
                        Переводы
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
