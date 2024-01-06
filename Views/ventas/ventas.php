<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de ventas</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalVentasRopa">
                        Nueva Venta
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tienda</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cliente</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Producto</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Precio</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Total venta</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha venta</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_ventasropa">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="ModalVentasRopa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_ventaropa">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ventas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="ID_venta" id="ID_venta">
                <div class="modal-body">                
                        <div class="form-group mt-3">
                        <label for="codigo">Código Tienda</label>
                        <input type="number" required class="form-control" id="ID_tienda" name="ID_tienda" placeholder=" ">
                    </div>
                    <div class="form-group mt-3">
                        <label for="codigo">Código Cliente</label>
                        <input type="number" required class="form-control" id="ID_cliente" name="ID_cliente" placeholder=" ">
                    </div>
                    <div class="form-group mt-3">
                        <label for="Producto">Producto</label>
                        <input type="text" require class="form-control" id="Producto" name="Producto" placeholder= "">
                    </div>
                    <div class="form-group mt-3">
                        <label for="Cantidad">Cantidad</label>
                        <input type="number" onblur="calcular()" step="any" required class="form-control" id="cantidad" name="cantidad" placeholder="1">
                        <div id="Cantidad"></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="precio">Precio</label>
                        <input type="float" onblur="calcular()" step="any" required class="form-control" id="precio" name="precio" placeholder=" ">
                    </div>
                    <div class="form-group mt-3">
                        <label for="total">Total</label>
                        <input type="float" step="any" required class="form-control" id="total" name="total" placeholder=" ">
                    </div>
                    <div class="form-group mt-3">
                        <label for="Fecha_venta">Fecha venta</label>
                        <input type="date" required class="form-control" id="Fecha_venta" name="Fecha_venta" placeholder=" ">
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="ventas.controller.js"></script>
<script src="ventas.model.js"></script>