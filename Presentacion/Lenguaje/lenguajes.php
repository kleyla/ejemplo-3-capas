<?php getHeader($data); ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-6">
            <h2>Lenguajes</h2>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormLenguaje">
                Agregar
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modalFormLenguaje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formLenguaje" name="formLenguaje">
                            <input type="hidden" id="idLenguaje" name="idLenguaje" value="">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Nombre</label>
                                    <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Link oficial</label>
                                    <input class="form-control" id="txtLink" name="txtLink" type="text" placeholder="Link" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <table class="table table-striped" id="tableLenguajes">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Link</th>
                    <th scope="col">Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<?php getFooter($data); ?>