@extends('Admin.main')

@section('content')
 <form action="{{route('productdetailider.update',[$productdetails->id])}}" method="post">
    @csrf
 <ul class="list-group">
    <li class="list-group-item">ID : {{$productdetails->id}} </li>
    <li class="list-group-item"> Name : 
        <input type="text" name="color" value="{{$productdetails->color}}">
    </li>
    <li class="list-group-item"> size : 
        <input type="text" name="size" value="{{$productdetails->size}}">
    </li>
    <li class="list-group-item">    
  
    <li class="list-group-item"> update: 
      <input type="date" name="updated_at" id="updated_at" value="{{$productdetails->updated_at}}">
    </li>
    <li class="list-group-item">
         <a class="bnt bnt-warning bnt-sm" href="{{route('productdetailider.index',[$productdetails->id])}}">Trở Lại</a>   ||
         <button type="submit" class="bnt bnt-success bnt-sm" > Lưu Lại </button>
        </li>
  </ul>

 </form>

@endsection