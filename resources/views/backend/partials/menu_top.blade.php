{{--menu_top_start--}}
<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <span class="username username-hide-on-mobile"> Zdravo  {{ Auth::user()->name }} {{ Auth::user()->surname }} </span>
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
                <li>
                    <a href="{{ route('profile') }}">
                        <i class="icon-user"></i> Profil </a>
                </li>
                <li class="divider"> </li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                        <i class="icon-key"></i> Odjava </a>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>
{{--menu_top_end--}}