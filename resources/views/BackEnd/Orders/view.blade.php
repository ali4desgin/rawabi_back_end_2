@extends("BackEnd.Master.app")
@section("header_section")
    Users
@endsection

@section("styles")
<style>
    .list-group-item > .badge {
        font-size: 18px !important;
        background: none;
        color: #000;
    }
    .list-group-item {
        font-size: 18px;
    }

</style>


@endsection


@section("content")
    <div class="row" ><h3 class="text-center">رقم الطلب {{ $order->id }}</h3></div>
<div class="row">
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge"><?php echo \App\Models\Order::get_status_ui2($order->status);?></span>
            الحالة
        </li>
        <li class="list-group-item">
            <span class="badge"><?php echo \App\Models\Order::get_type_ui2($order->type);?></span>
            النوع
        </li>

        <li class="list-group-item">
            <span class="badge">{{ $order->record_no }}</span>
            رقم السجل
        </li>


        <li class="list-group-item">
            <span class="badge">{{ $order->city }}</span>
            المدينة
        </li>

        <li class="list-group-item">
            <span class="badge">{{ $user->username }}</span>
            اسم المستخدم
        </li>
        <li class="list-group-item">
            <span class="badge">{{ $order->phone }}</span>
            رقم الهاتف
        </li>
        <li class="list-group-item">
            <span class="badge">{{ $order->job }}</span>
            المهنة
        </li>
        <li class="list-group-item">
            <span class="badge">{{ $order->workshop }}</span>
            مكان العمل
        </li>
        <li class="list-group-item">
            <span class="badge">{{ $order->service_duration }}</span>
            مدة العمل
        </li>
        <li class="list-group-item">
            <span class="badge">{{ $order->sallary }}</span>
           الراتب
        </li>

        <li class="list-group-item">
            <span class="badge">{{ $order->bank }}</span>
            البنك
        </li>
        <li class="list-group-item">
            <span class="badge">{{ $order->profit }}</span>
            الاستقطاعات
        </li>

        <li class="list-group-item">
            <span class="badge">{{ $order->writing_number }}</span>
            رقم المعرف
        </li>
        @if($writing!=null)
        <li class="list-group-item">
            <span class="badge">{{ $writing->name }}</span>
           اسم الموزع
        </li>
            @endif

        @if($admin!=null)
            <li class="list-group-item">
                <span class="badge">{{ $admin->username }}</span>
                اسم المشرف
            </li>
        @endif

        <li class="list-group-item">
            <span class="badge">{{ $order->created_at }}</span>
            تاريخ الطلب
        </li>
    </ul>
</div>
@endsection