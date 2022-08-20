@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Crear nuevo Proveedor </h4><br><br>

                            <form method="post" action="{{ route('producto.store') }}" id='myForm'>
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Nombre de Producto</label>
                                    <div class="form-group col-sm-10">
                                        <input name="nombre" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Proveedor</label>
                                    <div class="form-group col-sm-10">
                                        <select name="proveedor_id" id="" class="form-select"
                                            aria-label="Default select example">
                                            <option selected disabled>Elija una opcion</option>
                                            @foreach ($proveedores as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Categoria</label>
                                    <div class="form-group col-sm-10">
                                        <select name="categoria_id" id="" class="form-select"
                                            aria-label="Default select example">
                                            <option selected disabled>Elija una opcion</option>
                                            @foreach ($categorias as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Marca</label>
                                    <div class="form-group col-sm-10">
                                        <select name="marca_id" id="" class="form-select"
                                            aria-label="Default select example">
                                            <option selected disabled>Elija una opcion</option>
                                            @foreach ($marcas as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Unidad</label>
                                    <div class="form-group col-sm-10">
                                        <select name="unidad_id" id="" class="form-select"
                                            aria-label="Default select example">
                                            <option selected disabled>Elija una opcion</option>
                                            @foreach ($unidades as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->




                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Crear Producto">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    nombre: {
                        required: true,
                    },
                    proveedor_id: {
                        required: true,
                    }

                },
                messages: {
                    nombre: {
                        required: 'Ingrese un nombre de producto',
                    },
                    proveedor_id: {
                        required: 'Ingresa un proveedor',
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
