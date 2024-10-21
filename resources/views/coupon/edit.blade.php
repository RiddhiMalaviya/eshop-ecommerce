@extends('layouts.base')
@section('content')

    <div class="card">
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
                        <h3>Edit Coupon</h3>
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
        <div class="card-body">
            @if ($coupon->exists)
            <form method="post" action="{{route('coupon.update',$coupon->id)}}"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                @else
                    <form class="form-horizontal" method="POST" action="{{ route('coupon.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @endif
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Coupon Code</label>
                            <input id="inputTitle" type="text" name="coupon_code" placeholder="Enter Coupon Code"
                                value="{{$coupon->coupon_code}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-form-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="fixed" {{(($coupon->type=='fixed') ? 'selected' : '')}}>Fixed</option>
                                <option value="percent" {{(($coupon->type=='percent') ? 'selected' : '')}}>Percent</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Value </label>
                            <input id="inputTitle" type="number" name="value" placeholder="Enter Coupon value"
                                value="{{$coupon->value}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-form-label">Status </label>
                            <select name="status" class="form-control">
                                <option value="active" {{(($coupon->status=='active') ? 'selected' : '')}}>Active</option>
                                <option value="inactive" {{(($coupon->status=='inactive') ? 'selected' : '')}}>Inactive</option>
                            </select>

                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit">Update</button>
                            <a class="btn btn-primary" href="{{ route('admin.coupons') }}" type="submit"> Back</a>
                        </div>
                    </form>
            </form>
        </div>
    </div>

@endsection
