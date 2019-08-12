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
    @if (session('sala_criada'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" 
           data-dismiss="alert"
           aria-label="close">&times;</a>
        {{ session('sala_criada') }}
    </div>
    @endif
   <h3 align="center">Cadastrar Sala</h3><br />
   <form method="post" action="{{ url('/main/createSala') }}">
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
        <label for="description">Localização</label>
        <input type="text" name="localization" 
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
  <br>
  <br>
  <div class="container box">
    <h3 align="center">Listagem de salas ({{$total}})</h3><br>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Localização</th>
            <th>Reservada</th>
            <th></th> 
            <th></th>    
          </tr>
        </thead>
        <tbody>
           @foreach($salas as $sala)  
              <tr>
                <td>{{$sala->id}}</td>
                <td>{{$sala->name}}</td>
                <td>{{$sala->localization}}</td>
                <td>
                  @if($sala->is_reserved == 'false')
                    Não
                  @else
                    Sim
                  @endif
                </td>
                <td>
                  <form style="display: inline-block;" method="POST" action="{{ url('/main/deleteSala') }}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$sala->id}}">                          
                    <input type="submit" name="deletar" class="btn btn-primary" value="Deletar">
                  </form>
                </td>
                <td>
                  <form style="display: inline-block;" method="POST" action="{{ url('/main/alteraSala') }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$sala->id}}">                          
                    <input type="submit" name="alterar" class="btn btn-primary" value="Alterar">
                  </form>
                </td>
              </tr>
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
 </body>
 @else
 <script>window.location = "/main";</script>
 @endif
</html>