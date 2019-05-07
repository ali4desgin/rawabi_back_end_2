@extends("BackEnd.Master.app")
@section("header_section")
    Dashboard
@endsection


@section("content")
    {!! $chart->container() !!}
@endsection


@section("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@endsection