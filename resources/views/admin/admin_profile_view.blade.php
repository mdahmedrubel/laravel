@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="mt-4 mt-md-0">
                    <div class="card profile">
                        <style>
                            .card.profile img {
                                margin-top: 20px;
                                align-items: center !important;
                                max-width: 100%;
                            
                            }

                            h4.card-title {
                                line-height: 24px;
                            }

                            a.btn.btn-primary.btn-rounded.waves-effect.waves-light {}

                            .card-body a {
                                margin-top: 18px;
                            }

                            .card.profile {
                                text-align: center;
                                align-items: center;
                            }
                        </style>
                        <img class="card-img-top img-fluid rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image)) ? url('upload/admin_images/'.$adminData->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                            <h4 class="card-title">User Name : {{ $adminData->username }}</h4>
                            <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                            <a href="{{ route('edit.profile') }}" class="btn btn-primary btn-rounded waves-effect waves-light">Edit Profile</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection