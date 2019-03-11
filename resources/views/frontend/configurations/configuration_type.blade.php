@extends('frontend.main')

@section('title', '')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h3>@lang('translations.door_type_choice')</h3>

            <hr>

            <form action="{{route('configuration_type_store')}}" method="post">
                {{csrf_field()}}

                @foreach($doorTypes as $door_type)
                  @if($dmi == 1)  <div class="col-sm-6 col-md-6"> @elseif($dmi == 2) <div class="col-sm-12 col-md-12"> @endif
                        <div class="thumbnail" style="border: solid thin #fd856e; border-radius: 15px;">
                            <img src="{{url($door_type->image_path)}}" alt="">
                            <div class="caption">
                                <input id="{{$door_type->id}}" type="radio" name="door_type" value="{{$door_type->id}}" required> <label for="{{$door_type->id}}">@if($language == 'sr'){{$door_type->name}} @elseif($language == 'en') {{$door_type->name_en}} @endif</label>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-6 col-md-offset-3">
                <input type="submit" class="btn btn-success btn-lg btn-block" style="margin-top: 20px;" value="@lang('translations.confirm_selection')">
                </div>

            </form>
        </div>

    </div>

@endsection