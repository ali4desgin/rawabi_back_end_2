@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">معلومات الاتصال</h1>
            <div class="form-group">
                <a href="{{ route("admin_add_info") }}" class="btn btn-default btn-sm">اضافة معلومات</a>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
             
                </div>
                <!-- /.panel-heading -->

                @if(count($newses))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>الهاتف</th>
                                <th>الهاتف الثاني</th>
                                <th>الهاتف الثالث</th>
                                <th> واتساب</th>
                                <th>اليريد</th>
                                <th>احداثيات الموقع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newses as $news)
                                <tr>
                                    <td>{{ $news["phone1"] }}</td>
                                    <td>{{ $news["phone2"] }}</td>
                                    <td>{{ $news["phone3"] }}</td>
                                    <td>{{ $news["whatsapp"] }}</td>
                                    <td>{{ $news["mail"] }}</td>
                                    <td>{{ $news["longt"] }}</td>
                                    <td>{{ $news["lat"] }}</td>
                                    <td>
                                        <a  href="{{ route("admin_change_delete_info",["news_id"=>$news["id"]]) }}" class="confirm btn btn-danger btn-sm">حذف </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->


                {{ $newses->links() }}

                <!-- /.panel-body -->
            </div>
            @else
                <div class="alert alert-warning text-center">لا توجد اي جهات اتصال</div>
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