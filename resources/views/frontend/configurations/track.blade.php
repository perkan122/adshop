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
                <li style="background: #ec4530"><b>5</b></li>
            </ul>

            <hr>

            <h3>@lang('translations.track_choice'):</h3>

            <hr>


                        <form action="{{route('ambar_config_track_store')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="config2_id" value="{{$config2->id}}">

                            @foreach($tracks as $track)
                                <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail" style="border: solid thin #fd856e; border-radius: 15px;">
                                        <img src="{{url($track->image_path)}}" alt="" style="max-height: 150px">
                                        <div class="caption">
                                            <input id="{{$track->id}}" type="radio" name="track" value="{{$track->id}}" required> <label for="{{$track->id}}">@if($language == 'sr'){{$track->name}} ( @elseif($language == 'en') {{$track->name_en}}( @endif  {{$track->price}} EUR )</label>
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
                <li>@if($language == 'sr'){{$config2->doorlockKind->name}} @elseif($language == 'en'){{$config2->doorlockKind->name_en}} @endif</li>
            </ul>

            <hr>
        </div>
            </div>

@endsection