@extends('templatemain')
@section('inside_content')

<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">BACKEND - SHOPPILA2</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <h2>Listado de Productos</h2><br />
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#openmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Producto
                </button>
                <h6>
                    @if($searchText)
                    <div class="alert alert-primary" role="alert">
                        Los Resultados de la Búsqueda "{{$searchText}}" son:
                    </div>
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!! Form::open(array('url'=>'product','method'=>'GET','autocomplete'=>'off','role'=>'serch'))!!}
                        <div class="input-group">
                            <input type="text" id="searchText" name="searchText" class="form-control" placeholder="Buscar texto" value="{{$searchText}}">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        <div id="results"></div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                        <th>Categoria</th>
                            <th>Producto</th>
                            <th>Código</th>
                            <th>Precio Venta (MXN$)
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->category}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>
                                <img src="{{asset('storage/img/product/'.$product->image)}}" id="image1" alt="{{$product->name}}" class="img-responsive" width="100px" height="100px">
                            </td>
                            <td>
                                @if ($product->condition_state=='1')
                                <button type="button" class="btn btn-success btn-md">
                                    <i class="fa fa-check fa-2x"></i> Activo
                                </button>
                                @else
                                <button type="button" class="btn btn-danger btn-md">
                                    <i class="fa fa-check fa-2x"></i> Desactivar
                                </button>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-md" data-id_product="{{$product->id}}" data-id_category="{{$product->category_id}}" data-code="{{$product->code}}" data-stock="{{$product->stock}}" data-name="{{$product->name}}" data-sale_price="{{$product->sale_price}}" data-toggle="modal" data-target="#openmodalEdit">
                                    <i class="fa fa-edit fa-2x"></i> Editar
                                </button> &nbsp;
                            </td>
                            <td>
                                @if ($product->condition_state)
                                <button type="button" class="btn btn-danger btn-sm" data-id_product="{{$product->id}}" data-toggle="modal" data-target="#openmodalState">
                                    <i class="fa fa-check fa-2x"></i> Desactivar
                                </button>
                                @else
                                <button type="button" class="btn btn-success btn-sm" data-id_product="{{$product->id}}" data-toggle="modal" data-target="#openmodalState">
                                    <i class="fa fa-check fa-2x"></i> Activo
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$products-> render()}}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Productos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('product.form')
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal Add-->
    <!--Inicio del modal Edit-->
    <div class="modal fade" id="openmodalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{method_field('patch')}}
                        {{csrf_field()}}
                        <input type="hidden" id="id_product" name="id_product" value="">
                        @include('product.form')
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin modal Edit-->
    <!--Inicio del modal State-->
    <div class="modal fade" id="openmodalState" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.destroy','test')}}" method="post" class="form-horizontal">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <input type="hidden" id="id_product" name="id_product" value="">
                        <p>Estas seguro de desactivar el Estado del Producto?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin modal destroy-->
</main>
@endsection
