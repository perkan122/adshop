<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Active Design shop </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/simple-line-icons/simple-line-icons.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css") }}" rel="stylesheet" type="text/css" />
<!--<link href="{{ asset("backend/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css ") }} " rel="stylesheet" type="text/css" />-->
    <link href="{{ asset("backend/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css ") }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css ") }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/morris/morris.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/fullcalendar/fullcalendar.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/plugins/jqvmap/jqvmap/jqvmap.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/global/css/components.min.css") }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset("backend/global/css/plugins.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/layouts/layout/css/layout.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/layouts/layout/css/themes/darkblue.min.css") }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset("backend/layouts/layout/css/custom.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("backend/apps/css/parsley.css") }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
</head>


<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        {{--menu_top_start--}}
        @include('backend.partials.menu_top')
        {{--menu_top_end--}}
    </div>
</div>

<div class="clearfix"> </div>
<div class="page-container">
    {{--menu_left_start--}}
    @include('backend.partials.menu_left')
    {{--menu_left_end--}}
    <div class="page-content-wrapper">
        @yield('content')
        {{--page_footer_start--}}
        @include('backend.partials.footer')
        {{--page_footer_end--}}
    </div>
</div>

<script src="{{ asset("backend/global/plugins/jquery.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/js.cookie.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jquery.blockui.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/moment.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/morris/morris.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/morris/raphael-min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/counterup/jquery.waypoints.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/counterup/jquery.counterup.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/amcharts/amcharts.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/amcharts/serial.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/amcharts/pie.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/amcharts/radar.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/amcharts/themes/light.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/amcharts/themes/patterns.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/amcharts/themes/chalk.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/ammap/ammap.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/ammap/maps/js/worldLow.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/amcharts/amstockcharts/amstock.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/fullcalendar/fullcalendar.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/horizontal-timeline/horozontal-timeline.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/flot/jquery.flot.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/flot/jquery.flot.resize.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/flot/jquery.flot.categories.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jquery.sparkline.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jqvmap/jqvmap/jquery.vmap.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/scripts/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/pages/scripts/components-editors.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/pages/scripts/components-editors.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/pages/scripts/dashboard.min.js") }}" type="text/javascript"></script>
<!-- <script src="{{ asset("backend/global/plugins/bootstrap-markdown/lib/markdown.js") }}" type="text/javascript"></script>
    <script src="{{ asset("backend/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js") }}" type="text/javascript"></script>  -->
<script src="{{ asset("backend/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/layouts/layout/scripts/layout.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/layouts/layout/scripts/demo.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/layouts/global/scripts/quick-sidebar.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/skripta.js") }}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{ asset("backend/simpleUpload.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/simpleUpload.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("backend/parsley.min.js") }}" type="text/javascript"></script>
@yield('scripts')
</body>
</html>

