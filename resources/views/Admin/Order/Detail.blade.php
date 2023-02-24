@extends('Admin.main')

@section('content')

<div class="customer mt-3" >
        <ul>
            <li>Tên khách hàng: <strong>{{ $orders->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $orders->phone }}</strong></li>
            <li>Địa chỉ: <strong>{{ $orders->address }}</strong></li>
            <li>Email: <strong>{{ $orders->email }}</strong></li>
            <li>Ghi chú: <strong>{{ $orders->content }}</strong></li>
            <!-- <li>Số lượng sản phẩm: <strong>{{ $orders->qty }}</strong></li>
            <li>Giá: <strong>{{ $orders->price }}</strong></li> -->
        </ul>
    </div>
    <form action="{{route('u',[$orders->order_id])}}" method= "post" >
    @csrf
    <div class="form-group">
        <label for="exampleFormControlSelect2">Trạng thái của đơn hàng</label>
        <select class="form-control" id="exampleFormControlSelect2" name="status">
          <option value="0" > Chưa xác nhận</option>
          <option value="1" > Đã xác nhận </option>
        </select>
    </div>
    <button type="submit">Cập nhật </button>
    </form>
    @endsection