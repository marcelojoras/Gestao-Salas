<!DOCTYPE html>
<html>
 <head>
  <title>Simple Login System in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
    border:1px solid #ccc;
   }
   header{
    width: 100%;
    height: 80px;
    background: #000;
   }
   .welcome{
    color:#fff;
    padding-top:25px;
    width: 25%;
    float: left;
   }
  </style>
 </head>
 @if(isset(Auth::user()->email))
 <body>
  <header>
    <div class="col-md-6">
      <div class="welcome"><b>Bem vindo {{ Auth::user()->name }}</b></div>
      <div class="welcome"><b><a style="color: #fff" href="{{ url('/main/logout') }}">| Logout</a></b></div>
    </div>
    <div class="col-md-6">
      
    </div>
  </header>
  <br />
  <div class="container box">
   <h3 align="center">Alterar Sala "{{$sala->name}}"</h3><br>
   <form method="post" action="{{ url('/main/alteraSalaBanco') }}">
    {{ csrf_field() }}
    <div class="col-md-6">              
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" 
               class="form-control" value="{{$sala->name}}" 
               required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="description">Localização</label>
        <input type="text" name="localization" 
               class="form-control" value="{{$sala->localization}}"
               required>
      </div>
    </div>
    <input type="hidden" name="id" value="{{$sala->id}}">
    <br>
    <div class="form-group">
     <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar">
    </div>
   </form>
  </div>
 </body>
 @else
 <script>window.location = "/main";</script>
 @endif
</html>