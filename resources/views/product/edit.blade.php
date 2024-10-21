@extends('layouts.base')
   
@section('content')
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Edit Product</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('product.update',$product->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <strong>Slug:</strong>
                            <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Short_description:</strong>
                            <textarea class="form-control" style="height:100px" name="short_description">{{ $product->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:100px" name="description">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Regular_price:</strong>
                            <input type="regular_price" class="form-control" name="regular_price" value="{{ $product->regular_price }}">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Sale_price:</strong>
                            <input type="sale_price" class="form-control" name="sale_price" value="{{ $product->sale_price }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <strong>SKU:</strong>
                            <input type="text" name="SKU" class="form-control" value="{{ $product->SKU }}">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Stock_status:</strong>
                            <input type="text" name="stock_status" class="form-control" value="{{ $product->stock_status }}">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            <input type="value" name="quantity" class="form-control" value="{{ $product->quantity }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Images:</strong>
                            <input name="images" class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-primary" href="{{ route('admin.products') }}" type="submit"> Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection