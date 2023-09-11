<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div style="display: flex; column-gap: 10px; align-items: center" class="info">
                <a class="d-block">{{$admin->name}} {{$admin->surname}}</a>
                <a onclick="return toHref(event)" style="font-size: 10px;" href="{{route('admin.logout')}}" class="btn btn-primary">çıxış et</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.categories.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Kategoriyalar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.settings.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Tənzimləmələr
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.actors.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Aktyorlar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.directors.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Rejisorlar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.scriptwriters.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Ssenaristlər
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.home-categories.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Ana səhifə kateqoriyaları
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
