<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-left justify-content-left" href="{{route('admin.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.banners')}}" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true"
            aria-controls="collapseTwo">    
            <i class="fas fa-image"></i>
            <span>banners</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('sidebar.banner_options'):</h6>
                <a class="collapse-item" href="{{route('admin.banners')}}">@lang('sidebar.banners')</a>
                <a class="collapse-item" href="{{route('banner.create')}}">@lang('sidebar.add_banners')</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->

    <div class="sidebar-heading">
        Shop
    </div>
    <!-- @hasrole('super-admin') -->

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.categories')}}" data-toggle="collapse" data-target="#categoryCollapse"
           aria-expanded="true" aria-controls="categoryCollapse">
            <i class="fas fa-sitemap"></i>
            <span>category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('sidebar.category_options'):</h6>
                <a class="collapse-item" href="{{route('admin.categories')}}">@lang('sidebar.category')</a>
                <a class="collapse-item" href="{{route('category.create')}}">@lang('sidebar.add_category')</a>
            </div>
        </div>
    </li>
    
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.products')}}" data-toggle="collapse" data-target="#productCollapse"
           aria-expanded="true" aria-controls="productCollapse">
            <i class="fas fa-cubes"></i>
            <span>products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('sidebar.product_options'):</h6>
                <a class="collapse-item" href="{{route('admin.products')}}">@lang('sidebar.products')</a>
                <a class="collapse-item" href="{{route('product.create')}}">@lang('sidebar.add_product')</a>
                {{--<a class="collapse-item" href="{{route('export-import-product.index')}}">CSV Import & Export</a>--}}
            </div>
        </div>
    </li>
    
    {{-- Brands --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.brand')}}" data-toggle="collapse" data-target="#brandCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>brands</span>
        </a>
        <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('sidebar.brand_options'):</h6>
                <a class="collapse-item" href="{{route('admin.brand')}}">@lang('sidebar.brands')</a>
                <a class="collapse-item" href="{{route('brands.create')}}">@lang('sidebar.add_brand')</a>
            </div>
        </div>
    </li>
    
    <!-- @endhasrole -->

    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.orders')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>orders</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Posts
    </div>
    <!-- @hasrole('super-admin') -->

    <!-- Posts -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.post')}}" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true"
           aria-controls="postCollapse">
            <i class="fas fa-fw fa-folder"></i>
            <span>posts</span>
        </a>
        <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('sidebar.post_options'):</h6>
                <a class="collapse-item" href="{{route('admin.post')}}">@lang('sidebar.posts')</a>
                <a class="collapse-item" href="{{route('post.create')}}">@lang('sidebar.add_post')</a>
            </div>
        </div>
    </li>

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.categories')}}" data-toggle="collapse" data-target="#categoryCollapse"
           aria-expanded="true" aria-controls="categoryCollapse">
            <i class="fas fa-sitemap"></i>
            <span>category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('sidebar.category_options'):</h6>
                <a class="collapse-item" href="{{route('admin.categories')}}">@lang('sidebar.category')</a>
                <a class="collapse-item" href="{{route('category.create')}}">@lang('sidebar.add_category')</a>
            </div>
        </div>
    </li>

    <!-- Tags -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.tag')}}" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true"
           aria-controls="tagCollapse">
            <i class="fas fa-tags fa-folder"></i>
            <span>tags</span>
        </a>
        <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('sidebar.tags_options'):</h6>
                <a class="collapse-item" href="{{route('admin.tag')}}">@lang('sidebar.tags')</a>
                <a class="collapse-item" href="{{route('tag.create')}}">@lang('sidebar.add_tag')</a>
            </div>
        </div>
    </li>
    
    <!-- @endhasrole -->
    <!-- Comments -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.comment')}}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>comments</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading">
        General settings
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.coupons')}}">
            <i class="fas fa-sticky-note"></i>
            <span>coupons</span></a>
    </li>

    <!-- Users -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.users')}}" data-toggle="collapse" data-target="#userCollapse"
           aria-expanded="true" aria-controls="shippingCollapse">
            <i class="fas fa-users"></i>
            <span>users</span>
        </a>
        <div id="userCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">@lang('sidebar.user_options'):</h6>
                <a class="collapse-item" href="{{route('admin.users')}}">@lang('sidebar.users')</a>
            </div>
        </div>
    </li>
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>