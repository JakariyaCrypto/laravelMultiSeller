<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('seller.dashboard')}}"><h4>NS Mart</h4></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('backend/assets/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('seller.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Manage Admin Panel</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-product-hunt"></i>Product Manage</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="fa fa-plus-circle"></i><a href="{{route('products.create')}}">Add Product</a></li>
                            <li><i class="fa  fa fa-list-alt"></i><a href="{{route('products.index')}}">All Product</a></li>
                           
                        </ul>

                    </li>


                    

                    <li>
                        <a href="{{route('setting')}}"> <i class="menu-icon ti-email"></i>Settings </a>
                    </li>
                    <li>
                        <a href="{{route('setting')}}"> <i class="menu-icon ti-email"></i>Profile </a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>