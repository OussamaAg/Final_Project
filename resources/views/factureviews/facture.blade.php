<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/navstyle.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Chambre de commerce (Dep.F)</title>
  </head>
  <body>
    @include('navbar')
    <br>
    <br>
    <br>
    <br>
    @if ($layout=='indexFacture')
    <div class="container-fluid mt-4" >
        <div class="row">
            <section class="col">
                    @include('factureviews/facturelist')
                </section>
            </div>
        </div>
    @elseif($layout=='createFacture')
        <div class="container-fluid mt-8">
            <div class="row justify-content-center">
                <section class="col-md-7">
                    <div class="row header-container justify-content-center">
                        <h1>Nouveau Engagement</h1>
                    </div>
                    <form action="{{url('/storeFacture')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label >Selectionner la rubrique: </label>
                            <select name="id_rub" id="cars" class="form-control">
                                @foreach ($intitule as $item)
                                    <option value="{{$item->id_rubrique}}">{{$item->intitule}}</option>
                                @endforeach
                            </select>
                       </div>
                        <div class="form-group">
                          <label >Numero de facture: </label>
                          <input name="num_facture" type="text" class="form-control" placeholder="entrer le numero de facture">
                        </div>
                        <div class="form-group">
                            <label >Montant : </label>
                            <input name="montant_facture" type="text" class="form-control" placeholder="entrer le montant de la facture">
                          </div>
                        <div class="form-group">
                            <label >Nom de fournisseur :  </label>
                            <select name="id_four" id="" class="form-control">
                                @foreach ($nom as $item)
                                    <option value="{{$item->id}}">{{$item->nom}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Date d'emission : </label>
                            <input name="date_emiss" type="date" class="form-control" placeholder="la date d'emission de la facture ">
                        </div>

                        <div class="form-group">
                            <label >Date de reception : </label>
                            <input name="date_recep" type="date" class="form-control" placeholder="la date de réception de la facture ">
                        </div>

                        <div class="form-group">
                            <label >Date de paiement : </label>
                            <input name="date_paie" type="date" class="form-control" placeholder="la date de paiement de la facture ">
                        </div>
                        
                          <input type="submit" class="btn btn-info" value="Enregistrer">  
                          <input type="reset" class="btn btn-warning" value="Réinitialiser">  
                      </form>
                </section>
                
            </div>
        </div>

    {{-- @elseif($layout=='show')
        <div class="container-fluid mt-" >
            <div class="row">
                <section class="col">
                    @include('rubriquelist')
                </section>
                <section class="col"></section>
            </div>
        </div> --}}

    @elseif($layout== 'editFacture')
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-7"">
                    <form action="{{ url('/updateFacture/'.$facture->id) }}" method="get">
                        @csrf
                        <div class="form-group">
                            <label >Selectionner la rubrique: </label>
                            <select name="id_rub" id="" class="form-control" >
                                @foreach ($intitule as $item)
                                    <option value="{{$item->id_rubrique}}">{{$item->intitule}}</option>
                                @endforeach
                            </select>
                       </div>
                        <div class="form-group">
                          <label >Numero de facture: </label>
                        <input value="{{ $facture->num_facture}}" name="num_facture" type="text" class="form-control" placeholder="entrer le numero de facture" >
                        </div>
                        <div class="form-group">
                            <label >Montant : </label>
                            <input  value="{{ $facture->montant_facture}}" name="montant_facture" type="text" class="form-control" placeholder="entrer le montant de la facture" >
                          </div>
                        <div class="form-group">
                            <label >Nom de fournisseur :  </label>
                            <select name="id_four" id="" class="form-control" disabled>
                                @foreach ($nom as $item)
                                    <option value="{{$item->id}}">{{$item->nom}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Date d'emission : </label>
                            <input value="{{ $facture->date_emiss}}"  name="date_emiss" type="date" class="form-control" placeholder="la date d'emission de la facture ">
                        </div>

                        <div class="form-group">
                            <label >Date de reception : </label>
                            <input value="{{ $facture->date_recep}}" name="date_recep" type="date" class="form-control" placeholder="la date de réception de la facture ">
                        </div>

                        <div class="form-group">
                            <label >Date de paiement : </label>
                            <input value="{{ $facture->date_paie}}" name="date_paie" type="date" class="form-control" placeholder="la date de paiement de la facture ">
                        </div>
                          <input type="submit" class="btn btn-info" value="Modifier">  
                          <input type="reset" class="btn btn-warning" value="Réinitialiser">  
                      </form>
                </section>
            </div>
        </div>
        @elseif($layout=='destroy')
         <div class="container-fluid mt-4" >
            <div class="row">
                <section class="col">
                    @include('rubriquelist')
                </section>
                <section class="col"></section>
            </div>
        </div>
        @elseif($layout=='searchFacture')
            <div class="container-fluid mt-4" >
            <div class="row">
                <section class="col">
                    @include('factureviews/facturelist')
                </section>
                <section class="col"></section>
            </div>
        </div>

    @endif
    <footer></footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>