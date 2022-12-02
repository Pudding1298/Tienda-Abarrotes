<!-- Modal -->
<form class="row g-3" action="editar_compra.php" method="POST">
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input id="lote" name="lote" type="hidden">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="validationDefault04" class="form-label">Lote</label>
                            <input type="text" class="form-control" name="batch" id="batch"
                                required disabled>
                        </div>   
                        <div class="col-md-7">
                            <label for="validationDefault04" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="nombre_producto" id="nombre_producto"
                                required disabled>
                        </div>                     
                    </div>
                    <div class="row g-3">                        
                        <div class="col-md-5">
                            <label for="validationDefault05" class="form-label">Fecha de compra</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" placeholder="Cantidad a compra" min="1"
                                id="cantidad" required>
                        </div>
                    </div>
                    <div class="row g-3">                        
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Precio de compra</label>
                            <input type="number" class="form-control" name="precio" placeholder="$ de compra" min="1"
                                id="precio" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label">Precio de venta</label>
                            <input type="number" class="form-control" name="precio_venta" placeholder="$ de compra" min="1"
                                id="precio_venta" required>
                        </div>
                    </div>                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</form>