@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")

@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">طلب رقم  ({{ $order->id }})</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="{{ route("send_message_post") }}" method="post" enctype="multipart/form-data">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>Error !</strong> {{ $error }}</div>
                            @endforeach
                        @endif
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-10">
                                    <input type="hidden" name="isImage" id="isImage" value="no">
                                    <input type="hidden" name="room_id"  value="{{ $order->id }}">
                                    <textarea id="messageTxtArea" type="text" class="form-control input-lg" placeholder="نص الرسالة هنا" name="message"></textarea>
                                    <img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/emea/shared/send-receive-no-p2p/buyonline_browser1.png" height="150" id="imagesViewer" style="display: none"/>
                                </div>
                                <div class="col-sm-2">
                                    <input type="file" name="image" accept="image/*" style="display: none" id="file_uploader">
                                    <button type="button" id="file_uploader_btn" class="btn btn-default"><i class="fa fa-file"></i> </button>
                                    <input type="submit" class="btn btn-primary" value="ارسالة">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                    </form>
                </div>

                <div class="panel-body">
                    @if(count($chats))
                        @foreach($chats as $chat)

                            <?php
                            if($chat["is_image"]=="yes")
                                {
                                    $message = "<img src='".asset("chats/images/".$chat["image"])."' width='300px'/>";
                                }else{

                                $message = $chat["message"];
                            }
                            ?>

                            @if($chat["isAdmin"]=="yes")
                                <div class="chat_message pull-right well">
                                    <span class="pull-left label label-info">
                                        <b>المشرف</b>
                                    </span>
                                    <?php echo $message ?>
                                    </div>
                            @else
                                <div class="chat_message pull-left well">
                                    <span class="pull-left  label label-warning">
                                        <b>العميل</b>
                                    </span>
                                    <?php echo $message ?></div>
                             @endif
                         @endforeach
                    @else
                        <div class="alert alert-warning">لا توجد اي رسالة في هذا الطلب</div>
                    @endif
                </div>
                <div class="panel-footer">
                    {{ $chats->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


