@extends('layouts.base')

@section('content')

<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
   <div class="card-header py-3">
        <h4 class=" font-weight-bold">Profile</h4>
        <ul class="breadcrumbs">
            <li><a href="{{route('user.index')}}" style="color:#999">Dashboard</a></li>
            <li><a href="{{route('users.profile')}}" class="active text-primary">Profile Page</a></li>
        </ul>
   </div>
   <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="image">
                        @if($profile->photo)
                            <img class="card-img-top img-fluid roundend-circle mt-4" style="border-radius:50%;height:80px;width:80px;margin:auto;" src="{{$profile->photo}}" alt="profile picture">
                        @else 
                            <img class="card-img-top img-fluid roundend-circle mt-4" style="border-radius:50%;height:80px;width:80px;margin:auto;" src="{{asset('assets/images/fashion/slider/3.jpg')}}" alt="profile picture">
                        @endif
                    </div>
                    <div class="card-body mt-4 ml-2">
                        <h5 class="card-title text-left"><small><i class="fas fa-user"></i> {{$user->name}}</small></h5>
                        <p class="card-text text-left"><small><i class="fas fa-envelope"></i> {{$user->email}}</small></p>
                        <p class="card-text text-left"><small class="text-muted"><i class="fas fa-hammer"></i> {{$user->role}}</small></p>
                    </div>
                  </div>
            </div>
            <div class="col-md-8">
                <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('profile.update',$user->id)}}">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="name" type="text" name="name" placeholder="Enter name"  value="{{$user->name}}" class="form-control">
                        </div>
              
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input id="email" disabled type="email" name="email" placeholder="Enter email"  value="{{$user->email}}" class="form-control">
                        </div>
              
                        <div class="form-group">
                            <label for="photo" class="col-form-label">Photo</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role" class="col-form-label">Role</label>
                            <select name="role" class="form-control">
                                <option value="">-----Select Role-----</option>
                                    <option value="admin" {{(($profile->role=='admin')? 'selected' : '')}}>Admin</option>
                                    <option value="user" {{(($profile->role=='user')? 'selected' : '')}}>User</option>
                            </select>
                        </div>
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </form>
            </div>
        </div>
   </div>
</div>

@endsection

<style>
    .breadcrumbs{
        list-style: none;
    }
    .breadcrumbs li{
        float:left;
        margin-right:10px;
    }
    .breadcrumbs li a:hover{
        text-decoration: none;
    }
    .breadcrumbs li .active{
        color:red;
    }
    .breadcrumbs li+li:before{
      content:"/\00a0";
    }
    .image img{
        position: absolute;
        top:55%;
        left:35%;
        margin-top:30%;
    }
    i{
        font-size: 14px;
        padding-right:8px;
    }
  </style> 

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush