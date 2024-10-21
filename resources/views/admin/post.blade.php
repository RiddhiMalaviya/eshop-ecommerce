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
                    <h3>Post List</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
 
        <div class="card-header py-3">
            <div class="card-header py-3">
                <a href="{{route('post.create')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip"
                data-placement="bottom" title="Add Post"><i class="fas fa-plus"></i> Add Post</a>
                <a href="{{route('admin.index') }}" class="btn btn-primary btn-sm float-left" type="submin">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($posts)>0)
                    <table class="table table-bordered" id="data-table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">content</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->content}}</td>
                                <td>
                                    <form method="POST" action="{{ route('post.destroy', $post->id) }}"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm">
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
                    <h6 class="text-center">No posts found!!! Please create Post</h6>
                @endif
            </div>
        </div>
    </div>
@endsection