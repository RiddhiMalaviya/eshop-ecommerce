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
                    <h3>Product List</h3>
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
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Product Lists</h6> -->
            <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
               title="Add User"><i class="fas fa-plus"></i> Add Product</a>
            <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-right" type="submin">Back</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if(isset($products) && $products->count())
                    <table class="table cart-table">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Is Featured</th>
                                <th>Regular_Price</th>
                                <th>SKU</th>                       
                                <th>image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->quantity}}</td>
                                <td>{{ $product->is_featured ? 'Yes' : 'No' }}</td>
                                <td>{{ $product->regular_price }}</td>
                                <td>{{ $product->SKU }}</td>                                
                                <td>
                                    <img src="{{ $product->image }}" alt="{{ $product->image }}"
                                         style="max-width: 80px;">
                                </td>
                                <td>{{ ucfirst($product->stock_status) }}</td>
                                <td>
                                    
                                    <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h6 class="text-center">No Products found! Please create a product.</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Custom scripts for this page -->
    <script>
        // Custom JS here (if necessary)
    </script>
@endpush
