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
                <span>Уређивање колекција</span>
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
                <strong>Успешно</strong> {{ Session::get('success_update') }}
            </div>

        @endif
        @if (Session::has('success_delete'))
            <br>
            <div class="alert alert-danger col-md-6 col-md-offset-3" role="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Успешно</strong> {{ Session::get('success_delete') }}
            </div>

        @endif
        <div class="col-md-12">
            <br>
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase"> Приказ колекција </span>
                    </div>
                    <a style="float:right;" href="{{ route('collection_create') }}"  class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span class="title">Додавање нове колекције</span>
                    </a>
                </div>
                <div class="portlet-body" style="display:none">
                    <div class="table-container">
                        <table id="collections_table" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">Р.бр.</th>
                                <th style="text-align:center;">Фотографија</th>
                                <th style="text-align:center;">Назив колекције</th>
                                <th style="text-align:center;">Категорије</th>
                                <th style="text-align:center;">Последња измена</th>
                                <th style="text-align:center;">Измени</th>
                                <th style="text-align:center;">Уклони</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($i=0; $i < $collcount; $i++)
                                <tr style="text-align:center;">
                                    <td>{{$i+1}}</td>
                                    <td style="vertical-align:middle">
                                        @foreach($collections[$i]->photoGallery[0]->photos as $photo)
                                            @if($photo->primary == '1')
                                                <img class="rounding" src="{{ asset('/images/shop/thumbnailsSmaller/collections').'/'.$photo->filename }}" alt="" style="border-radius: 20%; margin-right:30px;">
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$collections[$i]->title_sr}}</td>
                                    <td>@for ($j = 0; $j < $collections[$i]->categories->count(); $j++)
                                            @if ($j == $collections[$i]->categories->count()-1)
                                                {{$collections[$i]->categories[$j]->category_name}}
                                            @else
                                                {{$collections[$i]->categories[$j]->category_name}},
                                            @endif
                                        @endfor
                                    </td>
                                    <td>{{$collections[$i]->text->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('collection_edit', $collections[$i]->id) }}"  class="btn btn-primary rounding">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Измени
                                        </a>
                                    </td>
                                    <form method="post" action="{{ route('collection_delete', $collections[$i]->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <td><button type="submit" class="btn btn-danger rounding"><span class="glyphicon glyphicon-remove rounding" aria-hidden="true"></span> Обриши</button></td>
                                    </form>
                                </tr>
                            @endfor
                            </tbody>
                            <tfoot>
                            <tr style="text-align:center;">
                                <th style="text-align:center;">Р.бр.</th>
                                <th style="text-align:center;">Фотографија</th>
                                <th style="text-align:center;">Назив колекције</th>
                                <th style="text-align:center;">Категорије</th>
                                <th style="text-align:center;">Последња измена</th>
                                <th style="text-align:center;">Измени</th>
                                <th style="text-align:center;">Уклони</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>


@endsection

@section('scripts')

  <script>
    $( document ).ready(function() {
              $('.portlet-body').css('display', 'block');
          });

    function clicked(e)
      {
        if(!confirm('Да ли желите уклонити одабрану колекцију?'))e.preventDefault();
      }
  </script>

@endsection
