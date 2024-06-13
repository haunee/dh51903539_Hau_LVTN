@extends('page_layout')
@section('content')

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(/page/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Đổi mật khẩu</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->


<!--My Account Start-->
<div class="register-page section-padding-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="my-account-menu mt-30">
                    <ul class="nav account-menu-list flex-column">
                        <li>
                            <a href="{{URL::to('/profile')}}"><i class="fa fa-user"></i> Hồ Sơ</a>
                        </li>
                        <li>
                            <a class="active"><i class="fa fa-key"></i> Đổi Mật Khẩu</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <div class="tab-content my-account-tab mt-30" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-password">
                        <div class="my-account-address account-wrapper">
                            <div class="row">
                                <div class="col-md-12" style="border-bottom: solid 1px #efefef;">
                                    <h4 class="account-title" style="margin-bottom: 0;">Đổi Mật Khẩu</h4>
                                    <h5 style="color: #666;">Quản lý thông tin hồ sơ để bảo mật tài khoản</h5>
                                </div>
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                 @endif

                                <!-- Error Messages -->
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="{{URL::to('/submit-change-password')}}" id="form-change-password">
                                    @csrf
                                    <div class="text-primary mt-2 alert-password"></div>
                                    <div class="col-md-12">
                                        <div class="account-address mt-30">
                                            <div class="form-group mb-30">
                                                <span class="profile__info-body-left-item-title d-inline-block" style="width: 20%; margin-right:9%;">Mật Khẩu Cũ</span>
                                                <input name="current_password" id="1" type="password" style="width: 70%">
                                            </div>
                                            <div class="form-group mb-30">
                                                <span class="profile__info-body-left-item-title d-inline-block" style="width: 20%; margin-right:9%;">Mật Khẩu Mới</span>
                                                <input name="new_password" id="new_password" type="password" style="width: 70%">
                                            </div>
                                            <div class="form-group mb-30">
                                                <span class="profile__info-body-left-item-title d-inline-block" style="width: 20%; margin-right:9%;">Nhập Lại Mật Khẩu</span>
                                                <input name="new_password_confirmation" id="new_password_confirmation" type="password" style="width: 70%">
                                            </div>
                                            <input class="btn btn-primary change-password" type="submit" style="float: right;" value="Lưu">
                                          
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--My Account End-->

<script src="{{asset('/page/js/jquery.validate.min.js')}}"></script>



@endsection