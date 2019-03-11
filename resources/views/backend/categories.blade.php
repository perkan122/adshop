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
                    <span>Уређивање категорија</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->

        <div class="row">
            @if (Session::has('success_store'))
                <br>
                <div class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Успешно</strong> {{ Session::get('success_store') }}
                </div>
            @endif
            @if (Session::has('success_update'))
                <br>
                <div class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Успешно </strong> {{ Session::get('success_update') }}
                </div>

            @endif
            <div class="col-md-12">
                <br>
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green sbold uppercase"> Приказ страна </span>
                        </div>
                    </div>
                    <div class="portlet-body" style="display:none">
                        <div class="table-container">
                            <table id="pages_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th style="text-align:center;">Р.бр.</th>
                                        <th style="text-align:center;">Фотографије категорије</th>
                                        <th style="text-align:center;">Назив</th>
                                        <th style="text-align:center;">Назив ENG</th>
                                        <th style="text-align:center;">Датум и време креирања</th>
                                        <th style="text-align:center;">Последња промена</th>
                                        <th style="text-align:center;"></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr style="text-align:center;">
                                        <th style="text-align:center;">Р.бр.</th>
                                        <th style="text-align:center;">Фотографије категорије</th>
                                        <th style="text-align:center;">Назив</th>
                                        <th style="text-align:center;">Назив ENG</th>
                                        <th style="text-align:center;">Датум и време креирања</th>
                                        <th style="text-align:center;">Последња промена</th>
                                        <th style="text-align:center;"></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr style="text-align:center;">
                                        <td>{{$category->id}}</td>
                                        <td style="vertical-align:middle">
                                            <img class="rounding" src="{{ asset('/images/shop/thumbnailsSmaller/contents').'/'.$category->photoGallery[0]->photos->pluck('filename')[0] }}" alt="" style="width:70px;height:70px;border-radius: 20%; margin-right:30px;margin-top:2px;">
                                            <img class="rounding" src="{{ asset('/images/shop/thumbnailsSmaller/contents').'/'.$category->photoGallery[0]->photos->pluck('filename')[1] }}" alt="" style="width:70px;height:70px;border-radius: 20%;margin-right:30px; margin-top:2px;">
                                        </td>
                                        <td>{{$category->title_sr}}</td>
                                        <td>{{$category->title_en}}</td>
                                        <td>{{$category->text->created_at}}</td>
                                        <td>{{$category->text->updated_at}}</td>
                                        <td>
                                            <a href="{{ route('category_edit', $category->id) }}"  class="btn btn-primary rounding">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Измени
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection

@section('scripts')
  <script>
    $( document ).ready(function(){
        $('.portlet-body').css('display', 'block');
    });
  </script>
@endsection
