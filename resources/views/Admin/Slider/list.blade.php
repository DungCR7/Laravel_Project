@extends('Admin.main')

@section('content')
<table class="table">
 
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
      
        <th scope="col">Danh mục </th>
        <th scope="col"> Đường dẫn   </th>
        <th scope="col"> Hình ảnh   </th>
        <th scope="col">Sửa  ||  Xóa</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sliders as $sliders)
      <tr>
        <th scope="row">{{$sliders->id}}</th>

        <th scope="row">{{$sliders->name}}</th>
        <th scope="row">{{$sliders->product_id}}</th>
        <th scope="row">{{$sliders->url}}</th>
     
    


        <td>
          <img src="{{$sliders->image}} " alt=" " width= "50px " height=  "50px ">
        </td>


        <th scope="row">
          <a class="bnt bnt-warning " href="{{route('Slider.edit',[$sliders->id])}}"><i class="fas fa-edit"></i>  </a> || 
          <a class="bnt bnt-success "href="{{route('Slider.delete',[$sliders->id])}}"> <i class="fas fa-trash"></i> </a>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection