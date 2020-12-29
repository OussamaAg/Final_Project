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
    @if ($layout=='indexFournisseur')
    <div class="container-fluid mt-4" >
        <div class="row">
            <section class="col">
                    @include('fournisseurviews/fournisseurlist')
                </section>
            </div>
        </div>
    @elseif($layout=='createFournisseur')
        <div class="container-fluid mt-8">
            <div class="row justify-content-center">
                <section class="col-md-7">
                    <div class="row header-container justify-content-center">
                        <h1>Ajouter Fournisseur</h1>
                    </div>
                    <form action="{{url('/storeFournisseur')}}" method="post">
                        @csrf
                          <div class="form-group">
                            <label >Nom de fournisseur : </label>
                            <input name="nom_fournisseur" type="text" class="form-control" placeholder="Entrer le nom de fournisseur">
                          </div>
                          @if ($errors->get('nom_fournisseur'))
                            @foreach ($errors->get('nom_fournisseur') as $message)
                                <li style="margin-left: 100px ">{{$message}}</li><br>
                            @endforeach
                          @endif
                           <div class="form-group">
                            <label >Adresse: </label>
                            <input name="adresse_fournisseur" type="text" class="form-control" placeholder="entrer l'adresse de fournisseur">
                           </div>
                          @if ($errors->get('adresse_fournisseur'))
                            @foreach ($errors->get('adresse_fournisseur') as $message)
                                <li style="margin-left: 50px">{{$message}}</li><br>
                            @endforeach
                          @endif
                           <div class="form-group">
                            <label >Compte Bancaire :  </label>
                            <input name="compte_bancaire" type="text" class="form-control" placeholder="entrer le compte bancaire de fournisseur">
                           </div>
                          @if ($errors->get('compte_bancaire'))
                          @foreach ($errors->get('compte_bancaire') as $message)
                              <li style="margin-left: 50px">{{$message}}</li><br>
                          @endforeach
                      @endif
                          <div class="form-group">
                            <label >Telephone : </label>
                            <input name="telephone" type="text" class="form-control" placeholder="entrer le telephone de fournisseur">
                          </div>
                          @if ($errors->get('telephone'))
                          @foreach ($errors->get('telephone') as $message)
                              <li style="margin-left: 50px">{{$message}}</li><br>
                          @endforeach
                      @endif
                          <input type="submit" class="btn btn-info" value="Enregistrer">  
                          <input type="reset" class="btn btn-warning" value="Réinitialiser">  
                      </form>
                </section>
                
            </div>
        </div>

    @elseif($layout=='showFournisseur')
        <div class="container-fluid mt-" >
            <div class="row">
                <section class="col">
                    @include('fournisseurviews/fournisseurlist')
                </section>
                <section class="col"></section>
            </div>
        </div>
    @elseif($layout== 'editFournisseur')
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-7"">
                    <div class="row header-container justify-content-center">
                        <h1>Modifier Fournisseur</h1>
                    </div>
                    <form action="{{ url('/updateFournisseur/'.$fournisseur->id) }}" method="get">
                        @csrf
                        <div class="form-group">
                            <label >Nom de fournisseur : </label>
                        <input value="{{ $fournisseur->nom}}" name="nom" type="text" class="form-control" placeholder="Entrer le nom de fournisseur">
                        </div>
                          
                        <div class="form-group">
                              <label >Adresse: </label>
                              <input value="{{ $fournisseur->adresse}}" name="adresse" type="text" class="form-control" placeholder="entrer l'adresse de fournisseur">
                        </div>
                            
                        <div class="form-group">
                              <label >Compte Bancaire :  </label>
                              <input  value="{{ $fournisseur->compte_banc}}" name="compte_banc" type="text" class="form-control" placeholder="entrer le compte bancaire de fournisseur">
                        </div>
                           
                        <div class="form-group">
                              <label >Telephone : </label>
                              <input value="{{ $fournisseur->tel}}" name="tel" type="text" class="form-control" placeholder="entrer le telephone de fournisseur">
                        </div>
                          <input type="submit" class="btn btn-info" value="Modifier">  
                          <input type="reset" class="btn btn-warning" value="Réinitialiser">  
                      </form>
                </section>
            </div>
        </div>
     @elseif($layout=='destroyFournisseur')
         <div class="container-fluid mt-4" >
            <div class="row">
                <section class="col">
                    @include('fournisseurviews/fournisseurlist')
                </section>
                <section class="col"></section>
            </div>
        </div>
        @elseif($layout=='searchFournisseur')
        <div class="container-fluid mt-4" >
            <div class="row">
                <section class="col">
                    @include('fournisseurviews/searchfournisseur')
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