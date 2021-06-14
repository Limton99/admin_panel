<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content menu-accordion">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class="nav-item"><a href="{{route('home')}}"><i class="icon-home3"></i><span data-i18n="" class="menu-title">Robust Admin</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('orders')}}"><i class="icon-first-order"></i><span data-i18n="" class="menu-title">Заказы</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('specialists')}}"><i class="icon-user"></i><span data-i18n="" class="menu-title">Специалисты</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('clients')}}"><i class="icon-users"></i><span data-i18n="" class="menu-title">Клиенты</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('cities')}}"><i class="icon-heart"></i><span data-i18n="" class="menu-title">Города</span></a>
            </li>
            <li class=" nav-item dropdown"><a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-server"></i>
                    <span data-i18n="" class="menu-title">
                        Сервисы
                    </span></a>
                <div class="dropdown-menu sidebar-dropdown" aria-labelledby="dropdownMenuLink">
                    <a href="{{route('services')}}">Сервисы</a>
                    <a href="{{route('serviceCategories')}}">Категории сервисов</a>
                    <a href="{{route('rubrics')}}">Рубрики категориев</a>
                    <a href="{{route('aliases')}}">Псведонимы сервиса</a>
                    <a href="{{route('units')}}">Единица измерения</a>
                </div>
            </li>
            <li class=" nav-item"><a href="{{route('promotions')}}"><i class="icon-calendar"></i><span data-i18n="" class="menu-title">Акции</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('verification_codes')}}"><i class="icon-code"></i><span data-i18n="" class="menu-title">Коды верификации</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('transactions')}}"><i class="icon-money"></i><span data-i18n="" class="menu-title">Транзакции</span></a>
            </li>
            <hr style="color: white">
            <li class=" nav-item"><a href="{{route('admins')}}"><i class="icon-user-secret"></i><span data-i18n="" class="menu-title">Администраторы</span></a>
            </li>
        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <!-- main menu footer-->
</div>
