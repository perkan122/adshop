
<!DOCTYPE html>
<html lang="sr">
<head>
    @include('frontend.partials._head')
</head>

<body>

@include('frontend.partials._nav')


<div class="container">

    @include('frontend.partials._messages')
    @yield('content')



</div>
@include('frontend.partials._footer')
@include('frontend.partials._javascript')

@yield('scripts')
</body>
</html>