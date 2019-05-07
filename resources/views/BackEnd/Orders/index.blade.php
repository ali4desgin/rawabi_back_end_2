@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الطلبات</h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="" method="get">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="رقم السجل المدني" name="record_no">
                                </div>

                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-default">بحث</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.panel-heading -->

                @if(count($orders))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>السجل المدني</th>
                                <th>نوع الطلب</th>
                                <th>حالة الطلب</th>
                                <th>المشرف</th>
                                <th>التفاصيل</th>
                                <th>عرض المحادثة</th>
                                <th> التاريخ </th>
                                <th> ادارة </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <?php
                                    $user = \App\models\User::find($order["user_id"]);
                                    if($order["admin_id"]){
                                        $adm = \App\models\User::find($order["admin_id"]);
                                    }
                                ?>
                                <tr>
                                    <td>{{ $order["id"] }}</td>
                                    <td>{{ $user["username"] }}</td>
                                    <td>{{ $order["record_no"] }}</td>
                                    <td><?php echo \App\Models\Order::get_type_ui($order["type"]);?></td>
                                    <td><?php echo \App\Models\Order::get_status_ui($order["status"]) ?></td>

                                    <td>@if($order["admin_id"]) {{ $adm["username"] }} @else   لم تتم الموافقة بعد @endif</td>
                                    <td><a  href="{{ route("admin_view_order",["order_id"=>$order["id"]]) }}" class="btn btn-info btn-sm"> عرض</a></td>
                                    <td>
                                        @if($order["status"]!="pending") <a  href="{{ url("adminpanel/orders/messages/".$order["id"]) }}" class="btn btn-primary btn-sm"> المحادثة</a> @else   لم تتم الموافقة بعد @endif

                                    </td>
                                    <td>{{ $order["created_at"] }}</td>
                                    <td>





                                        @if($order["status"]=="closed")
                                            <a  href="" class="btn btn-warning btn-sm">تم اغلاق الطلب</a>
                                        @elseif($order["status"]=="pending")
                                                <a  href="{{ route("admin_change_status_order",["order_id"=>$order["id"],"status"=>"active"]) }}" class="confirm btn btn-warning btn-sm">تفعيل الطلب</a>

                                        @elseif($order["status"]=="complete")

                                            <a  href="" class="btn btn-success btn-sm">الطلب مكتمل</a>
										@else

                                            <a  href="{{ route("admin_change_status_order",["order_id"=>$order["id"],"status"=>"complete"]) }}" class="confirm btn btn-primary btn-sm">اكتمال</a>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->


                {{ $orders->links() }}

                <!-- /.panel-body -->
            </div>
            @else
                <div class="alert alert-warning text-center">لا يوجد اي طلبات</div>
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
