@extends('Admin.main')

@section('content')
<H1> Product edit : {{$Slider->name}}</H1>
 <form action="{{route('Slider.update',[$Slider->id])}}" method="post">
    @csrf
 <ul class="list-group">
    <li class="list-group-item">ID : {{$Slider->id}} </li>
    <li class="list-group-item"> Name : 
        <input type="text" name="name" value="{{$Slider->name}}">
    </li>
    <li class="list-group-item"> Đường dẫn : 
        <input type="text" name="url" value="{{$Slider->url}}">
    </li>
    <li class="list-group-item">    
    <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                  <a href="{{$Slider->image}}" target="_blank" >
                     <img src="{{$Slider->image}}" width="100px" >
                  </a>
                </div>
                <input type="hidden" name="image" value="{{$Slider->image}}" id="image">
    </li>
    <li class="list-group-item"> update: 
      <input type="date" name="updated_at" id="updated_at" value="{{$Slider->updated_at}}">
    </li>
    <li class="list-group-item">
         <a class="bnt bnt-warning bnt-sm" href="{{route('Slider.index',[$Slider->id])}}">Trở Lại</a>   ||
         <button type="submit" class="bnt bnt-success bnt-sm" > Lưu Lại </button>
        </li>
  </ul>

 </form>

@endsection