<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <H1>Create User</H1>
 <form action="{{route('user.store',1)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
     <label for="fullName"> ID</label>
     <input type="number" name="ID" id="ID" class="form-control" placeholder="Enter" aria-describedby="id">
   </div>
   <div class="form-group">
     <label for="fullName"> Full Name</label>
     <input type="text" name="fullName" id="fullname" class="form-control" placeholder="Enter" aria-describedby="fullname">
   </div>
   <div class="form-group">
        <label for="exampleFormControlSelect2">Level</label>
        <select class="form-control" id="exampleFormControlSelect2" name="Level">
          <option value="1"  > ADMIN</option>
          <option value="2"  > Menmber</option>
        </select>
    </div>
    <div class="form-group">
     <label for="Email"> Email</label>
     <input type="text" name="Email" id="Email" class="form-control" placeholder="Enter" aria-describedby="Email">
   </div>
   <a class="bnt bnt-warning bnt-sm" href="{{route('user.index')}}">Trở Lại</a>   ||
         <button type="submit" class="bnt bnt-success bnt-sm" > Lưu Lại </button>
 </form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>