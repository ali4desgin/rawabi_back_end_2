@extends("BackEnd.Master.app")


@section("header_section")
    Tickets
@endsection



@section("content")
    <div class="container-fluid">
        @if(count($tickets)>=1)

            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-beer"></i> </span>
                            <h5> Tickets</h5>

                        </div>
                        <div class="widget-content nopadding">

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>manage</th>
                                    <th>Created at</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $ticket)
                                    <?php
                                    $user = \App\models\User::find($ticket['user_id']);
                                    ?>
                                    <tr>
                                        <td>{{ $ticket['id'] }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td><?php echo \App\Models\Ticket::getStatusUi($ticket['status']) ?></td>
                                        <td>
                                            @if($ticket['status']!="closed")
                                                <a href="{{ route("admin_close_ticket",["ticket_id",$ticket['id']]) }}" class="btn btn-danger">Close</a>
                                            @endif
                                            <a href="{{ route("admin_view_ticket",["ticket_id",$ticket['id']]) }}" class="btn btn-primary">View</a>
                                        </td>
                                        <td>{{ $ticket['created_at'] }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>




                        </div>


                    </div>

                    <div class="text-center">{{ $tickets->links() }}</div>

                </div>
            </div>

        @else

            <div class="alert">
                <button class="close" data-dismiss="alert">×</button>
                <strong>Warning!</strong> tickets count is zero </div>

        @endif
    </div>
@endsection