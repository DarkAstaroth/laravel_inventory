 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!-- User details -->


         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="index.html" class="waves-effect">
                         <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                         <span>Dashboard</span>
                     </a>
                 </li>


                 <li>
                     <a href="#" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Proveedores</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('proveedor.all') }}">Todos los proveedores</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="#" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Clientes</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('cliente.all') }}">Todos los clientes</a></li>

                     </ul>
                 </li>

                 <li>
                     <a href="#" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Productos</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('producto.all') }}">Todos los Productos</a></li>
                         <li><a href="{{ route('categoria.all') }}">Categorias</a></li>
                         <li><a href="{{ route('marca.all') }}">Marcas</a></li>
                         <li><a href="{{ route('unidad.all') }}">Unidades</a></li>

                     </ul>
                 </li>

                   <li>
                     <a href="#" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Compras</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('compra.all') }}">Todos las compras</a></li>

                     </ul>
                 </li>

             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
