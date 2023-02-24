@extends('Admin.main')

@section('content')
<table class="table">
 
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên Sản Phẩm </th>
        <th scope="col">Danh mục </th>
        <th scope="col"> qty   </th>
        <th scope="col"> sizeo   </th>
        <th scope="col"> Color   </th>
        <th scope="col">Giá gốc </th>
        <th scope="col">Giá sale  </th>
        <th scope="col"> Hình ảnh   </th>
        <th scope="col">Sửa|| Xóa</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>

        <th scope="row">{{$product->name}}</th>
        <th scope="row">{{$product->menu_id}}</th>
        <th scope="row">{{$product->qty}}</th>
        <th scope="row">{{$product->size}}</th>
        <th scope="row">{{$product->color}}</th>
        <th scope="row">{{$product->price}}</th>

      <th scope="row">{{$product->price_sale}}</th>
        <td>
          <img src="{{$product->image}} " alt=" " width= "50px " height=  "50px ">
        </td>


        <th scope="row">
          <a class="bnt bnt-warning " href="{{route('product.edit',[$product->id])}}"><i class="fas fa-edit"></i>  </a> || 
          <a class="bnt bnt-success "href="{{route('product.delete',[$product->id])}}"> <i class="fas fa-trash"> </i></a>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $products->links('pagination::bootstrap-4') }}
  @endsection