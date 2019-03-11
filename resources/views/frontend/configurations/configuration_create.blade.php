@extends('frontend.main')

@section('title', '')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h3>@lang('translations.door_model_choice')</h3>
            <hr>

            <form action="{{route('configuration_model_store')}}" method="post">
                {{csrf_field()}}

               @foreach($models as $model)
                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail" style="border: solid thin #fd856e; border-radius: 15px;">
                        <img src="{{url($model->image_path)}}" alt="">
                        <div class="caption">
                            <input id="{{$model->id}}" type="radio" name="door_model" value="{{$model->id}}" required> <label for="{{$model->id}}">@if($language == 'sr'){{$model->name}} @elseif($language == 'en') {{$model->name_en}} @endif</label>
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