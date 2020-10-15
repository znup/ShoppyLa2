<div class="form-group row">
    <label class="col-md-3 form-control-label" for="titulo">Categoría</label>
    <div class="col-md-9">
        <select class="form-control" name="id" id="id" required>
            <option value="0" disabled>Seleccione</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="code">Código</label>
    <div class="col-md-9">
        <input type="text" id="code" name="code" class="form-control" placeholder="Ingrese el Código" required pattern="[0-9]{0,15}">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="stock">Stock</label>
    <div class="col-md-9">
        <input type="text" id="stock" name="stock" class="form-control" placeholder="Ingrese el stock" disabled>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="name">Nombre</label>
    <div class="col-md-9">
        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese la nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,100}$">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="name">Precio Venta</label>
    <div class="col-md-9">
        <input type="number" id="sale_price" name="sale_price" class="form-control" placeholder="Ingrese el precio de venta" required pattern="^[a-zA-Z_áéíóúñ\s]{0,100}$">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="image">Imagen</label>
    <div class="col-md-9">
        <input type="file" id="image" name="image" class="form-control">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
</div>
