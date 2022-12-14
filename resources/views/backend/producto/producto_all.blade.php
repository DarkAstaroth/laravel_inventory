@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Todos los productos</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('producto.add') }}" class="btn btn-dark btn-rounded">Nuevo Producto</a>
                            <hr>

                            {{-- <h4 class="card-title">Todos los datos de proveedores </h4> --}}


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>

                                        <th>Sl</th>
                                        <th>Nombre</th>
                                        <th>Proveedor</th>
                                        <th>Categoria</th>
                                        <th>Marca</th>
                                        <th>Unidad</th>
                                        <th>Acciones</th>

                                </thead>


                                <tbody>

                                    @foreach ($productos as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->nombre }} </td>
                                            <td> {{ $item['proveedor']['nombre'] }} </td>
                                            <td> {{ $item['categoria']['nombre'] }} </td>
                                            <td> {{ $item['marca']['nombre'] }} </td>
                                            <td> {{ $item['unidad']['nombre'] }} </td>


                                            <td>
                                                <a href="{{ route('edit.producto', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.producto', $item->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i> </a>

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
