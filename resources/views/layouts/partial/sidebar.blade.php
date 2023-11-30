<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Assignment1</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navShop" aria-expanded="true" aria-controls="navShop">
            <i class="fas fa-fw fa-cog"></i>
            <span>Shop</span>
        </a>
        <div id="navShop" class="collapse {{ (request()->is('shop/*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">SHOP:</h6>
                <a class="collapse-item" href="{{ URL::tokenRoute('shop.index') }}">Shop</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navCollection" aria-expanded="true" aria-controls="navCollection">
            <i class="fas fa-fw fa-cog"></i>
            <span>Collections</span>
        </a>
        <div id="navCollection" class="collapse {{ (request()->is('collection/*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">COLLECTIONS:</h6>
                <a class="collapse-item" href="{{ URL::tokenRoute('collection.index') }}">All Collections</a>
                <a class="collapse-item" href="{{ URL::tokenRoute('collection.create') }}">Create Collection</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navProducts" aria-expanded="true" aria-controls="navProducts">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="navProducts" class="collapse {{ (request()->is('product/*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">PRODUCTS:</h6>
                <a class="collapse-item" href="{{ URL::tokenRoute('product.index') }}">All Products</a>
                <a class="collapse-item" href="{{ URL::tokenRoute('product.create') }}">Create Product</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>