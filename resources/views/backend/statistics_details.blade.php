@extends('backend.main')

@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->


        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Pregled statistike prodaje proizvoda od {{ Carbon\Carbon::parse($from)->format('d-m-Y') }} do {{ Carbon\Carbon::parse($to)->format('d-m-Y') }}.godine </div>
                    </div>
                    <div class="portlet-body" >
                        <div class="row">
                            <div class= "col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label class="col-md-6  control-label"><b>Fizički broj naloga:</b>
                                    </label>
                                    <div class="col-md-3">
                                        <input class="form-control" name="title_sr" value="{{$numberOfOrders}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class= "col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label class="col-md-8  control-label"><b>Ukupna zarada za odabrani period:</b>
                                    </label>
                                    <div class="col-md-4">
                                        <input class="form-control" name="title_sr" value="{{$salary.' €'}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>

                        </div>
                        <div class="table-container">
                            <div class="col-md-4 col-md-offset-4"><h4>Najprodavanije konfiguracije vrata</h4></div>
                            <table id="orders_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                <th>ID</th>
                                <th>Prodata količina</th>
                                <th>Osnovna konfiguracija</th>
                                <th colspan="4" align="center">Specifikacija modela</th>
                                <th>Cena</th>
                                </thead>

                                <tbody>
                                @foreach ($configurations as $configuration)
                                    <tr>
                                        <td style="vertical-align:middle">{{ $configuration->id }}</td>
                                        <td style="vertical-align:middle">{{ $configuration->sold_quantity }}</td>
                                        <td style="vertical-align:middle">
                                            {{ $configuration->basicConfiguration->doorModel->name }}<br>
                                            {{ $configuration->basicConfiguration->doorType->name }}<br>
                                            {{ $configuration->basicConfiguration->dimension->width.'x'.$configuration->basicConfiguration->dimension->height.'cm' }}
                                        </td>
                                        <td style="vertical-align:middle">
                                            {{ $configuration->doorLeafFilling->name }}<br>
                                            {{ $configuration->finalTreatment->name }}<br>
                                            {{ $configuration->kanelura->name }}<br>
                                        </td>
                                        <td style="vertical-align:middle">
                                            @if($configuration->pervajz_wall_width_id)
                                                {{$configuration->pervajzWallWidth->name}} <br>
                                            @endif
                                            @if($configuration->hinge_id)
                                                {{$configuration->hinge->name}} <br>
                                            @endif
                                            @if($configuration->doorstep_id)
                                                {{$configuration->doorstep->name}} <br>
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle">
                                            @if($configuration->doorlock_kind_id)
                                                {{$configuration->doorlockKind->name}} <br>
                                            @endif
                                            @if($configuration->doorlock_type_id)
                                                {{$configuration->doorlockType->name}} <br>
                                            @endif
                                            @if($configuration->door_handle_id)
                                                {{$configuration->doorHandle->name}} <br>
                                            @endif
                                            @if($configuration->opening_way_id)
                                                {{$configuration->openingWay->name}} <br>
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle">
                                            @if($configuration->track_id)
                                                {{$configuration->track->name}} <br>
                                            @endif
                                            @if($configuration->ventilation_grid_id)
                                                {{$configuration->ventilationGrid->name}} <br>
                                            @endif
                                            @if($configuration->stopper_id)
                                                {{$configuration->stopper->name}} <br>
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle;">{{ $configuration->price.' €' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <br>
                            <hr>
                            <div class="col-md-offset-3 col-md-9">
                                <a type="button" href="{{route('statistics.create')}}" class="btn red">
                                    <i class="fa fa-repeat"></i> Ponovi proračun</a>
                                <a type="button" href="{{route('orders.index')}}" class="btn default">Početna</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>

@endsection
