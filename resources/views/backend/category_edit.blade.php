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
                <span>Измена категорије</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ route('category_update', $categoryObject->id)}} " method="POST" files="true" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-paper-plane"></i>Измена категорије: {{$categoryObject->title_sr}}
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
                                    <a href="#tab_general_sr" data-toggle="tab">Српски</a>
                                </li>
                                <li>
                                    <a href="#tab_general_en" data-toggle="tab">Енглески</a>
                                </li>
                                <li>
                                    <a href="#tab_images" data-toggle="tab">Фотографије</a>
                                </li>
                                <li>
                                    <a href="#tab_seo" data-toggle="tab">SEO</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_general_sr">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Назив:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="category_name" placeholder="" required value="{{$categoryObject->category[0]->category_name}}">
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Текст:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="wysihtml5 form-control" name="textsr" rows="12"  required>{{$categoryObject->text->text_sr}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @if($categoryObject->category[0]->superCategory_id != null)
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Надкатегорија:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                {{ Form::select('supercategory_id', $supercategories, $categoryObject->category[0]->superCategory_id, ['class' => 'table-group-action-input form-control input-medium ','placeholder'=>'Одабери надкатегорију', 'required' => '']) }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane" id="tab_general_en">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Назив:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="category_name_en" placeholder="" required value="{{$categoryObject->category[0]->category_name_en}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Текст:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="wysihtml5 form-control" name="texten" rows="12" required>{{$categoryObject->text->text_en}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_images">
                                    <div class="row">
                                        <label style="text-align:center;"class="col-md-12 control-label">
                                            <h4>Табеларни преглед фотографија стране:</h4>
                                        </label>
                                        <br>
                                        <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"></div>

                                        <!-- routes for ajax -->
                                        <input type="hidden" name="hidden_delete" id="hidden_position" value="{{route('changeposition')}}">
                                        <input type="hidden" name="hidden_primary" id="hidden_primary" value="{{route('setprimary')}}">
                                        <input type="hidden" name="hidden_updatepicture" id="hidden_updatepicture" value="{{route('updatepicture')}}">
                                        <!-- routes for ajax -->

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th style="text-align:center" width="5%">  Р.бр. </th>
                                                    <th style="text-align:center" width="15%"> Слика </th>
                                                    <th style="text-align:center" width="20%"> Назив слике </th>
                                                    <th style="text-align:center" width="15%"> Фотогалерија </th>
                                                    <th style="text-align:center" width="25%"> Позиција фотографије</th>
                                                    <th style="text-align:center" width="20%"> Акција </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @for ($i = 0; $i < 2; $i++)
                                                <tr style="text-align:center">
                                                    <td style="vertical-align:middle">
                                                        {{$i+1}}
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        <img class="rounding" src="{{ asset('/images/shop/thumbnailsSmaller/contents').'/'.$categoryObject->photoGallery[0]->photos->pluck('filename')[$i] }}" alt="" style="width:100px;height:100px;border-radius: 20%;">
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        {{ $categoryObject->photoGallery[0]->photos->pluck('filename')[$i] }}
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        {{$categoryObject->photoGallery->pluck('name')[0] }}
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        @if ($categoryObject->photoGallery[0]->photos->pluck('primary')[$i] ==1)
                                                            <button type="button" class="btn btn-success" onclick="changeposition('{{$categoryObject->photoGallery[0]->photos->pluck('id')[$i] }}')">
                                                                Промена позиције  <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-success" onclick="changeposition('{{$categoryObject->photoGallery[0]->photos->pluck('id')[$i] }}')">
                                                                Промена позиције  <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        <a class="btn btn-info" data-toggle="modal" href="#basic{{$i}}"> <span class="glyphicon glyphicon-picture" aria-hidden="true"> </span> Замени фотографију </a>
                                                        <div class="modal fade" id="basic{{$i}}" tabindex="-1" role="basic" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ></button>
                                                                        <h4 class="modal-title">Замена постојеће фотографије</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input  type="hidden" id="id_photo{{$i}}" value="{{$categoryObject->photoGallery[0]->photos->pluck('id')[$i]}}"></input>
                                                                        <div class="form-group" style="display:none" id="images_preview{{$i}}" >
                                                                            <label class="col-md-4 control-label">Преглед:
                                                                            </label>
                                                                            <div class="col-md-8">
                                                                                <div class="gallery"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group" style="clear:both;">
                                                                            <label class="col-md-4 control-label">Додај фотографије:
                                                                            </label>
                                                                            <div class="col-md-8">
                                                                                <input onchange="display_images{{$i}}(this);"id="gallery-photo-add{{$i}}" class="btn btn-success" type="file"  name="page_image" ></input>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Назад</button>
                                                                        <button type="submit" class="btn btn-success" id="picture{{$i}}">
                                                                            <i class="fa fa-check"></i> Сачувај
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_seo">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Наслов српски:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($categoryObject->seo_id == null)
                                                    <input type="text" class="form-control" name="title_sr" placeholder="" value="" required>
                                                @else
                                                    <input type="text" class="form-control" name="title_sr" placeholder="" value="{{$categoryObject->seo->title_sr}}" required>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис српски:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($categoryObject->seo_id == null)
                                                    <textarea class="form-control" name="description_sr" rows="5" required></textarea>
                                                @else
                                                    <textarea class="form-control" name="description_sr" rows="5" required>{{$categoryObject->seo->description_sr}}</textarea>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Наслов енглески:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($categoryObject->seo_id == null)
                                                    <input type="text" class="form-control" name="title_en" placeholder="" value="" required>
                                                @else
                                                    <input type="text" class="form-control" name="title_en" placeholder="" value="{{$categoryObject->seo->title_en}}" required>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис енглески:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($categoryObject->seo_id == null)
                                                    <textarea class="form-control" name="description_en" rows="5" required></textarea>
                                                @else
                                                    <textarea class="form-control" name="description_en" rows="5" required>{{$categoryObject->seo->description_en}}</textarea>
                                                @endif
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
</div>

@endsection
