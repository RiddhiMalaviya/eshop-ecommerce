@php use App\Models\Product; @endphp
@php use App\Models\Order; @endphp
@php use  App\Models\Brand; @endphp
    
@extends('admin.layout')
@section('content')
    <style>
        #sidebar{
            width: 250px;
            height: 100vh;
            float: left;
        }
        #content-wrapper{
            margin-left: 250px;
            min-height: 100vh;
        }
    </style>       
        
    <div class="container">
        <h3>Dashboard</h3>
    </div>
    
    <div class="container-fluid">
       
        <div id="wrapper">
            <div id="sidebar">
                @include('admin.sidebar')
            </div>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Category -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{route('admin.categories')}}" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Category</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Category::count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{route('admin.products')}}" class="text-xs font-weight-bold text-success text-uppercase mb-1">Products</a>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Product::count()}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cubes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{route('admin.orders')}}" class="text-xs font-weight-bold text-info text-uppercase mb-1">Order</a>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{\App\Models\Order::count()}}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- brand -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{route('admin.brand')}}" class="text-xs font-weight-bold custom-text-color text-uppercase mb-1">brand</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Brand::count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-table fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- subscribe -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{route('subscribe.index')}}" class="text-xs font-weight-bold text-success text-uppercase mb-1">subscribe</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Subscription::count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bell fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- contactus -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{route('admin.contactus')}}" class="text-xs font-weight-bold custom-text-color text-uppercase mb-1">Contactus</a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Contactus::count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-phone fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
@endsection
