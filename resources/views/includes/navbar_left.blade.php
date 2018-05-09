<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{asset('img/logo.png')}}" alt="InvisibleCity App Logo" class="brand-image elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{($currentUser->image)?:asset('img/user.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$currentUser->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @foreach ($leftMenu as $menuItem)
                    @if (!array_key_exists('children', $menuItem))
                        <li class="nav-item">
                            <a href="{{url($menuItem['url'])}}" class="nav-link">
                                <i class="nav-icon {{array_key_exists('icon', $menuItem) && $menuItem['icon']?$menuItem['icon']:'fa fa-circle-o'}}"></i>
                                <p>{{$menuItem['label']}}</p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{url($menuItem['url'])}}" class="nav-link">
                                <i class="nav-icon {{array_key_exists('icon', $menuItem) && $menuItem['icon']?$menuItem['icon']:'fa fa-circle-o'}}"></i>
                                <p>{{$menuItem['label']}}</p>
                            </a>
                            <ul>
                            @foreach ($menuItem['children'] as $subMenuItem)
                                <li class="nav-item">
                                    <a href="{{url($subMenuItem['url'])}}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>{{$subMenuItem['label']}}</p>
                                    </a>
                                </li>
                            @endforeach
                            </ul>
                        </li>
                    @endif

                @endforeach


                {{--<li class="nav-item has-treeview menu-open">--}}
                    {{--<a href="#" class="nav-link active">--}}
                        {{--<i class="nav-icon fa fa-dashboard"></i>--}}
                        {{--<p>--}}
                            {{--Starter Pages--}}
                            {{--<i class="right fa fa-angle-left"></i>--}}
                        {{--</p>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-treeview">--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link active">--}}
                                {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                {{--<p>Active Page</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="#" class="nav-link">--}}
                                {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                {{--<p>Inactive Page</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon fa fa-th"></i>--}}
                        {{--<p>--}}
                            {{--Simple Link--}}
                            {{--<span class="right badge badge-danger">New</span>--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
