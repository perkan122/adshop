@extends('frontend.main')

@section('title', '')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 col-md-offset-5 text-center">
                    <h3 style="color: red; font-size: 24px">
                        @if($language == 'sr')Vaša korpa @elseif($language == 'en')Your cart @endif
                    </h3>
                </div>
            </div>
            <div class="row">
                <form action="{{route('updateCart',[ $rowids] )}}" method="post">
                    {{csrf_field()}}

                <div class="portlet-body">
                    <div class="table-container table-responsive">
                        <table id="collections_table" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr class="myTable">
                                <th>@if($language == 'sr')Ukloni @elseif($language == 'en')Remove @endif</th>
                                <th>@if($language == 'sr')Osnovna konfiguracija @elseif($language == 'en')Basic configuration @endif</th>
                                <th colspan="4" align="center">@if($language == 'sr')Specifikacija modela @elseif($language == 'en')Model specification @endif</th>
                                <th style="padding: 5px;">@if($language == 'sr')Ugradnja @elseif($language == 'en')Installation @endif</th>
                                <th style="padding: 5px;">@if($language == 'sr')Cena @elseif($language == 'en')Price @endif</th>
                                <th>@if($language == 'sr')Količina @elseif($language == 'en')Quantity @endif</th>
                                <th>@if($language == 'sr')Ukupno @elseif($language == 'en')Total @endif</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cartItems as $cartItem)
                                @foreach ($config2s as $config2)

                                    @if($cartItem->id == $config2->id)

                                <tr class="myTable" style="text-align:center;">
                                    <td>
                                        <a href="{{ route('removeFromCart', $cartItem->rowId) }}" class="btn btn-danger rounding"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                                    </td>

                                    <td style="vertical-align:middle">
                                        @if($language == 'sr'){{ $config2->basicConfiguration->doorModel->name }} @elseif($language == 'en'){{ $config2->basicConfiguration->doorModel->name_en}}@endif <br>
                                            @if($language == 'sr'){{ $config2->basicConfiguration->doorType->name }} @elseif($language == 'en'){{ $config2->basicConfiguration->doorType->name_en}}@endif <br>
                                        {{ $config2->basicConfiguration->dimension->width.'x'.$config2->basicConfiguration->dimension->height.'cm' }}
                                    </td>

                                    <td style="vertical-align:middle">
                                        @if($language == 'sr'){{ $config2->doorLeafFilling->name }} @elseif($language == 'en'){{ $config2->doorLeafFilling->name_en}}@endif <br>
                                        @if($language == 'sr'){{ $config2->finalTreatment->name }} @elseif($language == 'en'){{ $config2->finalTreatment->name_en}}@endif <br>
                                        @if($language == 'sr'){{ $config2->kanelura->name }} @elseif($language == 'en'){{ $config2->kanelura->name_en}}@endif <br>
                                    </td>
                                    <td style="vertical-align:middle">
                                        @if($config2->pervajz_wall_width_id)
                                            @if($language == 'sr'){{ $config2->pervajzWallWidth->name }} @elseif($language == 'en'){{ $config2->pervajzWallWidth->name_en}}@endif <br>
                                        @endif
                                        @if($config2->hinge_id)
                                            @if($language == 'sr'){{ $config2->hinge->name }} @elseif($language == 'en'){{ $config2->hinge->name_en}}@endif <br>
                                        @endif
                                        @if($config2->doorstep_id)
                                                @if($language == 'sr'){{ $config2->doorstep->name }} @elseif($language == 'en'){{ $config2->doorstep->name_en}}@endif <br>
                                        @endif
                                    </td>
                                    <td style="vertical-align:middle">
                                        @if($config2->doorlock_kind_id)
                                            @if($language == 'sr'){{ $config2->doorlockKind->name }} @elseif($language == 'en'){{ $config2->doorlockKind->name_en}}@endif <br>
                                        @endif
                                        @if($config2->doorlock_type_id)
                                                @if($language == 'sr'){{ $config2->doorlockType->name }} @elseif($language == 'en'){{ $config2->doorlockType->name_en}}@endif <br>
                                        @endif
                                        @if($config2->door_handle_id)
                                                @if($language == 'sr'){{ $config2->doorHandle->name }} @elseif($language == 'en'){{ $config2->doorHandle->name_en}}@endif <br>
                                        @endif
                                        @if($config2->opening_way_id)
                                                @if($language == 'sr'){{ $config2->openingWay->name }} @elseif($language == 'en'){{ $config2->openingWay->name_en}}@endif <br>
                                        @endif
                                    </td>
                                    <td style="vertical-align:middle">
                                        @if($config2->track_id)
                                            @if($language == 'sr'){{ $config2->track->name }} @elseif($language == 'en'){{ $config2->track->name_en}}@endif <br>
                                        @endif
                                        @if($config2->ventilation_grid_id)
                                                @if($language == 'sr'){{ $config2->ventilationGrid->name }} @elseif($language == 'en'){{ $config2->ventilationGrid->name_en}}@endif <br>
                                        @endif
                                        @if($config2->stopper_id)
                                                @if($language == 'sr'){{ $config2->stopper->name }} @elseif($language == 'en'){{ $config2->stopper->name_en}}@endif <br>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($assemblies as $assembly)
                                            @if($assembly->id == $cartItem->options['assembly'])
                                              @if($language == 'sr')  {{$assembly->name}} @elseif($language == 'en'){{$assembly->name_en}}@endif/
                                             @endif
                                        @endforeach

                                            @foreach ($disassemblies as $disassembly)
                                                @if($disassembly->id == $cartItem->options['disassembly'])
                                                    @if($language == 'sr')  {{$disassembly->name}} @elseif($language == 'en'){{$disassembly->name_en}}@endif
                                                @endif
                                             @endforeach

                                    <td>
                                        {{number_format($cartItem->price,2,',','.') }} <i>€</i>
                                    </td>
                                    <td style="width: 150px">
                                        <div class="input-group" style="width: 120px; margin-left: 10px;">
                                            <span class="input-group-btn">
                                               <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[{{$cartItem->rowId}}]">
                                             <span class="glyphicon glyphicon-minus"></span>
                                                 </button>
                                           </span>
                                            <input type="text" name="quant[{{$cartItem->rowId}}]" class="form-control input-number text-center" value="{{ $cartItem->qty }}" min="1" max="100">
                                            <span class="input-group-btn">
                                                  <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[{{$cartItem->rowId}}]">
                                               <span class="glyphicon glyphicon-plus"></span>
                                                 </button>
                                               </span>
                                        </div>
                                    </td>
                                    <td>
                                        {{number_format($cartItem->price * $cartItem->qty,2,',','.') }}<i> €</i>

                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            @endforeach
                            <tr style="text-align:center; border: solid 2px #7b7b7b;">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="border: solid 2px #7b7b7b;">
                                    <button type="submit" class="btn addToCart" id="enableDisable" style="margin-top: 5px; margin-bottom: 5px">
                                        <b>
                                            @if($language == 'sr')Ažuriraj @elseif($language == 'en')Update @endif
                                        </b>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center" style="padding-top: 30px;">
                    <br>

                        <div style="font-size: 20px;">
                            @if($language == 'sr')Ukupan iznos @elseif($language == 'en')Total @endif:   <td><strong><u>{{number_format($price,2,',','.')}} €</u></strong></td>

                        </div>

                    <i>*@if($language == 'sr')PDV nije obračunat u skladu sa članom 10. stav 2. tačka (3) Zakona o PDV-u. @elseif($language == 'en')VAT is not calculated in accordance with Article 10, paragraph 2, point (3) of the VAT Law. @endif</i><br>
                    <a style="width: 60%; margin-top: 20px; font-size: 16px" href="{{ route('checkout') }}" class="btn btn-success rounding">
                        <b>
                            @if($language == 'sr')Nastavi na kasu @elseif($language == 'en')Proceed to checkout @endif
                        </b>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.btn-number').click(function(e){
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if(type == 'minus') {

                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {

                    if(currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if(parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function(){
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            minValue =  parseInt($(this).attr('min'));
            maxValue =  parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if(valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if(valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>
@endsection