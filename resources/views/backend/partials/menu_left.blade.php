{{--menu_left_start--}}
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item  ">
                <a href="{{route('orders.index')}}">
                    <i class="icon-present"></i>
                    <span class="title">Narudžbine</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{route('statistics.create')}}">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Statistika prodaje</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Profil korisnika</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{route('profile')}}" class="nav-link ">
                            <i class="icon-user-follow"></i>
                            <span class="title">Izmeni profil</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</div>
{{--menu_left_end--}}