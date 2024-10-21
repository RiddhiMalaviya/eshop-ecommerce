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
                    <h3>Category</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="card-body">
                <div class="card-header py-3">
                    <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip"
                    data-placement="bottom" title="Add category"><i class="fas fa-plus"></i> Add Category</a>
                    <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-left" type="submin">Back</a>
                </div>
                <div class="table-responsive">
                    @if(count($categories)>0)
                        <table class="table cart-table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td scope="row">{{$category->id}}</td>
                                    <td scope="row">{{$category->name}}</td>
                                    <td scope="row">{{$category->slug}}</td>
                                    <td scope="row">{{$category->image}}</td>
                                    <td>
                                        <form method="POST" action="{{ route('category.destroy', $category->id) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">
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
                        <h6 class="text-center">No Categories found!!! Please create Category</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection