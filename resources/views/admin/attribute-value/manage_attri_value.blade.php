@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        
                    </div>
                    <a href="{{URL::to('/add-attri-value')}}" class="btn btn-primary add-list">Thêm Phân Loại</a>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Hiển thị thông báo thành công -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            </div>

            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Mã phân loại</th>
                                <th>Nhóm phân loại</th>
                                <th>Tên phân loại</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach($list_attr_value as $key => $attr_value)
                            <tr>
                                <td>{{$attr_value->idProVal}}</td>
                                <td>{{$attr_value->PropertyName}}</td>
                                <td>{{$attr_value->ProValName}}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"
                                            href="{{URL::to('/edit-attri-value/'.$attr_value->idProVal)}}"><i class="fas fa-edit mr-0"></i></a>
                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-target="#model-delete-{{$attr_value->idProVal}}" data-placement="top" title="" data-original-title="Xóa"
                                            style="cursor:pointer;"><i class="fas fa-trash-alt mr-0"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade bd-example-modal-sm"  role="dialog" id="model-delete-{{$attr_value->idProVal}}"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có muốn xóa phân loại {{$attr_value->AttrValName}} không?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                                        <a href="{{URL::to('/delete-attri-value/'.$attr_value->idProVal)}}" type="button" class="btn btn-primary">Xác nhận</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->

@endsection