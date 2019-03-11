@extends('backend.main')

@section('content')
    <div class="page-content">
        <div class="row">
            {{--<!-- BEGIN PAGE BAR -->--}}
            {{--<div class="page-bar">--}}
            {{--<ul class="page-breadcrumb">--}}
            {{--<li>--}}
            {{--<a href="{{ route('orders.index') }}">Почетна</a>--}}
            {{--<i class="fa fa-circle"></i>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<span>Детаљи наруџбине</span>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--<!-- END PAGE BAR -->--}}

            {{--<div class="row">--}}
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <br>
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-present font-green"></i>
                            <span class="caption-subject font-green sbold uppercase"> Prikaz stavki narudžbine </span>
                        </div>
                        @if($order->order_status == 0)
                            <a style="float:right;" href="{{ route('orders.update', $order->id) }}"  class="btn btn-success"
                               onclick="event.preventDefault();
                            document.getElementById('update-form').submit();">
                                <i class="glyphicon glyphicon-ok"></i>&nbsp;
                                <span class="title">Odobri narudžbinu?</span>
                            </a>
                        @elseif($order->order_status == 1)
                            <a style="float:right;" href="{{ route('orders.update', $order->id) }}"  class="btn btn-success"
                               onclick="event.preventDefault();
                            document.getElementById('update-form').submit();">
                                <i class="glyphicon glyphicon-ok"></i>&nbsp;
                                <span class="title">Potvrdi isporuku-ugradnju?</span>

                            </a>
                        @elseif($order->order_status == 2)
                            <h3 style="padding: 10px" class="label label-primary pull-right">
                                <i class="glyphicon glyphicon-ok"></i>&nbsp;
                                <span class="title">Isporučeno / ugrađeno</span>
                            </h3>
                        @endif
                        <form id="update-form" action="{{ route('orders.update', $order->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table id="order_details_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                <th>#</th>
                                <th>Konfiguracija</th>
                                <th colspan="4">Specifikacija modela</th>
                                <th>Ugradnja</th>
                                <th>Količina</th>
                                <th>Dimenzije</th>
                                <th>Cena</th>
                                <th>Izmeni</th>
                                </thead>
                                <tbody>
                                @foreach ($orderItems as $orderItem)
                                    <tr>
                                        <td style="width: 20px;">{{ $i++ }}</td>
                                        <td style="vertical-align:middle">
                                            {{ $orderItem->configuration->basicConfiguration->doorModel->name }}<br>
                                            {{ $orderItem->configuration->basicConfiguration->doorType->name }}<br>
                                            {{ $orderItem->configuration->basicConfiguration->dimension->width.'x'.$orderItem->configuration->basicConfiguration->dimension->height.'cm' }}
                                        </td>
                                        <td style="vertical-align:middle">
                                            {{ $orderItem->configuration->doorLeafFilling->name }}<br>
                                            {{ $orderItem->configuration->finalTreatment->name }}<br>
                                            {{ $orderItem->configuration->kanelura->name }}<br>
                                        </td>
                                        <td style="vertical-align:middle">
                                            @if($orderItem->configuration->pervajz_wall_width_id)
                                                {{$orderItem->configuration->pervajzWallWidth->name}} <br>
                                            @endif
                                            @if($orderItem->configuration->hinge_id)
                                                {{$orderItem->configuration->hinge->name}} <br>
                                            @endif
                                            @if($orderItem->configuration->doorstep_id)
                                                {{$orderItem->configuration->doorstep->name}} <br>
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle">
                                            @if($orderItem->configuration->doorlock_kind_id)
                                                {{$orderItem->configuration->doorlockKind->name}} <br>
                                            @endif
                                            @if($orderItem->configuration->doorlock_type_id)
                                                {{$orderItem->configuration->doorlockType->name}} <br>
                                            @endif
                                            @if($orderItem->configuration->door_handle_id)
                                                {{$orderItem->configuration->doorHandle->name}} <br>
                                            @endif
                                            @if($orderItem->configuration->opening_way_id)
                                                {{$orderItem->configuration->openingWay->name}} <br>
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle">
                                            @if($orderItem->configuration->track_id)
                                                {{$orderItem->configuration->track->name}} <br>
                                            @endif
                                            @if($orderItem->configuration->ventilation_grid_id)
                                                {{$orderItem->configuration->ventilationGrid->name}} <br>
                                            @endif
                                            @if($orderItem->configuration->stopper_id)
                                                {{$orderItem->configuration->stopper->name}} <br>
                                            @endif
                                        </td>
                                        <td>{{ $orderItem->assembly->name }}/{{ $orderItem->disassembly->name }}</td>
                                        <td>{{ $orderItem->quantity }}</td>
                                        <td>
                                             @if($orderItem->width && $orderItem->height )
                                                {{$orderItem->width.'x'.$orderItem->height.'cm'}}
                                             @else
                                                 /
                                            @endif </td>
                                        <td>{{ $orderItem->item_price * $orderItem->quantity.' €' }}</td>
                                        <td align="center"> <a href="{{ route('order_items.edit', $orderItem->id)}}" >
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <h3 style="font-size: 18px; padding: 10px" class="label label-success pull-right">Ukupno:&nbsp;<b>{{ $order->total_price.' €' }}</b></h3>
                        </div>
                        <br><br><br>
                        <div class="col-md-5 col-sm-12">
                            <br><br>
                            <div class="caption" style="font-size: 18px; padding-left: 10px">
                                <i class="icon-user font-green"></i>&nbsp;
                                <span class="caption-subject font-green sbold uppercase"> Podaci o kupcu </span>
                            </div>
                            <br>
                            <table class="order_details table table-bordered table-responsive">
                                <thead>
                                <th>Ime i prezime</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $order->customer->name }}&nbsp;{{ $order->customer->surname }}</td>
                                    <td>{{ $order->customer->telephone }}</td>
                                    <td>{{ $order->customer->email }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <br><br>
                            <div class="caption" style="font-size: 18px; padding-left: 10px">
                                <i class="icon-map font-green"></i>&nbsp;
                                <span class="caption-subject font-green sbold uppercase"> Podaci za dostavu </span>
                            </div>
                            <br>
                            <table class="order_details table table-bordered table-responsive">
                                <thead>
                                <th>Adresa</th>
                                <th>Stan</th>
                                <th>Grad</th>
                                <th>Napomena</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $order->customer->address }}</td>
                                    <td>{{ $order->customer->apartment }}</td>
                                    <td>{{ $order->customer->city }}</td>
                                    <td>{{ $order->additional_note }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
