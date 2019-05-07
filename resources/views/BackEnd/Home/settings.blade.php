@extends("BackEnd.Master.app")
@section("header_section")
    Edit Manger #{{ $manger->id }}
@endsection


@section("content")
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Manger #{{ $manger->id }}</h5>
                    </div>
                    <div class="widget-content nopadding">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                @if($error=="done")
                                    <div class="alert alert-success">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Success!</strong> data updated</div>
                                @else

                                    <div class="alert alert-danger">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Error !</strong> {{ $error }}</div>
                                @endif
                            @endforeach
                        @endif

                        <form action="{{ route("admin_edit_manger_post",["payment_id"=>$manger->id]) }}" method="post" class="form-horizontal">
                            @csrf

                            <div class="control-group">
                                <label class="control-label">Email address :</label>
                                <div class="controls">
                                    <input type="text" class="span11" value="{{ $manger->email }}" placeholder="Last name" name="email" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mangername :</label>
                                <div class="controls">
                                    <input type="text" class="span11"name="name" value="{{ $manger->name }}" placeholder="Last name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Status :</label>
                                <div class="controls">
                                    {{--<input type="text" class="span11" placeholder="First name">--}}
                                    <select class="span11" name="status">
                                        <option value="active" @if($manger->status=="active") selected @endif>active</option>
                                        <option value="blocked" @if($manger->status=="blocked") selected @endif>blocked</option>

                                    </select>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">permissions :</label>
                                <div class="controls">
                                    {{--<input type="text" class="span11" placeholder="First name">--}}
                                    <select class="span11" name="permissions">
                                        <option value="full_admin" @if($manger->permissions=="full_admin") selected @endif>full admin</option>
                                        <option value="manger" @if($manger->status=="manger") selected @endif>manger</option>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">New password :</label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="new password" name="new_password">
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

