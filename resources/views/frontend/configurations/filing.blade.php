@extends('frontend.main')

@section('title', '')

@section('content')

    <div class="row">
        <div class="col-md-9 text-center">

        @if($dti== 1 || $dti==2)

           <ul class="steps">
               <li style="background: #ec4530"><b>1</b></li>
               <li>2</li>
               <li>3</li>
               <li>4</li>
               <li>5</li>
               <li>6</li>
               <li>7</li>
               <li>8</li>
               <li>9</li>
               <li>10</li>
               <li>11</li>
               @if($dti == 1) <li>12</li> @endif
           </ul>
            @elseif($dti ==3)

                    <ul class="steps">
                        <li style="background: #ec4530"><b>1</b></li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
            @endif
            <hr>

            <h3>@lang('translations.door_leaf_filling_choice'):</h3>

            <hr>

            <form action="@if($dti == 1 || $dti == 2){{route('classic_config_filing_store')}}@elseif($dti == 3) {{route('ambar_config_filing_store')}}@endif" method="post">
                {{csrf_field()}}
                <input type="hidden" name="config2_id" value="{{$config2->id}}">
                @foreach($filings as $filing)
                    <div class="col-sm-6 col-md-6">
                        <div class="thumbnail" style="border: solid thin #fd856e; border-radius: 15px;">
                            <img src="{{url($filing->image_path)}}" alt="" style="max-height: 150px">
                            <div class="caption">
                                <input id="{{$filing->id}}" type="radio" name="filing" value="{{$filing->id}}" required> <label for="{{$filing->id}}">@if($language == 'sr'){{$filing->name}} ( @elseif($language == 'en') {{$filing->name_en}}( @endif  {{$filing->price}} EUR )</label>
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
                </ul>

                <hr>
            </div>

    </div>
    </div>
@endsection