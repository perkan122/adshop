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
                        <span>Уређивање производа</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->

            <div class="row">

              @if (Session::has('success_store'))
                <br>
                <div class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong>Успешно </strong> {{ Session::get('success_store') }}
                </div>
              @endif
              @if (Session::has('success_update'))
                <br>
                <div class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong>Успешно </strong> {{ Session::get('success_update') }}
                </div>
              @endif
              @if (Session::has('success_activate'))
                <br>
                <div class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong>Успешно </strong> {{ Session::get('success_activate') }}
                </div>
              @endif
              @if (Session::has('success_deactivate'))
                <br>
                <div class="alert alert-success col-md-6 col-md-offset-3" role="alert">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong>Успешно </strong> {{ Session::get('success_deactivate') }}
                </div>
              @endif

                <div class="col-md-12">

                    <!-- Begin: life time stats -->
                    <br>
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-green"></i>
                                <span class="caption-subject font-green sbold uppercase"> Приказ производа </span>
                            </div>
                            <a style="float:right;" href="{{ route('products.create') }}"  class="btn btn-primary">
                              <i class="glyphicon glyphicon-plus"></i>
                              <span class="title">Додавање новог производа</span>
                            </a>
                        </div>
                        <div class="portlet-body" style="display:none">
                            <div class="table-container">
                                <table id="products_table" {{-- style="display:none" --}} class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Слика</th>
                                            <th>Назив</th>
                                            <th>Опис</th>
                                            <th>Цена</th>
                                            <th>Количина</th>
                                            <th>Категорија</th>
                                            <th>Колекције</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Слика</th>
                                            <th>Назив</th>
                                            <th>Опис</th>
                                            <th>Цена</th>
                                            <th>Количина</th>
                                            <th>Категорија</th>
                                            <th>Колекције</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <?php
                                                    $fileName = null;
                                                    $photos = $product->photoGallery->photos;
                                                    foreach($photos as $photo){
                                                        if($photo->primary == 1)
                                                            $fileName = $photo->filename;
                                                    }
                                                ?>
                                                <td style="vertical-align:middle"><img class="rounding" src="{{ asset('/images/shop/thumbnailsSmaller/products').'/'.$fileName }}" alt="" style="width:80px; height:80px;"></td>
                                                <td>{{$product->name_sr}}</td>
                                                <td>{{ str_limit($product->short_description_sr, 30)}}</td>
                                                <td>{{$product->price_sr}},00 РСД</td>
                                                <td>{{$product->amount}}</td>
                                                <td>{{$product->category->category_name}}</td>
                                                <td style="width:280px">
                                                    @foreach($product->objects as $collection)
                                                        @if($collection != $product->objects->last())
                                                            {{ $collection->title_sr }},
                                                        @else
                                                            {{ $collection->title_sr }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td><a href="{{ route('products.edit', $product->id) }}"  class="btn btn-primary rounding"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Измени</a></td>
                                                @if ($product->isActive == 1)
                                                  <td><a href="{{ route('deactivate', $product->id) }}" onclick="deactivate_message(event);" class="btn btn-warning rounding"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Деактивирај</a></td>
                                                @else
                                                <td><a href="{{ route('activate', $product->id) }}" onclick="activate_message(event);" class="btn btn-success myImage rounding"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Активирај</a></td>
                                                  @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- End: life time stats -->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.portlet-body').css('display', 'block');
        });
        function deactivate_message(e)
          {
            if(!confirm('Да ли желите деактивирати одабрани производ?'))e.preventDefault();
          }
        function activate_message(e)
          {
            if(!confirm('Да ли желите активирати одабрани производ?'))e.preventDefault();
          }
    </script>
@endsection
