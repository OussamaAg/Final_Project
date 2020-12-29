<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/navstyle.css')}}">
    <link rel="stylesheet" href="bootstrap.bundle.min.js / bootstrap.bundle.js ">
  </head>
  <div class="row header-container justify-content-center">
      <h1 class="title">Liste des engagements</h1>
  </div>
  <br>
  <br>
<div class="col-md-16 col-md-8">
    <form action="{{url('/searchFacture')}}" method="get">
      @csrf
      <div class="row input-group col-md-8 " >
        <input type="search" name="search" class="form-control" placeholder="Vous recherchez ...">
        <span class="input-group-prepend">
          <button class="btn btn-primary "  type="submit">Rechercher</button>
        </span>
      </div>
    </form>
    <br>
</div>
<form action="{{url('/listeFacture')}}">
  <span class="input-group-prepend">
    <button class="btn btn-success float-right "  type="submit">Imprimer</button>
  </span>
</form>
  <table class="table">
      <thead class="thead-light ">
        <tr>
          <th scope="col ">Rubrique  </th>
          <th scope="col ">Fournisseur  </th>
          <th scope="col">Numero de facture </th>
          <th scope="col ">Montant de facture </th>
          <th scope="col">Date d'emission  </th>
          <th scope="col">Date de reception  </th>
          <th scope="col">Date de paiement </th>
          <th scope="col">Operations </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($factures as $facture)
           <tr>
              
              <td style='text-align:center'>{{ $facture->rubrique->intitule}}</td>
              <td style='text-align:center'>{{ $facture->fournisseur->nom}}</td>
              <td style='text-align:center'>{{ $facture->num_facture}}</td>
              <td style='text-align:center'>{{ $facture->montant_facture}}</td>
              <td style='text-align:center'>{{$facture->date_emiss ?? '-'}}</td>
              <td style='text-align:center'>{{ $facture->date_recep ?? '-'}} </td>
              <td style='text-align:center'>{{ $facture->date_paie ?? '-'}}</td>
              <td>
                  <a href="{{url('/editFacture/'.$facture->id)}}" class="btn btn-sm btn-warning">Edit</a>
                  <a href="{{ url('/destroyFacture/'.$facture->id)}}" class="btn btn-sm btn-danger">Supp</a>
              </td>
              
        </tr>
          @endforeach
        
        
      </tbody>
      </tbody>
    </table>

    </html>
    
  