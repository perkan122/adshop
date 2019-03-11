@extends('frontend.main')

@section('title', '')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h3>@lang('translations.door_dimensions_choice')</h3>
            <hr>

            <div class="col-sm-6 col-md-6">
                <div id="width" class="thumbnail" style="border: solid thin #fd856e; border-radius: 15px;">
                    <img src="{{url('images\sirina_vrata.png')}}" alt="" >
                </div>
            </div>

            <div class="col-sm-6 col-md-6">
                <div id="height" class="thumbnail" style="border: solid thin #fd856e; border-radius: 15px;">
                    <img src="{{url('images\visina_vrata.png')}}" alt="">
                </div>
            </div>

            <div class="col-md-6 col-md-offset-3">
            <form action="{{route('configuration_dimensions_store')}}" method="post">
                {{csrf_field()}}


                <select name="basicConfiguration" class="form-control text-center" style="border: solid thin #fd856e;" size="5" required>

                @foreach($basicConfigurations as $basicConfiguration)
                <option value="{{$basicConfiguration->id}}">@lang('translations.width') {{$basicConfiguration->dimension->width}} cm x @lang('translations.height') {{$basicConfiguration->dimension->height}} cm ( {{$basicConfiguration->price}} EUR)</option>
                @endforeach

                </select>

            <input type="submit" class="btn btn-success btn-lg btn-block" style="margin-top: 20px;" value="@lang('translations.confirm_selection')">


            </form>
            </div>

        </div>

    </div>

@endsection