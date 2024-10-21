@extends('admin.layout')

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
                    <h3>Brand List</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Brand</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('brands.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
               data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add brand</a>
            <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-right" type="submin">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($brands)>0)
                    <table  class="table cart-table">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->image}}</td>
                                    <td>@foreach($brand->products as $product)
                                            {{ $product->name }},
                                        @endforeach
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('brands.destroy', $brand->id) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-primary btn-sm">
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
                    <h6 class="text-center">no_records_found</h6>
                @endif
            </div>
        </div>
    </div>
@endsection