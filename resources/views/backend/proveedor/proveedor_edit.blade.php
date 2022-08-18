@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Editar datos de Proveedor </h4><br><br>

                            <form method="post" action="{{ route('proveedor.update') }}" id='myForm'>
                                @csrf

                                <input type="hidden" name='id' value='{{ $proveedor->id }}'>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Nombre de Proveedor</label>
                                    <div class="form-group col-sm-10">
                                        <input name="nombre" class="form-control" type="text"
                                            value="{{ $proveedor->nombre }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Telefono</label>
                                    <div class="form-group col-sm-10">
                                        <input name="telefono" class="form-control" type="number"
                                            value="{{ $proveedor->telefono }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Email</label>
                                    <div class="form-group col-sm-10">
                                        <input name="email" class="form-control" type="email"
                                            value="{{ $proveedor->email }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Direccion</label>
                                    <div class="form-group col-sm-10">
                                        <input name="direccion" class="form-control" type="text"
                                            value="{{ $proveedor->direccion }}">
                                    </div>
                                </div>
                                <!-- end row -->


                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Editar datos">
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
                    telefono: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    direccion: {
                        required: true,
                    },
                },
                messages: {
                    nombre: {
                        required: 'Ingrese un nombre de proveedor',
                    },
                    telefono: {
                        required: 'Ingresa un numero de telefono',
                    },
                    email: {
                        required: 'Ingresa un email valido',
                    },
                    direccion: {
                        required: 'Ingresa una dirección',
                    },
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
