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

             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
