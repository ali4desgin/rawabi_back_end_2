@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="{{ route("admin_add_offer_post") }}" method="post" enctype="multipart/form-data">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>Error !</strong> {{ $error }}</div>
                            @endforeach
                        @endif
                        @csrf
                        <div class="form-group">

                            <input id="messageTxtArea" type="text" class="form-control" placeholder="العنوان" name="title">
                        </div>
                        <div class="form-group">
                            <textarea  type="text" class="form-control " placeholder="نص الرسالة هنا" name="message"></textarea>
                        </div>
                        <div class="form-group">

                            <input  type="file" class="form-control " name="image" >
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="اضافة">
                        </div>
                    </form>
                </div>




            </div>
        </div>
    </div>
@endsection


