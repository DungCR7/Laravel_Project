@extends('Admin.main')

@section('content')
<table class="table">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
       
                <th scope="col">Tổng tiền </th>
                <th scope="col"> Ngày Đặt Hàng </th>
                <th scope="col"> Hiển thị </th>
                <th scope="col"> Hủy đơn </th>
                <th scope="col"> Trạng thái </th>

        </thead>
        <tbody>
            @foreach($orders as $orders)
            <tr>
                <th scope="row">{{$orders->id}}</th>

          
                <th scope="row">{{$orders->total}}</th>

                <th scope="row">{{$orders->created_at}}</th>
                <th>
                    <a class="btn btn-primary btn-sm" href="{{route('m',[$orders->id])}}">
                        <i class="fas fa-eye"></i>
                    </a>
                    
                </th>
                <th scope="row"><a class="bnt bnt-danger bnt-sm" href="{{route('d',[$orders->id])}}"> Xóa </a></li> </th>
                <th>
                   @if($orders->status==1)
                  <span class="badge badge-primary">Đã xác nhận</span>
                   @else
                  <span class="badge badge-info">  Chưa xác nhận</span>
                   @endif
                    </th>
            </tr>
            @endforeach
        </tbody>
    </table>
   
    @endsection