@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">انشاء حساب موظف </h1>
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
                            <form role="form" method="post" action="{{ route("admin_add_user_post") }}">
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
                                    <input class="form-control" placeholder="ادخل اسم الحساب للموظف" required name="username" value="{{ old("name") }}">
                                </div>

                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input class="form-control" placeholder="رقم الجوال للموظف" required name="phone" value="{{ old("phone") }}">
                                </div>
                                <div class="form-group">
                                    <label>كلمة المرور </label>
                                    <input class="form-control" type="password" autocomplete="new-password" placeholder="كلمة المرور" required name="password">
                                </div>
                                <button type="submit" class="btn btn-default">انشاء حساب</button>
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