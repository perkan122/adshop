<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ponuda broj <strong>{{$order->id}} </strong></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: DejaVu Sans;
        }
    </style>
</head>
<body>
    <div class="well text-center" >
        <img src="http://v2.activedesign.rs/wp-content/uploads/2017/04/imageedit_1_8822475310.png" class="img-responsive"   alt=""  width="150px">
        <h4 class="text-center">Ponuda broj <strong>{{$order->id}} </strong> za izradu unutrašnjih vrata</h4>
    </div>
    <div class="col-md-12">
            <h4>Prikaz stavki narudžbine</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Konfiguracija</th>
                        <th colspan="2">Specifikacija modela</th>
                        <th style="width: 120px">Ugradnja</th>
                        <th style="width: 50px">Kol</th>
                        <th style="width: 80px">Cena</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderItems as $orderItem)
                        <tr>
                            <td style="width: 20px;">{{ 1 }}</td>
                            <td>
                                {{ $orderItem->configuration->basicConfiguration->doorModel->name }}<br>
                                {{ $orderItem->configuration->basicConfiguration->doorType->name }}<br>
                                {{ $orderItem->configuration->basicConfiguration->dimension->width.'x'.$orderItem->configuration->basicConfiguration->dimension->height.'cm' }}
                            </td>
                            <td >
                                {{ $orderItem->configuration->doorLeafFilling->name }}<br>
                                {{ $orderItem->configuration->finalTreatment->name }}<br>
                                {{ $orderItem->configuration->kanelura->name }}<br>
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
                            <td>
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
                            <td>{{ $orderItem->assembly->name }}<br>{{ $orderItem->disassembly->name }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->item_price * $orderItem->quantity.' EUR' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
    <br>
    <div class="col-md-4">
        <h3 style="font-size: 18px; padding: 10px" class="label label-success pull-right">Ukupno:&nbsp;<b>{{ $order->total_price.' €' }}</b></h3>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
            <h4>Podaci o kupcu</h4>
         <div class="table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Ime i prezime</th>
                    <th>Telefon</th>
                    <th>Email</th>
                </tr>
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
    </div>
    <div class="col-md-12">
            <h4>Podaci za dostavu</h4>
        <div class="table table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Adresa</th>
                    <th>Stan</th>
                    <th>Grad</th>
                    <th>Napomena</th>
                </tr>
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
    <div class="col-md-12">
        <pre style="font-family: DejaVu Sans;">
        Za promet po ovoj ponudi PDV nije obračunat u skladu sa članom 10. stav 2. tačka (3) Zakona o PDV-u.
        Ponudom obuhvaćeni izrada, transport i montaža.
        Rok izrade: po dogovoru.
        Način plaćanja: po dogovoru.
        Ponuda važi 30 dana.
        </pre>

    </div>
    <div>
    <div style="width: 48%;float: left">
        <pre style="font-family: DejaVu Sans;">
            Za Active Design d.o.o.
            Bojan Žarković
            +381 62/885 2947
            bojan.zarkovic@activedesign.rs
        </pre>
    </div>
    <div style="width: 4%;float: left">

    </div>
    <div style="width: 48%;float: left">
         <pre style="font-family: DejaVu Sans;">

            Sa ponudom saglasan

            _____________________

        </pre>
    </div>
    </div>

</body>
</html>