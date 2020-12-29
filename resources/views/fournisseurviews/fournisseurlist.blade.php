<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/navstyle.css')}}">
    <link rel="stylesheet" href="bootstrap.bundle.min.js / bootstrap.bundle.js ">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <div class="row header-container justify-content-center">
    <h1 class="title">Liste des fournisseurs</h1>
</div>
<br>
<br>
<div class="col-md-16 col-md-8">
    <form action="{{url('/searchFournisseur')}}" method="get">
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
          <th scope="col">Nom de Fournisseur</th>
          <th scope="col ">Adresse</th>
          <th scope="col">Compte bancaire</th>
          <th scope="col">Telephone</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($fournisseurs as $fournisseur)
        <tr>
              
              <td style='text-align:center'>{{ $fournisseur->nom}}</td>
              <td style='text-align:center'>{{ $fournisseur->adresse}}</td>
              <td style='text-align:center'>{{ $fournisseur->compte_banc}}</td>
              <td style='text-align:center'>{{ $fournisseur->tel}}</td>
              <td>
                  <a href="{{url('/editFournisseur/'.$fournisseur->id)}}" class="btn btn-sm btn-warning">Modifier</a>
                  <a href="{{ url('/destroyFournisseur/'.$fournisseur->id)}}" class="btn btn-sm btn-danger">Supprimer</a>
                </td>
              
        </tr>
          @endforeach
        
        
      </tbody>
    </table>

    </html>
    
  