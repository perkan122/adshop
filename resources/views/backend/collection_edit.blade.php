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
                <span>Измена колекције</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ route('collection_update', $object->id)}} " method="POST" files="true" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-paper-plane"></i>Измена података колекције</div>
                        <div class="actions btn-set">
                            <button  type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Измени
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
                                            <label class="col-md-2 control-label">Назив:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="namesr" placeholder="" required value="{{$object->title_sr}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class="wysihtml5 form-control" name="descriptionsr" rows="10" required>{{$object->text->text_sr}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Категорија:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                            @foreach ($cats as $cat)
                                                <input id="{{$cat->id}}" value="{{$cat->id}}"  name="categories[]" type="checkbox" checked="true">
                                                <label for="{{$cat->id}}">{{$cat->category_name}}</label><br>
                                            @endforeach
                                            @foreach ($catsunchecked as $cat)
                                                @if ($cat->superCategory_id != NULL)
                                                    <input id="{{$cat->id}}" value="{{$cat->id}}"  name="categories[]" type="checkbox" >
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
                                                <input type="text" class="form-control" name="nameen" placeholder="" required value="{{$object->title_en}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <textarea class=" wysihtml5 form-control" name="descriptionen" rows="10" required>{{$object->text->text_en}}</textarea>
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
                                        <label style="text-align:center;"class="col-md-12 control-label"><h4>Табеларни преглед фотографија колекције:</h4>
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
                                                <th style="text-align:center" width="15%"> Назив слике </th>
                                                <th style="text-align:center" width="20%"> Фотогалерија </th>
                                                <th style="text-align:center" width="15%"> Примарна фотографија</th>
                                                <th style="text-align:center" width="15%"> Измена</th>
                                                <th style="text-align:center" width="15%"> Уклони </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < $photocount; $i++)
                                                <tr style="text-align:center">
                                                    <td style="vertical-align:middle">
                                                        {{$i+1}}
                                                        <input style="display:none;" type="hidden" id="id_photo" value="{{$object->photoGallery[0]->photos->pluck('id')[$i] }}">
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        <img class="rounding" src="{{ asset('/images/shop/thumbnailsSmaller/collections').'/'.$object->photoGallery[0]->photos->pluck('filename')[$i] }}" alt="" style="border-radius: 20%;">
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        {{$object->photoGallery[0]->photos->pluck('filename')[$i] }}
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        {{$object->photoGallery[0]->pluck('name')[0] }}
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        @if ($object->photoGallery[0]->photos->pluck('primary')[$i] ==1 )
                                                            <input type="radio" name="imgprimary"  checked="checked" />
                                                        @else
                                                            <input type="radio" name="imgprimary" onclick="set_primary_photo('{{$object->photoGallery[0]->photos->pluck('id')[$i] }}')" value="{{$object->photoGallery[0]->photos->pluck('id')[$i] }}"  />
                                                        @endif
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        <a href="{{ route('photo_edit', $object->photoGallery[0]->photos->pluck('id')[$i]) }}" class="btn btn-primary rounding">
                                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Измени
                                                        </a>
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        @if ($object->photoGallery[0]->photos->pluck('primary')[$i] !=1 )
                                                            <button type="button" class="btn btn-danger rounding" onclick="delete_photo('{{$object->photoGallery[0]->photos->pluck('id')[$i] }}')">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Уклони
                                                            </button>
                                                        @else
                                                            <button disabled type="button" class="btn btn-danger rounding" onclick="delete_photo('{{$object->photoGallery[0]->photos->pluck('id')[$i] }}')">
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
                                                @if($object->seo_id == null)
                                                    <input type="text" class="form-control" name="title_sr" placeholder="" value="" required>
                                                @else
                                                    <input type="text" class="form-control" name="title_sr" placeholder="" value="{{$object->seo->title_sr}}" required>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис српски:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($object->seo_id == null)
                                                    <textarea class="form-control" name="description_sr" rows="5" required></textarea>
                                                @else
                                                    <textarea class="form-control" name="description_sr" rows="5" required>{{$object->seo->description_sr}}</textarea>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Наслов енглески:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($object->seo_id == null)
                                                    <input type="text" class="form-control" name="title_en" placeholder="" value="" required>
                                                @else
                                                    <input type="text" class="form-control" name="title_en" placeholder="" value="{{$object->seo->title_en}}" required>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Опис енглески:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                @if($object->seo_id == null)
                                                    <textarea class="form-control" name="description_en" rows="5" required></textarea>
                                                @else
                                                    <textarea class="form-control" name="description_en" rows="5" required>{{$object->seo->description_en}}</textarea>
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
</div>



@endsection
