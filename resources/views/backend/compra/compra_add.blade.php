@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Registrar Nueva Compra </h4><br><br>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">
                                            Fecha</label>

                                        <input name="fecha" class="form-control example-date-input" type="date"
                                            id="date">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class=" col-form-label">
                                            Nro de Compra</label>

                                        <input name="compra_nro" class="form-control example-date-input" type="text"
                                            id="compra_nro">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="col-form-label">
                                            Proveedor</label>

                                        <select name="proveedor_id" id="proveedor_id" class="form-select"
                                            aria-label="Default select example">
                                            <option selected disabled>Elija una opcion</option>
                                            @foreach ($proveedores as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="col-form-label">
                                            Categoria</label>

                                        <select name="categoria_id" id="categoria_id" class="form-select"
                                            aria-label="Default select example">


                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="col-form-label">
                                            Producto</label>

                                        <select name="producto_id" id="producto_id" class="form-select"
                                            aria-label="Default select example">
                                            <option selected disabled>Elija una opcion</option>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="col-12">
                                        <label for="example-text-input" class="col-form-label"
                                            style="margin-top:43px"></label>
                                        <input type="submit" class="btn btn-secondary" value='Añadir más'>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#proveedor_id', function() {
                var proveedor_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-categoria') }}",
                    type: "GET",
                    data: {
                        proveedor_id: proveedor_id
                    },
                    success: function(data) {
                        var html = '<option value="" disabled>Selecciona una categoria</option>'
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.categoria_id + '">' + v
                                .categoria.nombre + '</option>'
                        });
                        $('#categoria_id').html(html);
                    }
                })
            });
        });
    </script>
@endsection
