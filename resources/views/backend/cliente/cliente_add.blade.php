@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Crear nuevo cliente </h4><br><br>

                            <form method="post" action="{{ route('cliente.store') }}" id='myForm'
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Razon social de cliente</label>
                                    <div class="form-group col-sm-10">
                                        <input name="nombre" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        NIT del cliente</label>
                                    <div class="form-group col-sm-10">
                                        <input name="nitcliente" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Telefono</label>
                                    <div class="form-group col-sm-10">
                                        <input name="telefono" class="form-control" type="number">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Email</label>
                                    <div class="form-group col-sm-10">
                                        <input name="email" class="form-control" type="email">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                        Direccion</label>
                                    <div class="form-group col-sm-10">
                                        <input name="direccion" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Foto </label>
                                    <div class="form-group col-sm-10">
                                        <input name="imagen_cliente" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Crear Cliente">
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
                    nitcliente: {
                        required: true
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
                    imagen_cliente: {
                        required: true,
                    },
                },
                messages: {
                    nombre: {
                        required: 'Ingrese un nombre de cliente',
                    },
                    nitcliente: {
                        required: 'Ingrese nit del cliente'
                    },
                    telefono: {
                        required: 'Ingresa un numero de telefono',
                    },
                    email: {
                        required: 'Ingresa un email valido',
                    },
                    direccion: {
                        required: 'Ingrese una direccion de cliente',
                    },
                    imagen_cliente: {
                        required: 'Ingresa una foto para el cliente',
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
