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
                    <h3>Order List</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <!-- <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip"
                        data-placement="bottom" title="Add category"><i class="fas fa-plus"></i> Add Category</a> -->
                        <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-left" type="submin">Back</a>
                    </div>
                    <div class="table-responsive">
                        @if(count($orders)>0)
                        <table class="table cart-table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Name</th>   
                                    <th scope="col">phone</th>
                                    <th scope="col">address</th>
                                    <th scope="col">zip</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td scope="row">{{$order->id}}</td>
                                        <td scope="row">{{$order->subtotal}}</td>
                                        <td scope="row">{{$order->discount}}</td>
                                        <td scope="row">{{$order->tax}}</td>
                                        <td scope="row">{{$order->total}}</td>
                                        <td scope="row">{{$order->name}}</td>
                                        <td scope="row">{{$order->phone}}</td>                                        
                                        <td scope="row">{{$order->address}}</td>
                                        <td scope="row">{{$order->zip}}</td>
                                        <td scope="row">{{$order->status}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <h6 class="text-center">No Orders found!!! Please create order</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection