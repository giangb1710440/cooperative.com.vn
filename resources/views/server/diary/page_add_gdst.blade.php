@extends('server_view.master_admin')
@section('title','Thêm mới giai đoạn sinh trưởng')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Thêm mới giai đoạn sinh trưởng</h2>
                    <p class="text-muted">Các giai đoạn sản xuát được dùng để theo dõi quá trình tăng trưởng của cây trồng.</p>
                    <div class="row">
                        <div class="col-md-1"></div>

                        <div class="col-md-10">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Giai đoạn sinh trưởng</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{route('post_add_gdst')}}" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Tên giai đoạn</label>
                                            <input type="text" class="form-control" id="" name="name_gdst"  required>

                                        </div>
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="validationTextarea">Mô tả </label>
                                            <textarea class="form-control" id="validationTextarea" name="description_gdst" required></textarea>
                                            <div class="invalid-feedback"> Hãy nhập vào mô tả. </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit"><i class="far fa-plus-square"></i> Thêm mới</button>

                                        <a style="margin-left: 10px" class="btn btn-primary" href="{{route('admin_home')}}"><i class="far fa-times-circle"></i> Thoát </a>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->

                        <div class="col-md-1"></div>
                    </div> <!-- end section -->
                </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main>
    <script>
        var msg = '{{Session::get('success_add_gdst')}}';
        var exist = '{{Session::has('success_add_gdst')}}';
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
@endsection