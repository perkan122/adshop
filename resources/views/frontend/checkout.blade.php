@extends('frontend.main')

@section('title', '')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="row">
                <form method="POST" id="form" action="{{ route('billing') }}">
                    {{ csrf_field() }}
                    <div class="row text-center" style="padding-bottom: 10px;">
                        <h3 style="color: red; margin-left: 20px; font-size: 24px">
                            @if($language == 'sr')Informacije za dostavu @elseif($language == 'en')Delivery informations @endif
                        </h3>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="name" placeholder="@lang('translations.name')" required>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="surname" placeholder="@lang('translations.surname')" required>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="email" placeholder="@lang('translations.email')" required>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="telephone" placeholder="@lang('translations.phone_number')" required>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="address" placeholder="@lang('translations.street_number')" required>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="apartment" placeholder="@lang('translations.apartment')">
                    </div>
                    <div class="col-md-6" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="city" placeholder="@lang('translations.city')" required>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="post_number" placeholder="@lang('translations.post_number')" required>
                    </div>
                    <div class="col-md-12" style="padding-bottom: 60px;">
                        <textarea style="width: 100%; font-size: 15px; padding-left: 10px; border-radius: 5px" class="hokus" name="additional_note" cols="" rows="5" placeholder="@lang('translations.additional_note')"></textarea>
                    </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <h3 style="color: red; font-size: 24px">
                        @if($language == 'sr')Vaša narudžbina @elseif($language == 'en')Your order @endif
                    </h3>
                </div>
            </div>
            <div class="row">


                    <div class="portlet-body">
                        <div class="table-container table-responsive">
                            <table id="collections_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                <tr class="myTable">
                                 <!--   <th>@if($language == 'sr')Stavka @elseif($language == 'en')Item @endif</th> -->
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
                                              <!--  <td>
                                                    {{$cartItem->rowId}}
                                                </td>-->

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
                                                    {{ number_format($cartItem->price,2,',','.') }} <i>€</i>
                                                </td>
                                                <td>
                                                   {{$cartItem->qty}}
                                                </td>
                                                <td>
                                                    {{ number_format($cartItem->price * $cartItem->qty,2,',','.') }}<i> €</i>

                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center" style="padding-top: 30px;">
                    <br>

                    <div style="font-size: 20px;">
                        @if($language == 'sr')Ukupan iznos @elseif($language == 'en')Total @endif:   <td><strong><u>{{number_format($price,2,',','.')}} €</u></strong></td>

                    </div>

                    <i>*@if($language == 'sr')PDV nije obračunat u skladu sa članom 10. stav 2. tačka (3) Zakona o PDV-u. @elseif($language == 'en')VAT is not calculated in accordance with Article 10, paragraph 2, point (3) of the VAT Law. @endif</i><br>
                    <div style="margin-top: 20px;">
                    <input type="checkbox" class="checkboxConditions" name="paymentCondtions" id="paymentCondtions" value="paymentCondtions" required>
                    <label for="paymentCondtions">
                        @if($language == 'sr')Prihvatam <a href="{{route('conditions')}}" onclick="return popitup('{{ route('conditions') }}')" style="color: #da3f3f">USLOVE</a> kupovine
                        @elseif($language == 'en')I accept payment <a  href="{{ route('conditions') }}" onclick="return popitup('{{ route('conditions') }}')" style="color: #da3f3f">TERMS</a> @endif
                    </label>

                    </div>
                    <button type="submit" class="btn btn-success" name="enableDisable" id="enableDisable" style="width: 75%; margin-bottom: 5px; margin-top: 20px; font-size: 16px" disabled>
                        <b>
                            @if($language == 'sr')Potvrdi kupovinu @elseif($language == 'en')Confirm purchase @endif
                        </b>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#paymentCondtions').click(function () {
            //check if checkbox is checked
            if ($(this).is(':checked')) {

                $('#enableDisable').removeAttr('disabled'); //enable input

            } else {
                $('#enableDisable').attr('disabled', true); //disable input
            }
        });
    </script>

    <script language="javascript" type="text/javascript">
        <!--
        function popitup(url) {
            newwindow=window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=120,left=300,width=800,height=500");
            if (window.focus) {newwindow.focus()}
            return false;
        }

        // -->
    </script>

@endsection