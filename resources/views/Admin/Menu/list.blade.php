@extends('Admin.main')

@section('content')
<table class="table">
 
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Update</th>
        <th scope="col">Sửa|| Xóa</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menus as $menus)
      <tr>
        <th scope="row">{{$menus->id}}</th>

        <th scope="row">{{$menus->name}}</th>

        <th scope="row">{{$menus->updated_at}}</th>

        <th scope="row">
          <a class="bnt bnt-warning " href="{{route('menu.edit',[$menus->id])}}"><i class="fas fa-edit">  </i></a> || 
          <a class="bnt bnt-success "href="{{route('menu.delete',[$menus->id])}}"> <i class="fas fa-trash"></i> </a>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection