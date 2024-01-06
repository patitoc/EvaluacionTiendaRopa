<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Tiendas</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTiendasRopa">
                        Nueva Tienda
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Ciudad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Categoria</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_tiendasropa">

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
<div class="modal fade" id="ModalTiendasRopa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_tiendasropa">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tiendas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="ID_tienda" id="ID_tienda">
                <div class="modal-body">

                        <div class="form-group mt-3">
                        <label for="ID_tienda">ID_tienda</label>
                        
                        <input type="text" required class="form_tiendasropa" id="ID_tienda" name="ID_tienda" placeholder="ID_tienda">
                        <div class="alert alert-danger d-none" role="alert" id="codigoRepetido">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" required class="form_tiendasropa" id="Nombre" name="Nombre" placeholder="Nombre de Tienda">
                    </div>
                    <div class="form-group mt-3">
                        <label for="ciudad">Ciudad de la Tienda</label>
                        <input type="text" required class="form_tiendasropa" id="ciudad" name="ciudad" placeholder="Ciudad ">
                    </div>
                    <div class="form-group mt-3">
                        <label for="Categoria">Categoría</label>
                        <select name="Categoria" id="Categoria" class="form_tiendasropa">
                            <option value="Mujeres">Mujeres</option>
                            <option value="Hombres">Hombres</option>
                            <option value="Niños">Niños</option>
                        </select>
                    </div>
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

<script src="tienda.controller.js"></script>
<script src="tienda.model.js"></script>