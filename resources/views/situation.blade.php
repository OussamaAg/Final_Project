<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="bootstrap.bundle.min.js / bootstrap.bundle.js ">
  </head>
  @include('navbar')
  <br>
  <br>
  <br>
  <div class="row header-container justify-content-center">
      <h1>Situation</h1><br>
  </div>
  <br>
  <br>
  <table class="table">
      <thead class="thead-light ">
        <tr>
          <th scope="col">Identifiant rubrique</th>
          <th scope="col ">Intitule</th>
          <th scope="col">Montant</th>
          <th scope="col">Frais engagés en emission</th>
          <th scope="col">Frais engagés en reception</th>
          <th scope="col">Frais engagés en paiement</th>
          <th scope="col">Disponible</th>

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
              <td>
              
              </td>
        </tr>
          @endforeach
        
        
      </tbody>
    </table>

    </html>