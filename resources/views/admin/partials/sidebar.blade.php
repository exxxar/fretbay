<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand" style="background: #151b26">
        <img class="c-sidebar-brand-full main-logo" src="/assets/img/logo.png" width="118" height="46" alt="AlloTrans Logo">
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.index')}}">
                <i class="fas fa-home c-sidebar-nav-icon"></i>
                Main page
            </a>
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <div class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle c-active">
                <i class="far fa-plus-square c-sidebar-nav-icon"></i>
                Categories
            </div>
            <ul class="c-sidebar-nav-dropdown-items">

                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.categories")}}"><span
                            class="c-sidebar-nav-icon"></span>Categories</a></li>

                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.subcategories")}}"><span
                            class="c-sidebar-nav-icon"></span>Subcategories</a></li>

                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.properties")}}"><span
                            class="c-sidebar-nav-icon"></span>Category properties</a></li>

                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.things")}}"><span
                            class="c-sidebar-nav-icon"></span>Things properties</a></li>
            </ul>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.orders')}}">
                <i class="fas fa-file-invoice c-sidebar-nav-icon"></i>
                Orders
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.listings')}}">
                <i class="fas fa-file-alt c-sidebar-nav-icon"></i>
                Listings
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.reviews')}}">
                <i class="far fa-comments c-sidebar-nav-icon"></i>
                Reviews
            </a>

        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <div class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle c-active">
                <i class="fas fa-users c-sidebar-nav-icon"></i>
                Users
            </div>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.users")}}"><span
                            class="c-sidebar-nav-icon"></span>Users</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.transporters")}}"><span
                            class="c-sidebar-nav-icon"></span>Transporters</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.verifications")}}"><span
                            class="c-sidebar-nav-icon"></span>Verifications</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.vehicles")}}"><span
                            class="c-sidebar-nav-icon"></span>Vehicles</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.customers")}}"><span
                            class="c-sidebar-nav-icon"></span>Customers</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.roles")}}"><span
                            class="c-sidebar-nav-icon"></span>Roles</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route("admin.permissions")}}"><span
                            class="c-sidebar-nav-icon"></span>Permissions</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="/admin/languages">
                <span class="c-sidebar-nav-icon fas fa-globe"></span>
                Languages
            </a>
        </li>
{{--        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">--}}
{{--            <div class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle c-active">--}}
{{--                <i class="fab fa-amazon c-sidebar-nav-icon"></i>--}}
{{--                Locale--}}
{{--            </div>--}}
{{--            <ul class="c-sidebar-nav-dropdown-items">--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a class="c-sidebar-nav-link" href="/admin/languages">--}}
{{--                        <span class="c-sidebar-nav-icon fas fa-globe"></span>--}}
{{--                        Langs--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a class="c-sidebar-nav-link" href="/admin/languages/translations">--}}
{{--                        <span class="c-sidebar-nav-icon fas fa-language"></span>--}}
{{--                        Transaltions--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
