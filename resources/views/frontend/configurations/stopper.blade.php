@extends('frontend.main')

@section('title', '')

@section('content')

    <div class="row">




        <div class="col-md-9 text-center">
            <ul class="steps">
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
                <li>6</li>
                <li>7</li>
                <li>8</li>
                <li>9</li>
                <li>10</li>
                @if($dti == 2)  <li style="background: #ec4530">11</li> @elseif($dti == 1) <li><b>11</b></li> @endif
                @if($dti == 1) <li style="background: #ec4530"><b>12</b></li> @endif
            </ul>
            <hr>

            <h3>@lang('translations.stopper_choice'):</h3>

            <hr>


            <form action="{{route('classic_config_stopper_store')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="config2_id" value="{{$config2->id}}">

                @foreach($stoppers as $stopper)
                    <div class="col-sm-6 col-md-6">
                        <div class="thumbnail" style="border: solid thin #fd856e; border-radius: 15px;">
                            <img src="{{url($stopper->image_path)}}" alt="" style="max-height: 150px">
                            <div class="caption">
                                <input id="{{$stopper->id}}" type="radio" name="stopper" value="{{$stopper->id}}" required> <label for="{{$stopper->id}}">@if($language == 'sr'){{$stopper->name}} ( @elseif($language == 'en') {{$stopper->name_en}}( @endif  {{$stopper->price}} EUR )</label>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-6 col-md-offset-3">
                    <input type="submit" class="btn btn-success btn-lg btn-block" style="margin-top: 20px;" value="@lang('translations.confirm_selection')">
                </div>

            </form>

        </div>
        <div id="current_config" class="col-md-3 text-left" style="background-color: #fdf0d1;">
            <h4>@lang('translations.current_config'): {{$config2->price}} EUR</h4><hr style="border: solid thin red">
            <ul>
                <li>@if($language == 'sr'){{$config2->basicConfiguration->doorType->name}} @elseif($language == 'en'){{$config2->basicConfiguration->doorType->name_en}} @endif</li>
                <li>{{$config2->basicConfiguration->dimension->width}} cm x {{$config2->basicConfiguration->dimension->height}} cm</li>
                <li>@if($language == 'sr'){{$config2->doorLeafFilling->name}} @elseif($language == 'en'){{$config2->doorLeafFilling->name_en}} @endif</li>
                <li>@if($language == 'sr'){{$config2->finalTreatment->name}} @elseif($language == 'en'){{$config2->finalTreatment->name_en}} @endif</li>
                <li>@if($language == 'sr'){{$config2->kanelura->name}} @elseif($language == 'en'){{$config2->kanelura->name_en}} @endif</li>
                @if($config2->pervajz_wall_width_id) <li>Pervajz - @if($language == 'sr'){{$config2->pervajzWallWidth->name}} @elseif($language == 'en'){{$config2->pervajzWallWidth->name_en}} @endif</li> @endif
                @if($config2->hinge_id)<li>@if($language == 'sr'){{$config2->hinge->name}} @elseif($language == 'en'){{$config2->hinge->name_en}} @endif</li> @endif
                @if($config2->doorstep_id) <li>@if($language == 'sr'){{$config2->doorstep->name}} @elseif($language == 'en'){{$config2->doorstep->name_en}} @endif</li> @endif
                <li>@if($language == 'sr'){{$config2->doorlockKind->name}} @elseif($language == 'en'){{$config2->doorlockKind->name_en}} @endif</li>
                <li>@if($language == 'sr'){{$config2->doorlockType->name}} @elseif($language == 'en'){{$config2->doorlockType->name_en}} @endif</li>
                <li>@if($language == 'sr'){{$config2->doorHandle->name}} @elseif($language == 'en'){{$config2->doorHandle->name_en}} @endif</li>
                <li>@if($language == 'sr'){{$config2->openingWay->name}} @elseif($language == 'en'){{$config2->openingWay->name_en}} @endif</li>
                @if($config2->ventilation_grid_id) <li>@if($language == 'sr'){{$config2->ventilationGrid->name}} @elseif($language == 'en'){{$config2->ventilationGrid->name_en}} @endif</li> @endif
            </ul>

            <hr>
        </div>
    </div>

@endsection