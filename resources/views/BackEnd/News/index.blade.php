@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الاخبار</h1>
            <div class="form-group">
                <a href="{{ route("admin_add_news") }}" class="btn btn-default btn-sm">اضافة خبر</a>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    الاخبار
                </div>
                <!-- /.panel-heading -->

                @if(count($newses))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>المحتوى</th>
                                <th> تاريخ الاضافة</th>
                                <th>ادارة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newses as $news)
                                <tr>
                                    <td>{{ $news["id"] }}</td>
                                    <td>{{ $news["title"] }}</td>
                                    <td>{!! $news["message"] !!}</td>
                                    <td>{{ $news["created_at"] }}</td>
                                    <td>
                                        <a  href="{{ route("admin_change_delete_news",["news_id"=>$news["id"]]) }}" class="confirm btn btn-danger btn-sm">حذف </a>
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
                <div class="alert alert-warning text-center">لا توجد اي اخبار حاليا</div>
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