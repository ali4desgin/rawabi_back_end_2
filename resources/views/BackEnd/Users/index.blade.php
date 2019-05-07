@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">حسابات العملاء</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    جميع المستخدمين بالتطبيق
                </div>
                <!-- /.panel-heading -->

                @if(count($users))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>رقم الهاتف</th>
                                <th> تاريخ الانضمام</th>
                                <th>ادارة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user["id"] }}</td>
                                <td>{{ $user["username"] }}</td>
                                <td>{{ $user["phone"] }}</td>
                                <td>{{ $user["created_at"] }}</td>
                                <td>

                                    @if($user["status"]=="active")
                                        <a  href="{{ route("admin_change_status_user",["user_id"=>$user["id"],"status"=>"block"]) }}" class="btn btn-warning btn-sm">حظر</a>
                                    @else

                                        <a  href="{{ route("admin_change_status_user",["user_id"=>$user["id"],"status"=>"active"]) }}" class="btn btn-success btn-sm">تفعيل الحساب</a>

                                    @endif
                                        <a  href="{{ url("adminpanel/users/orders/".$user["id"]) }}" class="btn btn-info btn-sm">عرض الطلبات</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->


                    {{ $users->links() }}

                <!-- /.panel-body -->
            </div>
            @else
                <div class="alert alert-warning text-center">لا يوجد اي مستخدمين</div>
            @endif
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection



@section("scripts")
    <script src="{{  asset("BackEnd/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{  asset("BackEnd/js/matrix.tables.js") }}"></script>
@endsection