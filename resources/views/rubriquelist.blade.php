<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="bootstrap.bundle.min.js / bootstrap.bundle.js ">
  </head>
  <body>
    @include('navbar')
    <br>
    <br>
    <br>
    <div class="row header-container justify-content-center">
        <h1>Ensemble des rubriques</h1><br>
    </div>
    <br>
    <br>
  <div class="col-md-16 col-md-8">
      <form action="{{url('/search')}}" method="get">
        @csrf
          <div class="row input-group col-md-7 " >
          <input type="search" name="search" class="form-control" placeholder="Vous recherchez ...">
          <span class="input-group-prepend">
            <button class="btn btn-primary "  type="submit">Rechercher</button>
          </span>
        </div>
    
      </form>
    
    </div>
    <table class="table">
        <thead class="thead-light ">
          <tr>
            <th scope="col">Identifiant rubrique</th>
            <th scope="col ">Intitule</th>
            <th scope="col">Montant</th>
            <th scope="col">Disponible</th>
            <th scope="col">Annee</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rubriques as $rubrique)
             <tr>
                
                <td style='text-align:center'>{{ $rubrique->id_rubrique}}</td>
                <td style='text-align:center'>{{ $rubrique->intitule}}</td>
                <td style='text-align:center'>{{ $rubrique->montant}}</td>
                <td style='text-align:center'>{{ $rubrique->disponible}}</td>
                <td style='text-align:center'>{{ $rubrique->Annee}}</td>
                <td>
                  <a href="{{url('/edit/'.$rubrique->id_rubrique)}}" class="btn btn-sm btn-warning">Modifier</a>
                  <a href="{{url('/destroy/'.$rubrique->id_rubrique)}}" class="btn btn-sm btn-danger">Supprimer</a>
                </td>
          </tr>
            @endforeach
          
          
        </tbody>
      </table>
      <footer></footer>
  </body>
 

    </html>
    
  