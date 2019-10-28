
@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Amigos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('amigo.create') }}" class="btn btn-info" >Añadir Amigo</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Usuario</th>
               <th>Nuevo usuario a seguir</th>
               <th>Fecha de inicio amistad</th>
               
             </thead>
             <tbody>
              @if($amigos->count())  
              @foreach($amigos as $amigo)  
              <tr>
                <td>{{$amigo->usu_un_nick_name}}</td>
                <td>{{$amigo->un_nick_name}}</td>
                <td>{{$amigo->fecha_amistad}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('AmigoController@edit', $amigo->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('AmigoController@destroy', $amigo->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      {{ $amigos->links() }}
    </div>
  </div>
</section>
 
@endsection