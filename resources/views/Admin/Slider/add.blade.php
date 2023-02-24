@extends('Admin.main')
@section('head')
<script src="{{asset('')}}template/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="{{route('Slider.store')}}" method="POST">

    <div class="form-group">
        <label for="menu"> Tiêu đề  </label>
        <input type="text" name="name" class="form-control"  placeholder="Tiêu đề  ">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect2">Danh Mục</label>
        <select class="form-control" id="exampleFormControlSelect2" name="product_id">
          <option selected > Danh mục cha</option>
          @foreach ($product as $product)
          <option value="{{$product->id}}" name="product_id"> {{$product->name}}</option>
          @endforeach
        </select>
    </div> 
    <div class="form-group">
        <label for="menu">Đường dẫn </label>
        <input type="text" name="url" class="form-control"  placeholder="Đường dẫn ">
    </div>
   
    <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="image" id="image">
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
<!-- <script>
    CKEDITOR.replace('content');
</script> -->
@endsection