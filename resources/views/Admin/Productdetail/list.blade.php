@extends('Admin.main')

@section('content')
<table class="table">
 
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        
        <th scope="col">Danh mục </th>
        <th scope="col"> color   </th>
        <th scope="col"> size   </th>
        <th scope="col">Sửa  ||  Xóa</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productdetails as $productdetails)
      <tr>
        <th scope="row">{{$productdetails->id}}</th>
        <th scope="row">{{$productdetails->product_id}}</th>
        <th scope="row">{{$productdetails->color}}</th>
       
        <th scope="row">{{$productdetails->size}}</th>
     
    




        <th scope="row">
          <a class="bnt bnt-warning " href="{{route('productdetailider.edit',[$productdetails->id])}}"><i class="fas fa-edit"></i>  </a> || 
          <a class="bnt bnt-success "href="{{route('productdetailider.delete',[$productdetails->id])}}"> <i class="fas fa-trash"></i> </a>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection