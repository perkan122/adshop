@extends('frontend.main')

@section('title', '')

@section('content')

    <div class="row">



        @if($dti== 1 || $dti==2)
            <div class="col-md-9 text-center">
                <ul class="steps">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li style="background: #ec4530"><b>7</b></li>
                    <li>8</li>
                    <li>9</li>
                    <li>10</li>
                    <li>11</li>
                    @if($dti == 1) <li>12</li> @endif
                </ul>
                @elseif($dti ==3)
                    <div class="col-md-9 text-center">
                        <ul class="steps">
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li style="background: #ec4530"><b>4</b></li>
                            <li>5</li>
                        </ul>
                        @endif
            <hr>

            <h3>@lang('translations.doorlock_kind_choice'):</h3>

            <hr>


                <form action="@if($dti == 1 || $dti == 2){{route('classic_config_doorlock_kind_store')}}@elseif($dti == 3) {{route('ambar_config_doorlock_kind_store')}}@endif" method="post">
                {{csrf_field()}}
                <input type="hidden" name="config2_id" value="{{$config2->id}}">

                @foreach($doorlockKinds as $doorlockKind)
                    <div class="col-sm-6 col-md-6">
                        <div class="thumbnail" style="border: solid thin #fd856e; border-radius: 15px;">
                            <img src="{{url($doorlockKind->image_path)}}" alt="" style="max-height: 150px">
                            <div class="caption">
                                <input id="{{$doorlockKind->id}}" type="radio" name="doorlock_kind" value="{{$doorlockKind->id}}" required> <label for="{{$doorlockKind->id}}">@if($language == 'sr'){{$doorlockKind->name}} ( @elseif($language == 'en') {{$doorlockKind->name_en}}( @endif  {{$doorlockKind->price}} EUR )</label>
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
                        </ul>

                        <hr>
                    </div>

    </div>

@endsection