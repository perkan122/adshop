@extends('backend.main')

@section('css')

    <link rel="stylesheet" href="http://jcrop-cdn.tapmodo.com/v0.9.12/css/jquery.Jcrop.css" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@include('backend.partials.menu_top')

@include('backend.partials.menu_left')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-paper-plane"></i>Измена форографије</div>
                    <div class="actions btn-set">
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('photo_update', $photo->id)}} " method="POST" id="myform">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" id="id" value="{{$photo->id}}" />
                        <input type="hidden" name="cropx" id="cropx" value="0" />
                        <input type="hidden" name="cropy" id="cropy" value="0" />
                        <input type="hidden" name="cropw" id="cropw" value="0" />
                        <input type="hidden" name="croph" id="croph" value="0" />
                        <input type="submit" value="Исеци" class="btn btn-primary"/>
                        <a href="{{ route('collection_edit', $photo->photoGallery->object->id) }}" class="btn btn-success">
                            Откажи
                        </a>
                    </form>
                    <div style="overflow-y:auto; overflow-x:auto; max-height: 1000px; max-width: 1200px; overflow: auto; float: left; position: relative; margin-left: -5px; border: solid 4px; background:white">
                        <img src="{{ asset('/images/shop/collections').'/'.$photo->filename }}" id="target" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('scripts')
    
    <script src="http://jcrop-cdn.tapmodo.com/v0.9.12/js/jquery.Jcrop.min.js"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            $('#target').Jcrop({
                setSelect: [ 0,0,400,300],
                aspectRatio: 1.5,
                // minSize: [450, 300],
                onSelect: takeCords, 
                onChange: takeCords
            });


        });

        function takeCords(c){
            $('input[name="cropx"]').val(c.x);
            $('input[name="cropy"]').val(c.y);
            $('input[name="cropw"]').val(c.w);
            $('input[name="croph"]').val(c.h);
        }
    </script>

@endsection
