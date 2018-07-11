@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Medical Records</title>
  </head>
  <body>
    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Pacient</th>
            <th>Societate</th>
            <th>Solicitat pentru</th>
            <th>Recomandari</th>
            <th>Considerat</th>
            <th colspan="2">Actiune</th>
          </tr>
        </thead>
        <tbody>
          @foreach($records as $record)
          <tr>
            <td>{{$record->id}}</td>
            <td>{{$record->patient['firstName']}} {{$record->patient['lastName']}}</td>
            <td>{{$record->company->nameCompany}}</td>
            <td>{{$record->type}}</td>
            <td>{{$record->recommendations}}</td>
            <td>{{$record->medicalOpinion}}</td>
            <td><a  class="btn btn-info" href="{{route('request.edit',$record->id)}}" >Editare</a></td>
            <td><a  class="btn btn-warning" href="{{route('view',$record->id)}}" >Vizualizare</a></td>
            <td>
               <form action="{{route('request.destroy',$record->id)}}"  method="post">
                {{ csrf_field() }}
                <button class="btn btn-danger" type="submit">Stergere</button>
              </form>
            </td>
          </tr>
          @endforeach
      </table>
      <a class="btn btn-success" href="{{route('newRequest')}}" >Creare Fisa</a>
    </div>


  </body>
</html>
@endsection
