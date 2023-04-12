<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('admin.dashboard')}}"><h4>NS Mart</h4></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('backend/assets/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Manage Admin Panel</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-product-hunt"></i>Product Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="{{route('category.index')}}">Categories</a></li>
                            <li><i class="fa fa-cogs"></i><a href="{{route('subcategory.index')}}">Sub Categories</a></li>
                            <li><i class="fa fa-anchor"></i><a href="{{route('grand-child-category.index')}}">Grand Categories</a></li>
                            <li><i class="fa fa-list-ol"></i><a href="{{route('brand.index')}}"> Brands</a></li>
                            <li><i class="fa fa-th-list"></i><a href="{{route('size.index')}}">Size</a></li>
                            <li><i class="fa fa-tags"></i><a href="{{route('color.index')}}">Color</a></li>
                            <li><i class="fa fa-plus-circle"></i><a href="{{route('product.create')}}">Add Product</a></li>
                            <li><i class="fa  fa fa-list-alt"></i><a href="{{route('product.index')}}">All Product</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bookmark"></i>Section Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="{{route('section.create')}}">Add Section</a></li>
                            <li><i class="fa fa fa-list-alt"></i><a href="{{route('section.index')}}">All Section</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-picture-o"></i>Banner Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="{{route('banner.create')}}">Add Banner</a></li>
                            <li><i class="fa fa-list-alt"></i><a href="{{route('banner.index')}}">All Banner</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-picture-o"></i>Thumnail Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="{{route('banner.create')}}">Add Banner</a></li>
                            <li><i class="fa fa-list-alt"></i><a href="{{route('banner.index')}}">All Banner</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-toggle-up"></i>Slider Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('banner.create')}}">Add Banner</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('banner.index')}}">All Banner</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Coupon</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('coupon.create')}}">Add Coupon</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('coupon.index')}}">All Coupon</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Order Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('today.orders')}}">Today Orders</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('order.index')}}">All Orders</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Today Return Orders</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Stock Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Add Stock</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">All Stock</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Currency Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('currency.create')}}">Add Currency</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('currency.index')}}">All Currency</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Subscribe manage</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Add Stock</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">All Stock</a></li>
                        </ul>
                    </li>

                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>User Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Add Stock</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">All Stock</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Vendor Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Add Stock</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">All Stock</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Role Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Add Stock</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">All Stock</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Others</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('main.index')}}">Send Mail</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('mobile.index')}}">Send SMP </a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('review')}}"> <i class="menu-icon ti-email"></i>Review </a>
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