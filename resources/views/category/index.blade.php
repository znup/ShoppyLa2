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
                <h2>Listado de Categorías</h2><br />
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#openmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Categoría
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!! Form::open(array('url'=>'category','method'=>'GET','autocomplete'=>'off','role'=>'serch'))!!}
                        <div class="input-group">
                            <input type="text" name="searchText" class="form-control" placeholder="Buscar texto" value="{{$searchText}}">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)

                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>

                            @if ($category->conditionState=='1')
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
                                <button type="button" class="btn btn-info btn-md" data-id_category="{{$category->id}}" data-name="{{$category->name}}" data-description="{{$category->description}}" data-toggle="modal" data-target="#openmodalEdit">
                                    <i class="fa fa-edit fa-2x"></i> Editar
                                </button> &nbsp;
                            </td>
                            <td>
                            @if ($category->conditionState)
                                <button type="button" class="btn btn-danger btn-sm" data-id_category="{{$category->id}}" data-toggle="modal" data-target="#openmodalState">
                                    <i class="fa fa-check fa-2x"></i> Desactivar
                                </button>
                            @else
                                <button type="button" class="btn btn-success btn-sm" data-id_category="{{$category->id}}" data-toggle="modal" data-target="#openmodalState">
                                    <i class="fa fa-check fa-2x"></i> Activo
                                </button>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$categories-> render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.store')}}" method="post" class="form-horizontal">

                        {{csrf_field()}}
                        @include('category.form')

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
                    <h4 class="modal-title">Actualizar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.update','test')}}" method="post" class="form-horizontal">

                        {{method_field('patch')}}
                        {{csrf_field()}}

                        <input type="hidden" id="id_category" name="id_category" value="">

                        @include('category.form')

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
                    <form action="{{route('category.destroy','test')}}" method="post" class="form-horizontal">

                        {{method_field('delete')}}
                        {{csrf_field()}}

                        <input type="hidden" id="id_category" name="id_category" value="">

                        <p>Estas seguro de desactivar el Estado?</p>
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