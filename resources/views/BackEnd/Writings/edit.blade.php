@extends("BackEnd.Master.app")

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> حساب موزع </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    املآ جميع الخانات
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" action="{{ route("admin_edit_balance_writing_post") }}">
                                <input type="hidden" name="writing_id" value="{{ $writing->id }}">

                                @csrf
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            <button class="close" data-dismiss="alert">×</button>
                                            <strong>Error !</strong> {{ $error }}</div>
                                    @endforeach
                                @endif
                                <div class="form-group">
                                    <label>اسم الحساب</label>
                                    <input class="form-control" placeholder="ادخل اسم الحساب للموزع" required name="name" value="{{ $writing->name }}">
                                </div>
                                <div class="form-group">
                                    <label>الرصيد</label>
                                    <input class="form-control" placeholder="الرصيد " required name="balance" value="{{ $writing->balance }}">
                                </div>

                                <div class="form-group">
                                    <label>رقم الموزع</label>
                                    <input class="form-control" placeholder="رقم  الموزع" required name="number" value="{{ $writing->number }}">
                                </div>

                                <button type="submit" class="btn btn-default"> تعديل</button>
                            </form>
                        </div>

                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection



@section("scripts")
    <script src="{{  asset("BackEnd/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{  asset("BackEnd/js/matrix.tables.js") }}"></script>
@endsection