@extends('backend.main')

@include('backend.partials.menu_top')

@include('backend.partials.menu_left')

@section('content')

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('orders') }}">Почетна</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Измена производа</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ route('products.update', $product->id)}} " method="POST" files="true" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-shopping-cart"></i>Измена производа
                        </div>
                        <div class="actions btn-set">
                            <button  type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Потврди измене
                            </button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-bordered">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_general_sr" data-toggle="tab"> Српски </a>
                                </li>
                                <li>
                                    <a href="#tab_general_en" data-toggle="tab"> Енглески </a>
                                </li>
                                <li>
                                    <a href="#tab_images" data-toggle="tab"> Фотографије </a>
                                </li>
                                <li>
                                    <a href="#tab_seo" data-toggle="tab"> SEO </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_general_sr">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Име:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text"  value="{{$product->name_sr}}" class="form-control" name="namesr" placeholder="" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Кратак опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="shortdescriptionsr" rows="4" required>{{$product->short_description_sr}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="descriptionsr" rows="5" required>{{$product->full_description_sr}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Цена:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="pricesr" placeholder="" value="{{$product->price_sr}}"required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Количина:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="amount" placeholder="" value="{{$product->amount}}"required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Категорија:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                {{ Form::select('category_idsr', $categories, $product->category_id, ['class' => 'table-group-action-input form-control input-medium ','placeholder'=>'Одабери категорију', 'required' => '']) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Колекције:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-2">
                                                <br>
                                                @foreach ($collschecked as $collchecked)
                                                    <input id="{{$collchecked->id}}" value="{{$collchecked->id}}"  name="collections[]" type="checkbox" checked="true">
                                                    <label for="{{$collchecked->id}}">{{$collchecked->title_sr}}</label><br>
                                                @endforeach
                                                {{--@foreach ($collsunchecked as $collunchecked)--}}
                                                {{--<input id="{{$collunchecked->id}}" value="{{$collunchecked->id}}"  name="collections[]" type="checkbox" >--}}
                                                {{--<label for="{{$collunchecked->id}}">{{$collunchecked->title_sr}}</label><br>--}}
                                                {{--@endforeach--}}
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                @for($i = 0; $i < $collectionspart; $i++)
                                                    <input id="{{$collsunchecked[$i]->id}}" value="{{$collsunchecked[$i]->id}}"  name="collections[]" type="checkbox">
                                                    <label for="{{$collsunchecked[$i]->id}}">{{$collsunchecked[$i]->title_sr}}</label><br>
                                                @endfor
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                @for($i = $collectionspart + 1; $i < $collectionsmax - $collectionspart + 1; $i++)
                                                    <input id="{{$collsunchecked[$i]->id}}" value="{{$collsunchecked[$i]->id}}"  name="collections[]" type="checkbox">
                                                    <label for="{{$collsunchecked[$i]->id}}">{{$collsunchecked[$i]->title_sr}}</label><br>
                                                @endfor
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                @for($i = $collectionsmax - $collectionspart + 2; $i < $collectionsmax; $i++)
                                                    <input id="{{$collsunchecked[$i]->id}}" value="{{$collsunchecked[$i]->id}}"  name="collections[]" type="checkbox">
                                                    <label for="{{$collsunchecked[$i]->id}}">{{$collsunchecked[$i]->title_sr}}</label><br>
                                                @endfor
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_general_en">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Име:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="nameen" placeholder="" value="{{$product->name_en}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Кратак опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="shortdescriptionen" rows="4" required>{{$product->short_description_en}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="descriptionen" rows="5" required>{{$product->full_description_en}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Цена:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="priceen" placeholder="" value="{{$product->price_en}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_images">

                                    <div class="form-group" style="display:none" id="images_preview" >
                                        <label class="col-md-2 control-label">Преглед:
                                        </label>
                                        <div class="col-md-10">
                                            <div  class="gallery"></div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="clear:both;">
                                        <label class="col-md-2 control-label">Додај фотографије:</label>
                                        <div class="col-md-10">
                                            <input onchange="display_images(this);"id="gallery-photo-add" class="btn btn-success" type="file" name="product_image[]"  multiple="true"></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label style="text-align:center;"class="col-md-12 control-label"><h4>Табеларни преглед фотографија производа:</h4>
                                        </label>
                                        <br>
                                        <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"> </div>
                                    </div>

                                    <!-- routes for ajax -->
                                    <input type="hidden" name="hidden_delete" id="url_delete_photo" value="{{route('remove_photo')}}">
                                    <input type="hidden" name="hidden_primary" id="url_set_primary_photo" value="{{route('set_primary_photo')}}">
                                    <!-- routes for ajax -->

                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th style="text-align:center" width="5%">  Р.бр. </th>
                                            <th style="text-align:center" width="15%"> Слика </th>
                                            <th style="text-align:center" width="20%"> Назив слике </th>
                                            <th style="text-align:center" width="15%"> Фотогалерија </th>
                                            <th style="text-align:center" width="25%"> Примарна фотографија</th>
                                            <th style="text-align:center" width="20%"> Акција </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for ($i = 0; $i < $photo_count; $i++)
                                            <tr style="text-align:center">

                                                <td style="vertical-align:middle">
                                                    {{$i+1}}
                                                    <input style="display:none;" type="hidden" id="id_photo" value="{{$product->photoGallery->photos->pluck('id')[$i] }}">
                                                </td>
                                                <td style="vertical-align:middle">
                                                    <img class="rounding" src="{{ asset('/images/shop/thumbnailsSmaller/products/').'/'.$product->photoGallery->photos->pluck('filename')[$i] }}" alt="" style="width:100px;height:100px;border-radius: 20%;">
                                                </td>
                                                <td style="vertical-align:middle">
                                                    {{$product->photoGallery->photos->pluck('filename')[$i] }}
                                                </td>
                                                <td style="vertical-align:middle">
                                                    {{$product->photoGallery->pluck('name')[0] }}
                                                </td>
                                                <td style="vertical-align:middle">
                                                @if ($product->photoGallery->photos->pluck('primary')[$i] ==1 )
                                                    <!--<div class="alert alert-success" role="alert">Примарна фотографија одабраног производа.</div>-->
                                                        <input type="radio" name="imgprimary"  checked="checked" />
                                                @else
                                                    <!--
                                                <button type="button" class="btn btn-success" onclick="photo_primary('{{$product->photoGallery->photos->pluck('id')[$i] }}')">
                                                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Примарна
                                                </button>
                                              -->
                                                        <input type="radio" name="imgprimary" onclick="set_primary_photo('{{$product->photoGallery->photos->pluck('id')[$i] }}')" value="{{$product->photoGallery->photos->pluck('id')[$i] }}"  />
                                                    @endif

                                                </td>
                                                <td style="vertical-align:middle">
                                                    @if ($product->photoGallery->photos->pluck('primary')[$i] !=1 )
                                                        <button type="button" class="btn btn-danger" onclick="delete_photo('{{$product->photoGallery->photos->pluck('id')[$i] }}')">
                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Уклони
                                                        </button>
                                                    @else
                                                        <button disabled type="button" class="btn btn-danger" onclick="delete_photo('{{$product->photoGallery->photos->pluck('id')[$i] }}')">
                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Уклони
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                                {{--SEO begin--}}
                                <div class="tab-pane" id="tab_seo">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Наслов српски:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($product->seo_id == null)
                                                    <input type="text" class="form-control" name="title_sr" placeholder="" value="" required>
                                                @else
                                                    <input type="text" class="form-control" name="title_sr" placeholder="" value="{{$product->seo->title_sr}}" required>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис српски:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($product->seo_id == null)
                                                    <textarea class="form-control" name="description_sr" rows="5" required></textarea>
                                                @else
                                                    <textarea class="form-control" name="description_sr" rows="5" required>{{$product->seo->description_sr}}</textarea>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Наслов енглески:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($product->seo_id == null)
                                                    <input type="text" class="form-control" name="title_en" placeholder="" value="" required>
                                                @else
                                                    <input type="text" class="form-control" name="title_en" placeholder="" value="{{$product->seo->title_en}}" required>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис енглески:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($product->seo_id == null)
                                                    <textarea class="form-control" name="description_en" rows="5" required></textarea>
                                                @else
                                                    <textarea class="form-control" name="description_en" rows="5" required>{{$product->seo->description_en}}</textarea>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--SEO end--}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
@endsection
