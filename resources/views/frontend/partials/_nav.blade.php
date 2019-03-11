<!-- Defaul nav bar -->

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('index')}}">
                <img src="{{url('images\logo.png')}}" class="img-responsive" alt="" width="250">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('/') ? "active" : ""}}"><a href="/"><strong>@lang('translations.models')</strong></a></li>
                <li class="{{Request::is('configurations/create') ? "active" : ""}}"><a href="/configurations/create"><strong>@lang('translations.create_configuration')</strong></a></li>

            </ul>

            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('change_language')}}">
                        @if($language == 'sr')
                            <span><img src="{{url('images\flag_en.png')}}" title="English" alt="English"> EN</span>
                        @elseif($language == 'en')
                            <span><img src="{{url('images\flag_sr.png')}}" title="Srpski" alt="Srpski"> SR</span>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="{{ route('cartReview') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge" style="background-color: #e2e5e1; color: red; font-size: 16px;px">
                            <b> {{ Cart::count() }}</b>
                        </span>
                    </a>
                </li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>