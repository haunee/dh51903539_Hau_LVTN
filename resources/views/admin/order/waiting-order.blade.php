@extends('admin_layout')
@section('content_dash')

@php
use Carbon\Carbon;
@endphp
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Đơn Chờ Xác Nhận ( Tổng: {{$list_order->count()}} đơn hàng )</h4>
                        <p class="mb-0">Trang tổng quan mua hàng cho phép người quản lý mua hàng theo dõi, đánh giá một cách hiệu quả,<br>
                            và tối ưu hóa tất cả các quy trình mua lại trong một công ty.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Mã ĐH</th>
                                <th>Tên Tài Khoản</th>
                                <th>SĐT</th>
                                <th>Thanh Toán</th>
                                <th>Ngày Đặt Hàng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body" id="load-bill">
                            @foreach($list_order as $key => $order)
                            <tr>
                                <td>{{$order->idOrder}}</td>
                                <td>{{$order->username}}</td>
                                <td>{{$order->CusPhone}}</td>
                                <td>@if($order->Payment == 'vnpay') VNPay @else Khi nhận hàng @endif</td>
                                <td>{{ Carbon::parse($order->created_at)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td>

                                <td>
                                    <form action="{{URL::to('/confirm-bill/'.$order->idOrder)}}" method="POST"> @csrf
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge badge-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xem chi tiết" 
                                            href="{{URL::to('/order-info/'.$order->idOrder)}}"><i class="fa fa-eye mr-0"></i>
                                        </a>
                                        <button class="badge badge-info mr-2 momo" style="border:none;" data-toggle="tooltip" data-placement="top" title="" 
                                            data-original-title="Xác nhận đơn hàng"><i class="fa fa-check"></i>
                                        </button>
                                        <input type="hidden" name="Status" value="1">
                                        <a class="badge bg-warning mr-2 delete-bill-btn" data-toggle="modal" data-target="#modal-delete-bill" data-placement="top" data-original-title="Hủy đơn hàng"
                                            data-id="{{$order->idOrder}}" style="cursor:pointer;"><i class="fa fa-trash mr-0"></i>
                                        </a>
                                    </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->

<!-- Modal hủy đơn hàng -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="modal-delete-bill"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Thông báo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="content-delete"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
            <button id="delete-bill-confirm" type="button" class="btn btn-primary">Xác nhận</button>
        </div>
    </div>
    </div>
</div>

<script>
    $(document).ready(function(){  
        APP_URL = '{{url('/')}}' ;
        $(".delete-bill-btn").on("click", function() {
            var idOrder = $(this).data("id");
            $(".content-delete").html("Bạn có muốn hủy đơn hàng #" +idOrder+ " không?");

            $("#delete-bill-confirm").on("click", function() {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: APP_URL + '/delete-bill/' +idOrder,
                    method: 'POST',
                    data: {_token:_token},
                    success:function(data){
                        location.reload();
                    }
                });
            });
        });
    });
</script>

@endsection