@extends('layouts.layout')
@section('content')
    <!--<h1 class="display-3 text-center ">Pagina di login</h1>-->
    <div class="jumbotron jumbotron-fluid text-center bgLogin">
        <div class="container text-light">
            <h1 class="display-4 boldText">Entra su Unison</h1>
            <div class="d-none d-md-block">
                <p class="lead">Connettiti con migliaia di persone<br>Scopri, ascolta e condividi i brani più di tendenza</p>
            </div>
        </div>
    </div>
    <div class="container h-100 mb-5">
        <div class="row h-100 justify-content-center">
            <!-- Aggiungere al div anche la classe "align-items-center" se si vuole che l'immagine sia centrata
            anche rispetto al verticale -->
            <div class="col-sm-9 order-last col-md-6 order-md-first text-center">
                <img src="./images/tape.png" alt="Non perdere altro tempo: iscriviti subito!" class="loginImage img-fluid mt-5 mt-md-0">
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="nav nav-tabs" id="tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="signInTab" data-toggle="tab" href="#signInContent" role="tab" aria-controls="signInContent" aria-selected="true">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="signUpTab" data-toggle="tab" href="#signUpContent" role="tab" aria-controls="signUpContent" aria-selected="false">Iscriviti</a>
                    </li>
                </ul>
                <div class="tab-content" id="tabContent">
                    <div class="tab-pane fade show active bg-white border-bottom border-left border-right" id="signInContent" role="tabpanel" aria-labelledby="signInTab">
                        <form class="p-5" action="/login" method="post" id="SI">
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" id="formSI">
                            <div class="invalid-feedback">
                                Nome utente o password non validi.
                            </div>
                            <div class="form-group">
                                <label for="usernameSI">Username o email:</label>
                                <input type="text" class="form-control" id="usernameSI" name="usernameSI" placeholder="Inserisci username o email...">
                                <div class="invalid-feedback">
                                    Per favore specifica uno username o un'e-mail valida.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passwordSI">Password:</label>
                                <input type="password" class="form-control" id="passwordSI" name="passwordSI" placeholder="Inserisci password...">
                                <div class="invalid-feedback">
                                    Per favore specifica una password valida.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mt-4" id="buttonSI">Accedi</button>
                        </form>
                    </div>
                    <div class="tab-pane fade bg-white border-bottom border-left border-right" id="signUpContent" role="tabpanel" aria-labelledby="signUpTab">
                        <form class="p-5" action="/registration" method="post" id="SU">
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" id="formSU">
                            <div class="invalid-feedback">
                                Username o e-mail già presente.
                            </div>
                            <div class="form-group">
                                <label for="emailSU">Email:</label>
                                <input type="email" class="form-control" id="emailSU" name="emailSU" placeholder="Inserisci email...">
                                <div class="invalid-feedback">
                                    Per favore specifica un'e-mail valida.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usernameSU">Username:</label>
                                <input type="text" class="form-control" id="usernameSU" name="usernameSU" placeholder="Inserisci username...">
                                <div class="invalid-feedback">
                                    Per favore specifica uno username valido: può contenere solamente lettere e/o numeri.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passwordSU">Password:</label>
                                <input type="password" class="form-control" id="passwordSU" name="passwordSU" placeholder="Inserisci password...">
                                <div class="invalid-feedback">
                                    Per favore specifica una password valida: deve contenere almeno 8 caratteri, di cui almeno una lettera minuscola, una maiuscola, un numero e un carattere speciale.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="repeatPasswordSU">Ripeti password:</label>
                                <input type="password" class="form-control" id="repeatPasswordSU" name="repeatPasswordSU" placeholder="Reinserisci password...">
                                <div class="invalid-feedback">
                                    Per favore reinserisci la stessa password.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mt-4" id="buttonSU">Registra nuovo account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_footer')
    <!-- Altri script nostri -->
    <script type="text/javascript" src="./js/signInCheck.js"></script>
    <script type="text/javascript" src="./js/signUpCheck.js"></script>
@endsection