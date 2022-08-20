@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Todos las marcas</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('marca.add') }}" class="btn btn-dark btn-rounded">Nueva Marca</a>
                            <hr>
                            {{-- <h4 class="card-title">Todos los datos de proveedores </h4> --}}

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>

                                    <th width="5%">Sl</th>
                                    <th width='20%'>Image</th>
                                    <th>Nombre</th>
                                    <th width="20%">Acciones</th>

                            </thead>


                            <tbody>

                                @foreach ($marcas as $key => $item)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td> <img src="{{ asset($item->imagen_marca) }}"
                                                style="width:60px; height:60px"></td>
                                        <td> {{ $item->nombre }} </td>
                                   
                                        <td>
                                            <a href="{{ route('edit.marca', $item->id) }}" class="btn btn-info sm"
                                                title="Edit Data"> <i class="fas fa-edit"></i>
                                            </a>

                                            <a 
                                            href="{{ route('delete.marca', $item->id) }}" 
                                                class="btn btn-danger sm" title="Delete Data"
                                                id="delete"> <i class="fas fa-trash-alt"></i> </a>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                     
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
