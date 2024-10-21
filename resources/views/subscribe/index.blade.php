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
                    <h3>Subscribes</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Subscribe</li>
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
                    <!-- <a href="{{route('subscribe.index')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip"
                    data-placement="bottom" title="Add coupon"><i class="fas fa-plus"></i> Add coupon</a> -->
                    <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-left" type="submin">Back</a>
                </div>
                <div class="table-responsive">
                    @if(count($subscriptions)>0)
                        <table class="table cart-table">
                            <thead>
                            <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">email</th>
                                <th scope="col">Subscribe_at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscriptions as $subscribe)
                                <tr>
                                    <td>{{$subscribe->id}}</td>
                                    <td>{{$subscribe->email}}</td>
                                    <td>
                                        {{$subscribe->created_at}}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{--{{ route('subscribe.destroy', $subscribe->id) }}--}}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <a href="{{--{{ route('subscribe.edit', $subscribe->id) }}--}}" class="btn btn-primary btn-sm">
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
                        <h6 class="text-center">No subscriptions found!!! Please create subscription</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection