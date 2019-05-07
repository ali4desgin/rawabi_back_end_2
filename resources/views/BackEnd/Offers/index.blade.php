@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">العروض</h1>
            <div class="form-group">
                <a href="{{ route("admin_add_offer") }}" class="btn btn-default btn-sm">اضافة عرض</a>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    العروض
                </div>
                <!-- /.panel-heading -->

                @if(count($offers))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>المحتوى</th>
                                <th>الحالة</th>
                                <th>صورة</th>
                                <th> تاريخ الاضافة</th>
                                <th>ادارة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offers as $offer)
                                <tr>
                                    <td>{{ $offer["id"] }}</td>
                                    <td>{{ $offer["title"] }}</td>
                                    <td>{{ $offer["description"] }}</td>
                                    <td><?php echo  \App\Models\Offer::get_type_ui($offer["status"]) ?></td>
                                    <td><?php echo  \App\Models\Offer::getImage($offer["has_image"],$offer["image"]) ?></td>
                                    <td>{{ $offer["created_at"] }}</td>
                                    <td>

                                        @if($offer["status"]=="active")
                                            <a  href="{{ route("admin_change_status_offer",["offer_id"=>$offer["id"],"status"=>"expire"]) }}" class="confirm btn btn-warning btn-sm">قفل</a>
                                        @else

                                            <a  href="{{ route("admin_change_status_offer",["offer_id"=>$offer["id"],"status"=>"active"]) }}" class="confirm btn btn-success btn-sm">تفعيل </a>

                                        @endif
                                            <a  href="{{ route("admin_change_delete_offer",["offer_id"=>$offer["id"]]) }}" class="confirm btn btn-danger btn-sm">حذف </a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->


                {{ $offers->links() }}

                <!-- /.panel-body -->
            </div>
            @else
                <div class="alert alert-warning text-center">لا توجد اي عروض حاليا</div>
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