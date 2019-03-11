@extends('backend.main')

@section('content')

    <div class="page-content">
        <div class="row">
            @if (Session::has('order_status_changed'))
                <div style="text-align: center" class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ Session::get('order_status_changed') }}</strong>
                </div>
            @endif
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green sbold uppercase"> Pregled narudžbina </span>
                        </div>
                    </div>
                    <div class="portlet-body" >
                        <div class="table-container">
                            <table id="orders_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                <th style="width:10px">#</th>
                                <th>Vreme i datum</th>
                                <th>Naručilac</th>
                                <th>Adresa</th>
                                <th>Cena</th>
                                <th style="width:100px">Status plaćanja</th>
                                <th style="width:100px">Status narudžbine</th>
                                <th>Detalji </th>
                                <th>Faktura </th>
                                </thead>

                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td style="vertical-align:middle">{{ $order->id }}</td>
                                        <td style="vertical-align:middle">{{ date('H:i', strtotime($order->created_at)) }}&nbsp;&nbsp;&nbsp;&nbsp;{{ date('j.n.Y.', strtotime($order->created_at)) }}</td>
                                        <td style="vertical-align:middle">{{ $order->customer->name }} {{ $order->customer->surname }}</td>
                                        <td style="vertical-align:middle">{{ $order->customer->address }}/{{ $order->customer->apartment }}</td>
                                        <td style="vertical-align:middle">{{ $order->total_price.' €' }} </td>
                                        @if($order->payment_status == '2')
                                            <td style="vertical-align:middle;"><h4><span class="label label-lg label-success">Plaćeno</span></h4></td>
                                        @elseif($order->payment_status == '1')
                                            <td style="vertical-align:middle;"><h4><span style="border-radius: 25px;" class="label label-primary">Uplaćen avans</span></h4></td>
                                        @elseif($order->payment_status == '0')
                                            <td style="vertical-align:middle;"><h4><span style="border-radius: 25px;" class="label label-warning">Nije plaćeno</span></h4></td>
                                        @endif

                                        @if($order->order_status == '2')
                                            <td style="vertical-align:middle;"><h4><span class="label label-lg label-success">Isporučeno</span></h4></td>
                                        @elseif($order->order_status == '1')
                                            <td style="vertical-align:middle;"><h4><span style="border-radius: 25px;" class="label label-primary">Odobrena</span></h4></td>
                                        @elseif($order->order_status == '0')
                                            <td style="vertical-align:middle;"><h4><span style="border-radius: 25px;" class="label label-warning">Na čekanju</span></h4></td>
                                        @endif
                                        <td style="vertical-align:middle;">
                                            <a href="{{route('orders.edit',$order->id)}}" style="border-radius: 25px;" class="btn btn-primary">Detalji</a>
                                        </td>
                                        <td style="vertical-align:middle;">
                                            {{--<a href="{{route('Export_excel')}}" style="border-radius: 25px;" class="btn btn-primary btn-sm">Export Excel</a>--}}
                                            {{--<a href="{{route('Export_word')}}" style="border-radius: 25px;" class="btn btn-primary btn-sm">Export Word</a>--}}
                                            <a href="{{route('Export_pdf',$order->id)}}" style="border-radius: 25px;" class="btn btn-primary btn-sm">Preuzmi PDF</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection