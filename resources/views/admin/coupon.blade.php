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
                    <h3>Coupons</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Coupon</li>
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
                    <a href="{{route('coupon.create')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip"
                    data-placement="bottom" title="Add coupon"><i class="fas fa-plus"></i> Add coupon</a>
                    <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-left" type="submin">Back</a>
                </div>
                <div class="table-responsive">
                    @if(count($coupons)>0)
                        <table class="table cart-table">
                            <thead>
                            <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">Coupon Code</th>
                                <th scope="col">Type</th>
                                <th scope="col">Value</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->coupon_code}}</td>
                                    <td>
                                        {{$coupon->type}}
                                    </td>
                                    <td>
                                        @if($coupon->type=='fixed')
                                            ${{number_format($coupon->value,2)}}
                                        @elseif($coupon->type=='percentage')
                                            ${{number_format($coupon->value,2)}}
                                        @else
                                            {{$coupon->value}}%
                                        @endif
                                    </td>
                                    <td>{{$coupon->status}}</td>
                                    <td>
                                        <form method="POST" action="{{ route('coupon.destroy', $coupon->id) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-primary btn-sm">
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
                        <h6 class="text-center">No coupons found!!! Please create coupon</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection