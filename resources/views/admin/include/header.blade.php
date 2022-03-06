<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Админ панель</span>
    </a>

    <!-- Sidebar -->

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <p>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
                <a class="nav-link" style="cursor:pointer;">
                    <p class="image">
                        <img style="width: 35px; height: 35px"
                             src="{{ (Auth()->user()->provider != null) ? Auth()->user()->avatar : "/public/storage/avatar/" . Auth()->user()->avatar }}"
                             class="img-circle elevation-2 mr-2" alt="User Image">
                    </p>
                    <span>{{ Auth()->user()->name }}</span>
                    <i class="right fas fa-angle-left mt-1"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <p>
                                <i class="fas fa-arrow-circle-left mr-2"></i>
                                На сайт
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile.index') }}" class="nav-link">
                            <p>
                                <i class="fas fa-user mr-2"></i>
                                Профиль
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <p>
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Выйти
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        </p>
        <hr>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a class="nav-link" style="cursor:pointer;">
                        <i class="fas fa-align-justify mr-2"></i>
                        <p>
                            Категории
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <p>
                                    <i class="fas fa-align-left mr-2"></i>
                                    Все категории
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <p>
                                    <i class="fas fa-plus mr-2"></i>
                                    Добавить категорию
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a class="nav-link" style="cursor:pointer;">
                        <i class="fas fa-newspaper mr-2"></i>
                        <p>
                            Посты
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link">
                                <p>
                                    <i class="far fa-newspaper mr-2"></i>
                                    Все посты
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.create') }}" class="nav-link">
                                <p>
                                    <i class="fas fa-plus mr-2"></i>
                                    Добавить пост
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('users.index') }}" class="nav-link" style="cursor:pointer;">
                        <i class="fas fa-users mr-2"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
