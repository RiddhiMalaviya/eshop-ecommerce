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
                    <h3>User List</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User </li>
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
                    <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-left" type="submin">Back</a>
                </div>
                <div class="table-responsive">
                    @if(count($users)>0)
                        <table class="table cart-table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td scope="row">{{$user->id}}</td>
                                    <td scope="row">{{$user->name}}</td>
                                    <td scope="row">{{$user->email}}</td>
                                    <td scope="row">{{ $user->status ? 'Active':'Inactive'}}</td>
                                    <td>
                                        @if ($user->status)
                                            <a href="{{route('user.deactivate',$user->id)}}"><button type="button" class="btn btn-danger">Deactivate</button></a>
                                        @else
                                            <a href="{{route('user.activate',$user->id)}}"><button type="button" class="btn btn-success">Activate</button></a>
                                        @endif                          
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h6 class="text-center">No User found.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection