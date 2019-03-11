
<!DOCTYPE html>
<html lang="sr">
<head>
    @include('frontend.partials._head')
</head>

<body>

@include('frontend.partials._nav')


<div class="container">

    @include('frontend.partials._messages')
    @foreach($models->chunk(2) as $modelsChunk )
    <div class="row" style="background-color: #fdf0d1; padding: 10px 10px 10px 10px; border-radius: 5px;">
        @foreach($modelsChunk as $model)
            <div class="col-sm-6 col-md-6" style="border: solid thin #fd856e; border-radius: 10px; padding: 10px 10px 10px 10px;">
               <div class="col-sm-5 col-md-5 text-center">
                   <img src="{{url('images/vrata.png')}}" alt="" style="max-width: 100%; height: auto;">
               </div>
                <div class="col-sm-7 col-md-7">
                    <div class="text-center" style="font-size: 20px;"><b> @if($language == 'sr'){{$model->basicConfiguration->doorType->name}} @elseif($language == 'en'){{$model->basicConfiguration->doorType->name_en}}@endif </b></div><hr style="border: solid thin red">
                    <ul>
                        <li>@if($language == 'sr'){{$model->doorLeafFilling->name}} @elseif($language == 'en'){{$model->doorLeafFilling->name_en}} @endif </li>
                        <li>@if($language == 'sr'){{$model->finalTreatment->name}} @elseif($language == 'en'){{$model->finalTreatment->name_en}} @endif </li>
                        <li>@if($language == 'sr'){{$model->kanelura->name}} @elseif($language == 'en'){{$model->kanelura->name_en}} @endif </li>
                        @if($model->pervajz_wall_width_id) <li>@if($language == 'sr'){{$model->pervajzWallWidth->name}} @elseif($language == 'en'){{$model->pervajzWallWidth->name_en}} @endif </li> @endif
                        @if($model->hinge_id) <li>@if($language == 'sr'){{$model->hinge->name}} @elseif($language == 'en'){{$model->hinge->name_en}} @endif </li> @endif
                        @if($model->doorstep_id) <li>@if($language == 'sr'){{$model->doorstep->name}} @elseif($language == 'en'){{$model->doorstep->name_en}} @endif </li> @endif
                        <li>@if($language == 'sr'){{$model->doorlockKind->name}} @elseif($language == 'en'){{$model->doorlockKind->name_en}} @endif </li>
                        @if($model->doorlock_type_id) <li>@if($language == 'sr'){{$model->doorlockType->name}} @elseif($language == 'en'){{$model->doorlockType->name_en}} @endif </li> @endif
                        @if($model->door_handle_id) <li>@if($language == 'sr'){{$model->doorHandle->name}} @elseif($language == 'en'){{$model->doorHandle->name_en}} @endif </li> @endif
                        @if($model->opening_way_id) <li>@if($language == 'sr'){{$model->openingWay->name}} @elseif($language == 'en'){{$model->openingWay->name_en}} @endif </li> @endif
                        @if($model->track_id) <li>@if($language == 'sr'){{$model->track->name}} @elseif($language == 'en'){{$model->track->name_en}} @endif </li> @endif
                        @if($model->ventilation_grid_id) <li>@if($language == 'sr'){{$model->ventilationGrid->name}} @elseif($language == 'en'){{$model->ventilationGrid->name_en}} @endif </li> @endif
                        @if($model->stopper_id) <li>@if($language == 'sr'){{$model->stopper->name}} @elseif($language == 'en'){{$model->stopper->name_en}} @endif </li> @endif
                    </ul>
                    <div class="row">
                    <div class="text-center col-md-6">@if($language == 'sr')Cena: od @elseif($language == 'en') Price: from @endif<b>{{number_format($model->price,2,',','.')}} €</b></div>
                    <div class="col-md-6 text-center"> <a href="{{route('configuration_details',$model->id)}}" class="btn btn-block btn-success text-center">@lang('translations.add_to_cart')</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div><br>
    @endforeach


</div>
@include('frontend.partials._footer')
@include('frontend.partials._javascript')

@yield('scripts')
</body>
</html>