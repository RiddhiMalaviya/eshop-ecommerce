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
                    <h3>Add New Product</h3>
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
            <form class="row gx-3 gy-2 align-items-center" action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <strong>Slug:</strong>
                            <input type="text" name="slug" class="form-control">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Category:</strong>
                            <select class="form-select" multiple aria-label="Multiple select example" name="category[]">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Brand:</strong>
                            <select class="form-select" multiple aria-label="Multiple select example" name="brand[]">
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <strong>Is_Featured:</strong>
                            <input type="text" name="is_featured" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Short_description:</strong>
                            <textarea class="form-control" style="height:100px" name="short_description"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:100px" name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Regular_price:</strong>
                            <input type="regular_price" class="form-control" name="regular_price">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Sale_price:</strong>
                            <input type="sale_price" class="form-control" name="sale_price">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <strong>SKU:</strong>
                            <input type="text" name="SKU" class="form-control">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Stock_status:</strong>
                            <input type="text" name="stock_status" class="form-control">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            <input type="value" name="quantity" class="form-control">
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
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a class="btn btn-primary" href="{{ route('admin.products') }}" type="submit"> Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection