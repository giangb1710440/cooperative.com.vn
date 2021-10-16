<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Quản lý đơn hàng</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/dataTables.bootstrap4.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{asset('public/server/css/app-dark.css')}}" id="darkTheme">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12bbc8e57f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
</head>
<body class="vertical  dark  ">
<div class="wrapper">
    @include('server_view.header_admin')

    @include('server_view.taskbar_admin')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Danh sách đơn hàng</h2>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th><strong>Mã đơn hàng</strong></th>
                                            <th><strong>Tên khách hàng</strong></th>
                                            <th><strong>Tổng tiền (VNĐ)</strong></th>
                                            <th><strong>Ghi chú</strong></th>
                                            <th><strong>Tình trạng đơn hàng</strong></th>
                                            <th><strong>Tùy chọn</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order as $orders)
                                            <tr>
                                                <td>
                                                    <i class="fas fa-paperclip"></i>
                                                </td>

                                                <td>
                                                    ORDER{{$orders->id}}
                                                </td>
                                                <td>
                                                    @foreach($user as $users)
                                                        @if($users->id == $orders->id_user )
                                                            <a href="">{{$users->name_user}}</a>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{number_format($orders->total_price_order)}}
                                                </td>

                                                <td>
                                                    {{$orders->note_order}}
                                                </td>

                                                <td>
                                                    @if($orders->status_order == 0)
                                                        Chờ duyệt
                                                    @elseif($orders->status_order == 1)
                                                        Đã nhận đơn
                                                    @elseif($orders->status_order == 2)
                                                        Đã nhận hàng
                                                    @elseif($orders->status_order == 3)
                                                        Đã hủy đơn
                                                    @endif
                                                </td>
                                                <td>
                                                    {{--                                                    <a href="{{route('detail_diary',$products->id)}}" type="button" class="btn mb-2 btn-outline-secondary"> </a>--}}
                                                    <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#detail_order{{$orders->id}}" data-whatever="@mdo"><i class="far fa-eye"></i></a>
                                                    <div class="modal fade" id="detail_order{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                    <div class="card shadow">
                                                                        <div class="card-body p-5">
                                                                            <div class="row mb-12">
                                                                                <div class="col-12 text-center mb-4">
                                                                                    <img width="250px" height="100px" src="{{asset('public/server/assets/avatars/GosCooperative.png')}}" class="" alt="...">
                                                                                    <h2 class="mb-0 text-uppercase">Hóa đơn bán hàng</h2>
                                                                                    <p class="text-muted"> Gos - Cooperative<br /> 13/10/2021 </p>
                                                                                </div>

                                                                                <div class="col-md-7" style="padding-left: 20px">
                                                                                    <p style="margin-left: 40px" class="small text-muted text-uppercase mb-2">Đơn vị bán hàng</p>
                                                                                    <p style="margin-left: 40px" class="mb-4">
                                                                                        <strong>Gos - Cooperative</strong><br /> Hợp tác xã nông nghiệp<br /> 225/27,30/4, Ninh Kiều, Cần Thơ<br /> 0939337416<br />
                                                                                    </p>
                                                                                    <p style="margin-left: 40px">
                                                                                        <span class="small text-muted text-uppercase">Mã hóa đơn: #{{$orders->id}}</span><br />
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-md-5" style="padding-left: 50px">
                                                                                    <p class="small text-muted text-uppercase mb-2">Khách hàng</p>
                                                                                    <p class="mb-4">
                                                                                        @foreach($user as $users)
                                                                                            @if($users->id == $orders->id_user )
                                                                                                <strong>{{$users->name_user}}</strong><br />
                                                                                        {{$users->address_user}}<br /> {{$users->email}}<br /> {{$users->phone_user}}<br />
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </p>
                                                                                    <p>
                                                                                        <small class="small text-muted text-uppercase">Ngày đặt hàng</small><br />
                                                                                        <strong>{{date('d-m-Y', strtotime($orders->created_at))}} </strong>
                                                                                    </p>
                                                                                </div>
                                                                            </div> <!-- /.row -->
                                                                            <table class="table table-borderless table-striped">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th scope="col">#</th>
                                                                                    <th width="130px" scope="col">Sản phẩm</th>
                                                                                    <th scope="col" class="text-right">Đơn giá(VNĐ)</th>
                                                                                    <th scope="col" class="text-right">Số lượng</th>
                                                                                    <th scope="col" class="text-right">Thành tiền</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @php($key=0)
                                                                                @foreach($detail_order as $detail_orders)
                                                                                    <tr>
                                                                                        @if($detail_orders ->id_order ==$orders->id)
                                                                                            <th scope="row">{{++$key}}</th>
                                                                                            <td width="130px">
                                                                                                @foreach($product as $products)
                                                                                                    @if($products->id ==$detail_orders->id_product )
                                                                                                        {{$products->name_product}}
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </td>
                                                                                            <td class="text-right">{{number_format($detail_orders->unit_price_order/$detail_orders->quality_order)}}</td>
                                                                                            @foreach($product as $products)
                                                                                                @if($products->id ==$detail_orders->id_product )
                                                                                                    @foreach($unit as $units)
                                                                                                        @if($units->id == $products->id_unit  )
                                                                                                            <td class="text-right">{{$detail_orders->quality_order}}{{strtoupper($units->name_unit)}}</td>
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @endforeach
                                                                                            <td class="text-right">{{number_format($detail_orders->unit_price_order)}}</td>
                                                                                        @endif
                                                                                    </tr>
                                                                                @endforeach

                                                                                </tbody>
                                                                            </table>
                                                                            <div class="row mt-5">
                                                                                <div class="col-2 text-center">

                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <img style="width: 50px;height: 50px" src="{{asset('public/server/assets/images/qrcode.svg')}}" class="navbar-brand-img brand-sm mx-auto my-4" alt="...">
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <div class="text-right mr-2">
                                                                                        <p class="mb-2 h6">
                                                                                            <span class="text-muted">Tạm tính : </span>
                                                                                            <strong>{{number_format($orders->total_price_order)}} VNĐ</strong>
                                                                                        </p>
                                                                                        <p class="mb-2 h6">
                                                                                            <span class="text-muted">VAT (0%) : </span>
                                                                                            <strong>0</strong>
                                                                                        </p>
                                                                                        <p class="mb-2 h6">
                                                                                            <span class="text-muted">Tổng tiền : </span>
                                                                                            <span>{{number_format($orders->total_price_order)}} VNĐ</span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div> <!-- /.row -->
                                                                        </div> <!-- /.card-body -->
                                                                    </div> <!-- /.card -->
                                                                <div class="row align-items-center mb-4">
                                                                    <div class="col">

                                                                    </div>
                                                                    <div style="margin-right: 40px" class="col-auto">

                                                                        <button type="button" class="btn btn-secondary">In hóa đơn</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#delete_order{{$orders->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i></button>
                                                    <div class="modal fade" id="delete_order{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Thông báo</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="col-form-label">Nếu bạn ấn xóa, tất cả dữ liệu liên quan
                                                                                sẽ biến mất và không thể khôi phục được nữa</label>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                    <a href="{{route('post_delete_order',$orders->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Xác nhận xóa</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main> <!-- main -->
</div> <!-- .wrapper -->
<script src="{{asset('public/server/js/jquery.min.js')}}"></script>
<script src="{{asset('public/server/js/popper.min.js')}}"></script>
<script src="{{asset('public/server/js/moment.min.js')}}"></script>
<script src="{{asset('public/server/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/server/js/simplebar.min.js')}}"></script>
<script src='{{asset('public/server/js/daterangepicker.js')}}'></script>
<script src='{{asset('public/server/js/jquery.stickOnScroll.js')}}'></script>
<script src="{{asset('public/server/js/tinycolor-min.js')}}"></script>
<script src="{{asset('public/server/js/config.js')}}"></script>
<script src='{{asset('public/server/js/jquery.dataTables.min.js')}}'></script>
<script src='{{asset('public/server/js/dataTables.bootstrap4.min.js')}}'></script>
<script>
    $('#dataTable-1').DataTable(
        {
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
</script>
<script src="{{asset('public/server/js/apps.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>--}}
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
<script>
    var msg = '{{Session::get('no_add_product')}}';
    var exist = '{{Session::has('no_add_product')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1200,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'Thêm không thành công'
        })
    }
</script>
<script>
    var msg = '{{Session::get('add_product')}}';
    var exist = '{{Session::has('add_product')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1200,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: 'Thành công'
        })
    }
</script>
<script>
    var msg = '{{Session::get('success_delete_product')}}';
    var exist = '{{Session::has('success_delete_product')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1200,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'Đã xóa sản phẩm ra khỏi CSDL'
        })
    }
</script>
<script>
    var msg = '{{Session::get('add_product')}}';
    var exist = '{{Session::has('add_product')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1200,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: 'Đã thêm'
        })
    }
</script>
<script>
    var msg = '{{Session::get('success_delete_order')}}';
    var exist = '{{Session::has('success_delete_order')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1200,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'Đã xóa'
        })
    }
</script>

{{--<script>--}}
{{--    function update_status_order(e) {--}}
{{--        var ele = e.split(",");--}}
{{--        var ktra = document.getElementById('stt_order').value;--}}
{{--        if(ktra > 0 && ktra < 100){--}}
{{--            $.ajax({--}}
{{--                method: "get",--}}
{{--                url: '{{ route('getUpdateSttOrder') }}',--}}
{{--                data: {_token: '{{ csrf_token() }}',--}}
{{--                    id: ele[0],--}}
{{--                    quantity: ele[1]},--}}
{{--                success: function (result) {--}}
{{--                    const Toast = Swal.mixin({--}}
{{--                        toast: true,--}}
{{--                        position: 'top-end',--}}
{{--                        showConfirmButton: false,--}}
{{--                        timer: 600,--}}
{{--                        timerProgressBar: true,--}}
{{--                        didOpen: (toast) => {--}}
{{--                            toast.addEventListener('mouseenter', Swal.stopTimer)--}}
{{--                            toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
{{--                        }--}}
{{--                    })--}}
{{--                    Toast.fire({--}}
{{--                        icon: 'success',--}}
{{--                        title: 'Đã cập'--}}
{{--                    });--}}
{{--                    window.setTimeout(function(){--}}
{{--                        window.location.reload();--}}
{{--                    } ,600);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
</body>
</html>