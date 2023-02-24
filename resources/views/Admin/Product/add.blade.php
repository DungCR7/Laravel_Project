@extends('Admin.main')
@section('head')
<script src="{{asset('')}}template/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="{{route('product.store')}}" method="POST">

    <div class="form-group">
        <label for="menu">Tên sản phẩm </label>
        <input type="text" name="name" class="form-control"  placeholder="Nhập tên danh mục">
    </div>
       <div class="form-group">
        <label for="exampleFormControlSelect2">Danh Mục</label>
        <select class="form-control" id="exampleFormControlSelect2" name="menu_id">
          <option selected > Danh mục cha</option>
          @foreach ($menus as $menus)
          <option value="{{$menus->id}}"> {{$menus->name}}</option>
          @endforeach
        </select>
    </div> 
    <div class="form-group">
        <label for="menu">Giá sản phẩm </label>
        <input type="number" name="price" class="form-control"  placeholder="Nhập giá ">
    </div>
    <div class="form-group">
        <label for="menu">Giá sản phẩm sale </label>
        <input type="number" name="price_sale" class="form-control"  placeholder="Nhập giá sale ">
    </div>
    <div class="form-group">
        <label for="menu">Màu sản phẩm </label>
        <input type="text" name="color" class="form-control"  placeholder="Nhập giá sale ">
    </div>
    <div class="form-group">
        <label for="menu">  Size  </label>
        <input type="text" name="size" class="form-control"  placeholder="Nhập giá sale ">
    </div>
    <div class="form-group">
        <label for="menu"> Số lượng sản phẩm </label>
        <input type="number" name="qty" class="form-control"  placeholder="Nhập giá sale ">
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea name="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="image" id="image">
            </div>
       

    </div>
    <!-- <div class="form-group">
        <label>Kich hoạt</label>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" value="1" type="radio" id="active" name="active">
            <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="noactive" id="active" value="0" name="active">
            <label for="noactive" class="custom-control-label">Không</label>
        </div> -->
       

    </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Taọ danh mục</button>
    </div>
    @csrf
</form>
@endsection
@section('footer')
<script>
    CKEDITOR.replace('content');
</script>
@endsection