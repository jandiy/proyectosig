<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            

            <li ><a href="{{ url('/home') }}"><i  ></i><i class="fa fa-fw fa-home"></i>Home</a></li>
            <li ><a href="{{ route('perfiles.index') }}"><i  ></i>Mi Perfil</a></li>
                
            <li class="active treeview">               
                <a href="#">
                        <i class="fa fa-users"></i> <span>Usuario Web</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('webs.index') }}"><i class="fa fa-circle-o"></i>Registrar</a></li>
                </ul>
            </li>
            
            
           
            <li class="active treeview">
                <a href="#">
                <i class="fa fa-users"></i> <span>Usuario Movil</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li ><a href="{{ route('estudiantes.index') }}"><i class="fa fa-circle-o"></i>Estudiante</a></li>
                    <li ><a href="{{ route('ayudantes.index') }}"><i class="fa fa-circle-o"></i>Ayudante</a></li>
                  
                </ul>            
            </li>
           
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> <span>Trabajo</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
        
                </ul>            
            </li>
      
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-cart-plus"></i><span>Emergencias</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                </ul>            
            </li>
         
           



            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>