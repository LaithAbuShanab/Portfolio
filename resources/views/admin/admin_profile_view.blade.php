@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6 m-auto mt-3">
                <div class="card mt-5">
                    <img class="rounded-circle avatar-xl m-auto mt-5" src="{{(!empty($adminData->profile_image))?url('upload/admin_images/'.$adminData->profile_image):url('upload/def.jpeg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Name : {{$adminData->name}}</h4>
                        <hr>
                        <h4 class="card-title">User email : {{$adminData->email}}</h4>
                        <hr>
                        <h4 class="card-title">UserName : {{$adminData->username}}</h4>
                        <a href="{{route('edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light mt-3">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection