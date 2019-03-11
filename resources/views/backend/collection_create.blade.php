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
                <span>Нова колекција</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ route('collection_store')}} " method="POST" files="true" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-shopping-cart"></i>Додавање нове колекције </div>
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
                                            <label class="col-md-2 control-label">Назив:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="namesr" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="wysihtml5 form-control" name="descriptionsr" rows="10" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Категорија:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @foreach ($cats as $cat)
                                                  @if ($cat->superCategory_id != NULL)
                                                    <input id="{{$cat->id}}" value="{{$cat->id}}"  name="categories[]" type="checkbox">
                                                    <label for="{{$cat->id}}">{{$cat->category_name}}</label><br>
                                                  @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_general_en">
                                   <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Назив:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="nameen" placeholder="" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class=" wysihtml5 form-control" name="descriptionen" rows="10" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_images">
                                    <div class="form-group" style="display:none" id="images_preview" >
                                        <label class="col-md-2 control-label">Преглед:</label>
                                        <div class="col-md-10">
                                            <div  class="gallery"></div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="clear:both;">
                                        <label class="col-md-2 control-label">Додај фотографије:</label>
                                        <div class="col-md-10">
                                            <input onchange="display_images(this);"id="gallery-photo-add" class="btn btn-success" type="file" name="product_image[]" required="" multiple="true"></input>
                                        </div>
                                    </div>
                                </div>
                                {{--SEO--}}
                                <div class="tab-pane" id="tab_seo">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Наслов српски:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="title_sr" placeholder="" value="" required>
                                            </div>
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
                                                <input class="form-control" name="title_en" placeholder="" value="" required>
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
