@extends('layouts.layout')

@section('title')
    Upload track
@endsection

@section('content')
    <!-- Finestra modale che si attiva nel caso in cui al termine dell'upload, i dati relativi alla
         canzone inserita vengano trovati su Spotify -->
    <div class="modal fade" id="spotifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dati Spotify</h5>
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                </div>
                <div class="modal-body">
                    I dati della canzone che stai caricando corrispondono a quelli di una canzone su Spotify:
                    <ul>
                        <li id="canzoneModale"></li>
                        <li id="artistaModale"></li>
                        <li id="albumModale"></li>
                    </ul>
                    Desideri collegare la tua canzone a quella di spotify?<br>
                    <small>
                        Questo consentirà agli utenti di Unison di visualizzare ancora<br>
                        più informazioni riguardo alla tua musica!
                    </small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="annullaModal">Non collegare</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="collegaModal">Collega</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Termine della finestra modale -->

    <div class="jumbotron jumbotron-fluid text-center bgLogin mt-5">
        <div class="container text-light">
            <h1 class="d-none d-md-inline display-4 boldText">Fai sentire al mondo la tua musica</h1>
            <h1 class="d-inline d-md-none boldText">Fai sentire al mondo la tua musica</h1>
            <div class="d-none d-md-block">
                <p class="lead">Carica le tue produzioni e diventa un artista di successo</p>
            </div>
        </div>
    </div>
    <div class="container h-100 mb-5">
        <div class="row h-100 justify-content-center">
            <!-- Aggiungere al div anche la classe "align-items-center" se si vuole che l'immagine sia centrata
            anche rispetto al verticale -->
            <div class="col-9 order-last col-md-6 order-md-first text-center">
                <img src="{{asset('images/upload.png')}}" alt="Carica una nuova traccia" class="img-fluid mt-5 mt-md-0">
            </div>
            <div class="col-12 col-md-6">
                <form action="{{ url('track') }}" method="post" id="upload" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="trackSelect">Canzone:</label>
                        <div class="custom-file">
                            <!-- ID dell'utente -->
                            <input type="hidden" name="userID" id="userID" value="{{ $userID }}">
                            <!-- Input type hidden che uso per recuperare l'informazione circa la massima dimensione del file che può essere caricato -->
                            <input type="hidden" name="maxFileSize" id="maxFileSize" value="{{ $maxFileSize }}">
                            <!-- Input che uso per salvare la durata della canzone caricata -->
                            <input type="hidden" name="duration" id="duration" value="">
                            <!-- Elemento che uso per recuperare la durata della canzone -->
                            <audio id="audio"></audio>
                            <input type="file" accept=".mp3, .m4a" class="custom-file-input" id="trackSelect" name="trackSelect">
                            <label class="custom-file-label modal-open fileLabelHeightReset" for="trackSelect">Scegli file...</label>
                            <div class="invalid-feedback">
                                Per favore seleziona un file valido [.mp3, m4a] (dimensione massima consentita: {{ $maxFileSize }}).
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photoSelect">Immagine:</label>
                        <div class="custom-file">
                            <input type="file" accept=".jpeg, .jpg, .png" class="custom-file-input" id="photoSelect" name="photoSelect">
                            <label class="custom-file-label modal-open fileLabelHeightReset" for="photoSelect">Scegli file...</label>
                            <div class="invalid-feedback">
                                Per favore seleziona un file valido [.jpeg, .jpg, .png] (l'immagine di copertina deve essere quadrata e almeno 150x150).
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">Titolo:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci titolo...">
                        <div class="invalid-feedback">
                            Per favore specifica un titolo valido (lunghezza massima consentita 64 caratteri, solo caratteri ASCII stampabili e lettere accentate).
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="author">Autore:</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $username }}" disabled>
                        <div class="invalid-feedback">
                            Per favore specifica un nome di autore valido (lunghezza massima consentita 64 caratteri, solo caratteri ASCII stampabili e lettere accentate).
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrizione:</label>
                        <textarea class="form-control unresizable" id="description" name="description" placeholder="Inserisci una descrizione..."></textarea>
                        <div class="invalid-feedback">
                            Per favore specifica una descrizione valida (lunghezza massima consentita 200 caratteri, solo caratteri ASCII stampabili e lettere accentate).
                        </div>
                    </div>

                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" value="on" id="allowDownload" name="allowDownload">
                        <label class="form-check-label" for="allowDownload">
                            Consenti il download della traccia
                        </label>
                    </div>

                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" value="on" id="private" name="private">
                        <label class="form-check-label" for="private">
                            Traccia privata
                        </label>
                    </div>

                    <!-- input hidden usato per trasmettere lo spotify ID al server -->
                    <input type="hidden" id="spotifyID" name="spotifyID">

                    <input type="hidden" class="form-control" id="formUpload">
                    <div class="invalid-feedback">
                        Hai già caricato una canzone con quel titolo.
                    </div>

                    <button type="submit" class="btn btn-block btn-primary mt-4" id="buttonUpload">Carica</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script_footer')
    <script type="text/javascript" src="{{ asset('js/uploadCheck.js') }}"></script>
@endsection