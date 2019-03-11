@extends('frontend.main')

@section('title', '')

@section('content')

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <h3 class="text-center" style="color: red;">@lang('translations.configuration'):</h3>

            <form action="{{route('updateConfiguration', $config2->id)}}" method="post">
                {{csrf_field()}}

            <div class="table-container table-responsive">
                <table class="display" cellspacing="0" width="90%">
                    <thead>
                    <tr class="myTable">
                        <th>@if($language == 'sr')Model vrata @elseif($language == 'en')Door model @endif</th>
                        <th>@if($language == 'sr'){{$config2->basicConfiguration->doorModel->name}} @elseif($language == 'en'){{$config2->basicConfiguration->doorModel->name_en}}@endif</th>

                    </tr>
                    </thead>
                    <tbody>

                        <tr class="myTable" style="text-align:center;">
                            <th>@if($language == 'sr')Vrsta vrata @elseif($language == 'en')Door type @endif</th>
                            <th>@if($language == 'sr'){{$config2->basicConfiguration->doorType->name}} @elseif($language == 'en'){{$config2->basicConfiguration->doorType->name_en}}@endif</th>
                        </tr>
                        <tr class="myTable" style="text-align:center;">
                            <th>@if($language == 'sr')Dimenzije vrata @elseif($language == 'en')Door dimensions @endif</th>
                       <!--     <th>{{$config2->basicConfiguration->dimension->width}} x {{$config2->basicConfiguration->dimension->height}} cm ( {{$config2->basicConfiguration->price}} € )</th> -->
                            <th>
                                <select name="basicConfiguration" class="form-control text-center" required>

                                    @foreach($basicConfigurations as $basicConfiguration)
                                        <option value="{{$basicConfiguration->id}}" @if($config2->basic_configuration_id == $basicConfiguration->id) selected @endif> {{$basicConfiguration->dimension->width}}  x  {{$basicConfiguration->dimension->height}} cm ( {{$basicConfiguration->price}} €)</option>
                                    @endforeach

                                </select>
                            </th>
                        </tr>
                        <tr class="myTable" style="text-align:center;">
                            <th>@if($language == 'sr')Ispuna vratnog krila @elseif($language == 'en')Door leaf filling @endif</th>
                            <th>
                                <select name="filing" class="form-control text-center" required>

                                    @foreach($filings as $filing)
                                        @if($filing->price == 0)
                                            <option value="{{$filing->id}}"@if($config2->door_leaf_filling_id == $filing->id) selected @endif> @if($language == 'sr'){{$filing->name}} @elseif($language == 'en'){{$filing->name_en}} @endif </option>
                                         @else
                                            <option value="{{$filing->id}}"@if($config2->door_leaf_filling_id == $filing->id) selected @endif>@if($language == 'sr'){{$filing->name}} ( @elseif($language == 'en'){{$filing->name_en}} ( @endif   {{$filing->price}} € )</option>
                                         @endif
                                    @endforeach
                                </select>
                            </th>
                        </tr>
                        <tr class="myTable" style="text-align:center;">
                            <th>@if($language == 'sr')Završna obrada @elseif($language == 'en')Final treatment @endif</th>
                            <th>
                                <select name="treatment" class="form-control text-center" required>

                                    @foreach($treatments as $treatment)
                                        @if($treatment->price == 0)
                                            <option value="{{$treatment->id}}"@if($config2->final_treatment_id == $treatment->id) selected @endif> @if($language == 'sr'){{$treatment->name}} @elseif($language == 'en'){{$treatment->name_en}} @endif </option>
                                        @else
                                            <option value="{{$treatment->id}}"@if($config2->final_treatment_id == $treatment->id) selected @endif>@if($language == 'sr'){{$treatment->name}} ( @elseif($language == 'en'){{$treatment->name_en}} ( @endif   {{$treatment->price}} € )</option>
                                        @endif
                                    @endforeach
                                </select>
                            </th>
                             </tr>
                        <tr class="myTable" style="text-align:center;">
                            <th>@if($language == 'sr')Kanelure @elseif($language == 'en')Kanelure @endif</th>
                            <th>
                                <select name="kanelura" class="form-control text-center" required>

                                    @foreach($kaneluras as $kanelura)
                                        @if($kanelura->price == 0)
                                            <option value="{{$kanelura->id}}"@if($config2->kanelura_id == $kanelura->id) selected @endif> @if($language == 'sr'){{$kanelura->name}} @elseif($language == 'en'){{$kanelura->name_en}} @endif </option>
                                        @else
                                            <option value="{{$kanelura->id}}"@if($config2->kanelura_id == $kanelura->id) selected @endif>@if($language == 'sr'){{$kanelura->name}} ( @elseif($language == 'en'){{$kanelura->name_en}} ( @endif   {{$kanelura->price}} € )</option>
                                        @endif
                                    @endforeach
                                </select>
                            </th>
                        </tr>
                        @if($config2->pervajz_wall_width_id)
                        <tr class="myTable" style="text-align:center;">
                            <th>@if($language == 'sr')Širina zida pervajz @elseif($language == 'en')Wall width pervajz @endif</th>
                            <th>
                                <select name="pervajz" class="form-control text-center" required>

                                    @foreach($pervajzs as $pervajz)
                                            <option value="{{$pervajz->id}}"@if($config2->pervajz_wall_width_id == $pervajz->id) selected @endif>@if($language == 'sr'){{$pervajz->name}} ( @elseif($language == 'en'){{$pervajz->name_en}} ( @endif   {{$pervajz->price}} € )</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>
                        @endif
                        @if($config2->hinge_id)
                            <tr class="myTable" style="text-align:center;">
                                <th>@if($language == 'sr')Šarke @elseif($language == 'en')Hinges @endif</th>
                                <th>
                                    <select name="hinges" class="form-control text-center" required>

                                        @foreach($hinges as $hinge)
                                            @if($hinge->price == 0)
                                                <option value="{{$hinge->id}}"@if($config2->hinge_id == $hinge->id) selected @endif> @if($language == 'sr'){{$hinge->name}} @elseif($language == 'en'){{$hinge->name_en}} @endif </option>
                                            @else
                                                <option value="{{$hinge->id}}"@if($config2->hinge_id == $hinge->id) selected @endif>@if($language == 'sr'){{$hinge->name}} ( @elseif($language == 'en'){{$hinge->name_en}} ( @endif   {{$hinge->price}} € )</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        @endif
                        @if($config2->doorstep_id)
                            <tr class="myTable" style="text-align:center;">
                                <th>@if($language == 'sr')Prag @elseif($language == 'en')Doorstep @endif</th>
                                <th>
                                    <select name="doorstep" class="form-control text-center" required>

                                        @foreach($doorsteps as $doorstep)
                                            @if($doorstep->price == 0)
                                                <option value="{{$doorstep->id}}"@if($config2->doorstep_id == $doorstep->id) selected @endif> @if($language == 'sr'){{$doorstep->name}} @elseif($language == 'en'){{$doorstep->name_en}} @endif </option>
                                            @else
                                                <option value="{{$doorstep->id}}"@if($config2->doorstep_id == $doorstep->id) selected @endif>@if($language == 'sr'){{$doorstep->name}} ( @elseif($language == 'en'){{$doorstep->name_en}} ( @endif   {{$doorstep->price}} € )</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        @endif
                        <tr class="myTable" style="text-align:center;">
                            <th>@if($language == 'sr')Tip brave @elseif($language == 'en')Doorlock kind @endif</th>
                            <th>
                                <select name="doorlock_kind" class="form-control text-center" required>

                                    @foreach($doorlockKinds as $doorlockKind)
                                        @if($doorlockKind->price == 0)
                                            <option value="{{$doorlockKind->id}}"@if($config2->doorlock_kind_id == $doorlockKind->id) selected @endif> @if($language == 'sr'){{$doorlockKind->name}} @elseif($language == 'en'){{$doorlockKind->name_en}} @endif </option>
                                        @else
                                            <option value="{{$doorlockKind->id}}"@if($config2->doorlock_kind_id == $doorlockKind->id) selected @endif>@if($language == 'sr'){{$doorlockKind->name}} ( @elseif($language == 'en'){{$doorlockKind->name_en}} ( @endif   {{$doorlockKind->price}} € )</option>
                                        @endif
                                    @endforeach
                                </select>
                            </th>
                        </tr>
                        @if($config2->doorlock_type_id)
                            <tr class="myTable" style="text-align:center;">
                                <th>@if($language == 'sr')Vrsta brave @elseif($language == 'en')Doorlock type @endif</th>
                                <th>
                                    <select name="doorlock_type" class="form-control text-center" required>

                                        @foreach($doorlockTypes as $doorlockType)
                                            @if($doorlockType->price == 0)
                                                <option value="{{$doorlockType->id}}"@if($config2->doorlock_type_id == $doorlockType->id) selected @endif> @if($language == 'sr'){{$doorlockType->name}} @elseif($language == 'en'){{$doorlockType->name_en}} @endif </option>
                                            @else
                                                <option value="{{$doorlockType->id}}"@if($config2->doorlock_type_id == $doorlockType->id) selected @endif>@if($language == 'sr'){{$doorlockType->name}} ( @elseif($language == 'en'){{$doorlockType->name_en}} ( @endif   {{$doorlockType->price}} € )</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        @endif
                        @if($config2->door_handle_id)
                            <tr class="myTable" style="text-align:center;">
                                <th>@if($language == 'sr')Kvaka @elseif($language == 'en')Door handle @endif</th>
                                <th>
                                    <select name="door_handle" class="form-control text-center" required>

                                        @foreach($doorHandles as $doorHandle)
                                            <option value="{{$doorHandle->id}}"@if($config2->door_handle_id == $doorHandle->id) selected @endif>@if($language == 'sr'){{$doorHandle->name}} ( @elseif($language == 'en'){{$doorHandle->name_en}} ( @endif   {{$doorHandle->price}} € )</option>
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        @endif
                        @if($config2->opening_way_id)
                            <tr class="myTable" style="text-align:center;">
                                <th>@if($language == 'sr')Način otvaranja @elseif($language == 'en')Door opening way @endif</th>
                                <th>
                                    <select name="opening_way" class="form-control text-center" required>

                                        @foreach($openingWays as $openingWay)
                                            <option value="{{$openingWay->id}}"@if($config2->opening_way_id == $openingWay->id) selected @endif>@if($language == 'sr'){{$openingWay->name}}  @elseif($language == 'en'){{$openingWay->name_en}} @endif</option>
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        @endif
                        @if($config2->track_id)
                            <tr class="myTable" style="text-align:center;">
                                <th>@if($language == 'sr')Šina @elseif($language == 'en')Door track @endif</th>
                                <th>
                                    <select name="track" class="form-control text-center" required>

                                        @foreach($tracks as $track)
                                            @if($track->price == 0)
                                                <option value="{{$track->id}}"@if($config2->track_id == $track->id) selected @endif> @if($language == 'sr'){{$track->name}} @elseif($language == 'en'){{$track->name_en}} @endif </option>
                                            @else
                                                <option value="{{$track->id}}"@if($config2->track_id == $track->id) selected @endif>@if($language == 'sr'){{$track->name}} ( @elseif($language == 'en'){{$track->name_en}} ( @endif   {{$track->price}} € )</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        @endif
                        @if($config2->ventilation_grid_id)
                            <tr class="myTable" style="text-align:center;">
                                <th>@if($language == 'sr')Ventilaciona rešetka @elseif($language == 'en')Ventilation grid @endif</th>
                                <th>
                                    <select name="ventilation_grid" class="form-control text-center" required>

                                        @foreach($ventilationGrids as $ventilationGrid)
                                            @if($ventilationGrid->price == 0)
                                                <option value="{{$ventilationGrid->id}}"@if($config2->ventilation_grid_id == $ventilationGrid->id) selected @endif> @if($language == 'sr'){{$ventilationGrid->name}} @elseif($language == 'en'){{$ventilationGrid->name_en}} @endif </option>
                                            @else
                                                <option value="{{$ventilationGrid->id}}"@if($config2->ventilation_grid_id == $ventilationGrid->id) selected @endif>@if($language == 'sr'){{$ventilationGrid->name}} ( @elseif($language == 'en'){{$ventilationGrid->name_en}} ( @endif   {{$ventilationGrid->price}} € )</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        @endif
                        @if($config2->stopper_id)
                            <tr class="myTable" style="text-align:center;">
                                <th>@if($language == 'sr')Podni stoper @elseif($language == 'en')Floor stopper @endif</th>
                                <th>
                                    <select name="stopper" class="form-control text-center" required>

                                        @foreach($stoppers as $stopper)
                                            @if($stopper->price == 0)
                                                <option value="{{$stopper->id}}"@if($config2->stopper_id == $stopper->id) selected @endif> @if($language == 'sr'){{$stopper->name}} @elseif($language == 'en'){{$stopper->name_en}} @endif </option>
                                            @else
                                                <option value="{{$stopper->id}}"@if($config2->stopper_id == $stopper->id) selected @endif>@if($language == 'sr'){{$stopper->name}} ( @elseif($language == 'en'){{$stopper->name_en}} ( @endif   {{$stopper->price}} € )</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        @endif



                    </tbody>
                </table>

            </div>
                <div class="row text-center">
            <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn addToCart"  style="margin-top: 5px; margin-bottom: 5px">
                    <b>
                        @if($language == 'sr')Potvrdi @elseif($language == 'en')Confirm @endif
                    </b>
                </button>
            </div>
                </div>

            </form>
        </div>


        <form action="{{route('add_to_cart', $config2->id)}}" method="post">
            {{csrf_field()}}
        <div class="col-md-4" style="padding-top: 3%">
            <div class="col-md-12 text-center" style="padding-top: 10px">
                <h4><b><i> @if($language == 'sr')Cena konfiguracije: @elseif($language == 'en')Configuration price: @endif  {{$config2->price}} €</i></b></h4>
                <hr style="border: solid thin red">
            </div>

            <div class="col-md-12">
               <h3>@lang('translations.assembly_disassembly'):</h3>
            </div>

            <table>
                <tr>
            <div>
                 @foreach($assemblies as $assembly)
                     <td>
                      @if($assembly->price == 0)
                        <input id="{{$assembly->id}}" type="radio" name="assembly" value="{{$assembly->id}}" required> <label for="{{$assembly->id}}">@if($language == 'sr'){{$assembly->name}} @elseif($language == 'en') {{$assembly->name_en}} @endif  </label>
                      @else
                            <input id="{{$assembly->id}}" type="radio" name="assembly" value="{{$assembly->id}}" style="margin-left: 30px;" required> <label for="{{$assembly->id}}">@if($language == 'sr'){{$assembly->name}} ( @elseif($language == 'en') {{$assembly->name_en}}( @endif  {{$assembly->price}} € )</label>
                      @endif
                     </td>
                    @endforeach

            </div>
                </tr>

                <tr>
            <div>
                @foreach($disassemblies as $disassembly)
                    <td>
                    @if($disassembly->price == 0)
                        <input id="d{{$disassembly->id}}" type="radio" name="disassembly" value="{{$disassembly->id}}"  required> <label for="d{{$disassembly->id}}">@if($language == 'sr'){{$disassembly->name}} @elseif($language == 'en') {{$disassembly->name_en}} @endif  </label>
                    @else
                        <input id="d{{$disassembly->id}}" type="radio" name="disassembly" value="{{$disassembly->id}}" style="margin-left: 30px;" required> <label for="d{{$disassembly->id}}">@if($language == 'sr'){{$disassembly->name}} ( @elseif($language == 'en') {{$disassembly->name_en}}( @endif  {{$disassembly->price}} € )</label>
                    @endif
                    </td>
                @endforeach

            </div>
                </tr>
            </table>


            <hr>

            <table style="margin-left: 70px;">
               <tr>
                <td><h4>@if($language == 'sr')Količina: @elseif($language == 'en') Quantity: @endif</h4></td>

            <td>
            <div class="input-group" style="width: 120px; margin-left: 40px;">
          <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[1]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
                <input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="100">
                <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
            </div>
            </td>
                </tr>
            </table>


            <div style="padding-top: 20px;">
                <button type="submit" class="btn btn-block btn-success"><b>@lang('translations.add_to_cart')</b></button>
            </div>
        </div>
        </form>
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