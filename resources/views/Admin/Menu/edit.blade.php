@extends('Admin.main')

@section('content')
<H1>User edit :{{$menus->name}}</H1>
 <form action="update/{{$menus->id}}" method="POST">
    @csrf
 <ul class="list-group">
    <li class="list-group-item">ID : {{$menus->id}} </li>
    <li class="list-group-item"> Name : 
        <input type="text" name="name" value="{{$menus->name}}">
    </li>
    <li class="list-group-item"> update: 
      <input type="date" name="updated_at" id="updated_at" value="{{$menus->updated_at}}">
    </li>
    <li class="list-group-item">
         <a class="bnt bnt-warning bnt-sm" href="{{route('menu.index',[$menus->id])}}">Trở Lại</a>   ||
         <button type="submit" class="bnt bnt-success bnt-sm" > Lưu Lại </button>
        </li>
  </ul>

 </form>

@endsection