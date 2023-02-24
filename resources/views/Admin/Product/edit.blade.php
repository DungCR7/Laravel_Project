@extends('Admin.main')

@section('content')
<H1> Product edit : {{$products->name}}</H1>
 <form action="{{route('product.update',[$products->id])}}" method="post">
    @csrf
 <ul class="list-group">
    <li class="list-group-item">ID : {{$products->id}} </li>
    <li class="list-group-item"> Name : 
        <input type="text" name="name" value="{{$products->name}}">
    </li>
    <li class="list-group-item"> Color : 
        <input type="text" name="color" value="{{$products->color}}">
    </li>
    <li class="list-group-item"> Số lượng sản phẩm : 
        <input type="number" name="qty" value="{{$products->qty}}">
    </li>
    <li class="list-group-item"> Size : 
        <input type="text" name="size" value="{{$products->size}}">
    </li>
    <li class="list-group-item"> Giá : 
        <input type="number" name="price" value="{{$products->price}}">
    </li>
    <li class="list-group-item"> Giá sale  : 
        <input type="number" name="price_sale" value="{{$products->price_sale}}">
    </li>
    <li class="list-group-item">    
    <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                  <a href="{{$products->image}}" target="_blank" >
                     <img src="{{$products->image}}" width="100px" >
                  </a>
                </div>
                <input type="hidden" name="image" value="{{$products->image}}" id="image">
    </li>
    <li class="list-group-item"> update: 
      <input type="date" name="updated_at" id="updated_at" value="{{$products->updated_at}}">
    </li>
    <li class="list-group-item">
         <a class="bnt bnt-warning bnt-sm" href="{{route('product.index',[$products->id])}}">Trở Lại</a>   ||
         <button type="submit" class="bnt bnt-success bnt-sm" > Lưu Lại </button>
        </li>
  </ul>

 </form>

@endsection