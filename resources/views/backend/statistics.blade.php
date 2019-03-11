@extends('backend.main')

@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            @if (Session::has('date_format_incorrect'))
                <div style="text-align: center" class="alert alert-warning col-md-6 col-md-offset-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ Session::get('date_format_incorrect') }}</strong>
                </div>
            @endif
                @if (Session::has('no_orders'))
                    <div style="text-align: center" class="alert alert-warning col-md-6 col-md-offset-3" role="alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ Session::get('no_orders') }}</strong>
                    </div>
                @endif
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Vremenski period za proračun statistike prodaje proizvoda </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="{{route('statistics.index')}}" class="form-horizontal form-bordered" >
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Od</label>
                                    <div class="col-md-4">
                                        <div class="input-group" >
                                            <input id="from" name="from" type="date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Do</label>
                                    <div class="col-md-4">
                                        <div class="input-group" >
                                            <input id="to" name="to" type="date" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn red">
                                            <i class="fa fa-check"></i> Potvrdi</button>
                                        <a type="button" href="{{route('orders.index')}}" class="btn default">Početna</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>

@endsection
