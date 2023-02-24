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
  <H1>User edit :{{$user->fullName}}</H1> 
 <form action="{{route('user.update',[$user->ID])}}" method="post">
    @csrf
 <ul class="list-group">
    <li class="list-group-item">ID : {{$user->ID}} </li>
    <li class="list-group-item"> Full name : 
        <input type="text" name="fullName" value="{{$user->fullName}}">
    </li>
    <li class="list-group-item">
    <div class="form-group">
        <label for="exampleFormControlSelect2">Level</label>
        <select class="form-control" id="exampleFormControlSelect2" name="Level">
          <option value="1" @if($user->Level == 1) selected @endif> ADMIN</option>
          <option value="2" @if($user->Level == 2) selected @endif> Menmber</option>
        </select>
    </div>
    </li>
    <li class="list-group-item">Email :
    <input type="text" name="Email" id="{{$user->Email}}">
    </li>
    <li class="list-group-item">
         <a class="bnt bnt-warning bnt-sm" href="{{route('user.detail',[$user->ID])}}">Trở Lại</a>   ||
         <button type="submit" class="bnt bnt-success bnt-sm" > Lưu Lại </button>
        </li>
  </ul>

 </form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>