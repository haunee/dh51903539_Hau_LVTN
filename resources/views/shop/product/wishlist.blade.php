@extends('page_layout')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(/page/images/banner/banner-shop.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Danh Sách Yêu Thích</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh Sách Yêu Thích</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

    <!--Cart Start-->
    <div class="cart-page section-padding-5">
        <div class="container">
            <div class="col-xl-12 col-md-12">
                <div class="tab-content my-account-tab mt-30" id="pills-tabContent">
                    <div class="tab-pane fade active show">
                        <div class="my-account-order account-wrapper">
                            <table id="example" class="table table-striped table-bordered wishlist-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="no text-center">STT</th>
                                        <th class="name" style="width:15%;">Hình Ảnh</th>
                                        <th class="date">Sản Phẩm</th>
                                        <th class="date">Giá</th>
                                        <th class="action text-center" style="width:6%;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>             
                                    @foreach($wishlist as $key => $wish)                     
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <?php $image = json_decode($wish->ImageName)[0]; ?>
                                        <td>
                                            <a href="{{URL::to('/shop-single/'.$wish->idProduct)}}"><img src="{{asset('/storage/kidadmin/images/product/'.$image)}}" alt=""></a>
                                        </td>
                                        <td>
                                            <div><a href="{{URL::to('/shop-single/'.$wish->idProduct)}}">{{$wish->ProductName}}</a></div>
                                            <div>Mã sản phẩm: {{$wish->idProduct}}</div>
                                            <div class="text-primary">Còn Lại: {{$wish->QuantityTotal}}</div>
                                        </td>

                                        <td>{{$wish->Price}}</td>            

                                        <td class="text-center">
                                            <a class="view-hover h3 d-block delete-wish" data-id="{{$wish->idWish}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa"><i class="fa fa-trash"></i></a>
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
    </div>
    <!--Cart End-->

<script>
    $(document).ready(function()
    {
       // Thiết lập CSRF token cho tất cả các yêu cầu AJAX
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Xử lý sự kiện click trên nút xóa
        $('.delete-wish').click(function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

            var idWish = $(this).data('id');
            var button = $(this); // Lưu đối tượng nút để thay đổi sau khi xóa

            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm yêu thích này không?')) {
                $.ajax({
                    url: '/delete-wish/' + idWish,
                    type: 'DELETE',
                    success: function(response) {
                        // Xử lý khi xóa thành công
                        button.closest('tr').remove(); // Xóa hàng liên quan nếu trong bảng
                        alert('Sản phẩm yêu thích đã được xóa.');
                    },
                    error: function(xhr) {
                        // Xử lý khi có lỗi xảy ra
                        alert('Đã xảy ra lỗi khi xóa sản phẩm yêu thích.');
                    }
                });
            }
        });
    });  
</script>

@endsection