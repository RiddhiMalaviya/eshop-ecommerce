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
                    <h3>Comment</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Comment</li>
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
                    <a href="{{route('comment.create')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip"
                    data-placement="bottom" title="Add Comment"><i class="fas fa-plus"></i> Add Comment</a>
                    <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-left" type="submin">Back</a>
                </div>
                <div class="table-responsive">
                    @if(count($comments)>0)
                        <table class="table cart-table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">First_name</th>
                                <th scope="col">Last_name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td scope="row">{{$comment->id}}</td>
                                    <td scope="row">{{$comment->first_name}}</td>
                                    <td scope="row">{{$comment->last_name}}</td>
                                    <td scope="row">{{$comment->email}}</td>
                                    <td scope="row">{{$comment->comment}}</td>
                                    <td>
                                        <form method="POST" action="{{ route('comment.destroy', $comment->id) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-primary btn-sm">
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
                        <h6 class="text-center">No Comment found!!! Please create Comment</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection