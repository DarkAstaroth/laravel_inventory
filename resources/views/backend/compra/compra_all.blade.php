@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Todos los compras</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('compra.add') }}" class="btn btn-dark btn-rounded">Nuevo Producto</a>
                            <hr>

                            {{-- <h4 class="card-title">Todos los datos de proveedores </h4> --}}


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>

                                        <th>Sl</th>
                                        <th>Compra Nro</th>
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Categoria</th>
                                        <th>Cantidad</th>
                                        <th>Nombre Producto</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>

                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->compra_nro}} </td>
                                            <td> {{ $item->fecha}} </td>
                                            <td> {{ $item->proveedor_id}} </td>
                                            <td> {{ $item->categoria_id}} </td>
                                            <td> {{ $item->compra_cantidad}} </td>
                                            <td> {{ $item->producto_id}} </td>
                                            <td> <span class="btn btn-warning">Pending</span></td>
                                            <td>
                                               
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
