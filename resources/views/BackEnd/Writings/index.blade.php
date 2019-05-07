@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الموزعين</h1>
            <div class="form-group">
                <a href="{{ route("admin_add_writing") }}" class="btn btn-primary btn-sm ">اضافة موزع</a>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    جميع الموزعين بالتطبيق
                </div>
                <!-- /.panel-heading -->

                @if(count($users))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>رقم الموزع</th>
                                <th>الرصيد الحالي</th>
                                <th> تاريخ التسجيل</th>
								<th>الطلبات</th>
                                <th>ادارة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user["id"] }}</td>
                                    <td>{{ $user["name"] }}</td>
                                    <td>{{ $user["number"] }}  </td>
                                    <td>{{ $user["balance"] }} ريال </td>
                                    <td>{{ $user["created_at"] }}</td>
									<td> <a  href="{{ route("admin_writing_orders",["id"=>$user["id"]]) }}" class=" btn btn-success btn-sm"> عرض</a></td>
                                    <td>

                                      <a  href="{{ route("admin_delete_writing",["writing_id"=>$user["id"]]) }}" class="confirm btn btn-danger btn-sm"> حذف</a>
                                      <a  href="{{ route("admin_edit_balance_writing",["writing_id"=>$user["id"]]) }}" class=" btn btn-info btn-sm"> تعديل </a>

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
                <div class="alert alert-warning text-center">لا يوجد اي موزعين</div>
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
