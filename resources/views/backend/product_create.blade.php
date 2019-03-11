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
                <span>Нови производ</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->

    <div class="row">
        <div class="col-md-12">
            <div class="invalid-form-error-message"></div>
            <form  class="form-horizontal form-row-seperated" action="{{ route('products.store')}} " method="POST" files="true" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-shopping-cart"></i>Додавање производа </div>
                        <div class="actions btn-set">
                            <button  type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Сачувај</button>
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
                                                <input type="text" class="form-control" name="namesr" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Кратак опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="shortdescriptionsr" rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="descriptionsr" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Количина:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="amount" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Цена:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="pricesr" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Категорија:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <select name="category_idsr" class="table-group-action-input form-control input-medium"  required check>
                                                    <option value="" disabled selected>Одаберите категорију</option>
                                                    @foreach ($categories as $category)
                                                        {{--@if ($category->superCategory_id != NULL)--}}
                                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                        {{--@endif--}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Колекције:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-3">
                                                <br>
                                                @for($i = 0; $i < $collectionspart; $i++)
                                                    <input id="{{$collections[$i]->id}}" value="{{$collections[$i]->id}}"  name="collections[]" type="checkbox">
                                                    <label for="{{$collections[$i]->id}}">{{$collections[$i]->title_sr}}</label><br>
                                                @endfor
                                            </div>
                                            <div class="col-md-3">
                                                <br>
                                                @for($i = $collectionspart + 1; $i < $collectionsmax - $collectionspart + 1; $i++)
                                                    <input id="{{$collections[$i]->id}}" value="{{$collections[$i]->id}}"  name="collections[]" type="checkbox">
                                                    <label for="{{$collections[$i]->id}}">{{$collections[$i]->title_sr}}</label><br>
                                                @endfor
                                            </div>
                                            <div class="col-md-3">
                                                <br>
                                                @for($i = $collectionsmax - $collectionspart + 2; $i < $collectionsmax; $i++)
                                                    <input id="{{$collections[$i]->id}}" value="{{$collections[$i]->id}}"  name="collections[]" type="checkbox">
                                                    <label for="{{$collections[$i]->id}}">{{$collections[$i]->title_sr}}</label><br>
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
                                                <input type="text" class="form-control" name="nameen" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Кратак опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="shortdescriptionen" rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="descriptionen" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Цена:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="priceen" placeholder=""  required>
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
                                        <label class="col-md-2 control-label">Додај фотографије:
                                        </label>
                                        <div class="col-md-10">
                                            <input onchange="display_images(this);"id="gallery-photo-add" class="btn btn-success" type="file" name="product_image[]" required=""  multiple="true"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_seo">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Наслов српски:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="title_sr" placeholder="" value="" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис српски:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="description_sr" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Наслов енглески:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="title_en" placeholder="" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис енглески:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="description_en" rows="5" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>

@endsection
