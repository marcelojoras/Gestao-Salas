<!DOCTYPE html>
<html>
 <head>
  <title>Sistema de gestão</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Login</h3><br />

   @if(isset(Auth::user()->email))
    <script>window.location="/main/dashboard";</script>
   @endif

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

   @if (session('user_criado'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" 
           data-dismiss="alert"
           aria-label="close">&times;</a>
        {{ session('user_criado') }}
    </div>
   @endif

   <form method="post" action="{{ url('/main/checklogin') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <label>Email</label>
     <input type="email" name="email" class="form-control" />
    </div>
    <div class="form-group">
     <label>Senha</label>
     <input type="password" name="password" class="form-control" />
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Login" />
    </div>
   </form>
  </div>
  <br>
  <br>
  <div class="container box">
   <h3 align="center">Cadastro</h3><br />

   <form method="post" action="{{ url('/main/createUser') }}">
    {{ csrf_field() }}
    <div class="col-md-6">              
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" 
               class="form-control" 
               required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="description">E-mail</label>
        <input type="email" name="email" 
               class="form-control" 
               required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="quantity">Senha</label>
        <input type="password" name="password" 
               class="form-control" 
               required>
      </div>    
    </div>
    <br>
    <div class="form-group">
     <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
    </div>
   </form>
  </div>
 </body>
</html>