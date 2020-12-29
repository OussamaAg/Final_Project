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
    @if($layout == 'index')
    <div class="container-fluid mt-4" >
        <div class="row">
            <section class="col">
                @include('rubriquelist')
            </section>
            <section class="col"></section>
        </div>
    </div>
          
    @elseif($layout=='create')    
        <div class="container-fluid mt-8">
            <div class="row justify-content-center">
                <section class="col-md-7">
                    <div class="row header-container justify-content-center">
                        <h1>Nouvelle rubrique </h1>
                    </div>
                    <form action="{{url('/store')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <label >Numero de rubrique : </label>
                          <input name="id_rubrique" type="text" class="form-control " placeholder="entrer l'id de la rubrique" >
                        </div>
                        @if ($errors->get('id_rubrique'))
                            @foreach ($errors->get('id_rubrique') as $message)
                                <li style="margin-left: 50px">{{$message}}</li><br>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <label >Intitulé de la rubrique : </label>
                            <input name="intitule" type="text" class="form-control" placeholder="entrer l'intitule de la rubrique" >
                        </div>
                          @if ($errors->get('intitule'))
                            @foreach ($errors->get('intitule') as $message)
                                <li style="margin-left: 50px">{{$message}}</li><br>
                            @endforeach
                        @endif
                          <div class="form-group">
                            <label >Montant : </label>
                            <input name="montant" type="text" class="form-control" placeholder="entrer le montant de la rubrique" >
                          </div>
                          @if ($errors->get('montant'))
                            @foreach ($errors->get('montant') as $message)
                                <li style="margin-left: 50px">{{$message}}</li><br>
                            @endforeach
                        @endif
                          <div class="form-group">
                            <label >Année : </label>
                            <input name="Annee" type="text" class="form-control" placeholder="entrer l'année de la rubrique" >
                          </div>
                          @if ($errors->get('Annee'))
                            @foreach ($errors->get('Annee') as $message)
                                <li style="margin-left: 50px">{{$message}}</li><br>
                            @endforeach
                        @endif
                          <input type="submit" class="btn btn-info" value="Enregistrer">  
                          <input type="reset" class="btn btn-warning" value="Réinitialiser">  
                      </form>
                </section>
                
            </div>
        </div>

    @elseif($layout == 'edit')   
        <div class="container-fluid mt-8">
            <div class="row justify-content-center">
                <section class="col-md-7">
                    <div class="row header-container justify-content-center">
                        <h1>Modifier une rubrique</h1>
                    </div>
                    <form action="{{url('/update/'.$rubrique->id_rubrique)}}" method="post" >
                        @csrf
                        <div class="form-group">
                          <label >Numero de rubrique : </label>
                          <input value="{{$rubrique->id_rubrique}}" name="id_rubrique" type="text" class="form-control" placeholder="entrer l'id de la rubrique" required>
                        </div>

                        <div class="form-group">
                            <label >Intitulé de la rubrique : </label>
                            <input value="{{$rubrique->intitule}}" name="intitule" type="text" class="form-control" placeholder="entrer l'intitule de la rubrique" required>
                        </div>

                        <div class="form-group">
                            <label >Montant : </label>
                            <input value="{{$rubrique->montant}}" name="montant" type="text" class="form-control" placeholder="entrer le montant de la rubrique" required>
                        </div>

                        <div class="form-group">
                            <label >Disponible : </label>
                            <input value="{{$rubrique->disponible}}" name="disponible" type="text" class="form-control" placeholder="entrer le montant disponible de la rubrique" required>
                        </div>

                        <div class="form-group">
                            <label >Année : </label>
                            <input value="{{$rubrique->Annee}}" name="Annee" type="text" class="form-control" placeholder="entrer l'année de la rubrique" required>
                        </div>
                          <input type="submit" class="btn btn-info" value="Enregistrer">  
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
        @elseif($layout=='search')
        <div class="container-fluid mt-4" >
            <div class="row">
                <section class="col">
                    @include('rubriquelist')
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