{{-- TODO Ancora da realizzare tutto, per ora solo testo placeholder --}}

<b><h6>ALCUNI LINK UTILI</h6></b>

<ul>
    <li class="mb-2">
        <a class="badge badge-pill badge-info" href="{{ url("/home") }}">Feed</a>
    </li>
    <li class="mb-2">
        <a class="badge badge-pill badge-info" href="/user/{{ urlencode(auth()->user()->username) }}">Il tuo profilo</a>
    </li>
    <li class="mb-2">
        <a class="badge badge-pill badge-info" href="{{ url("/top50") }}">Top tracks</a>
    </li>
    <li class="mb-2">
        <a class="badge badge-pill badge-info" href="{{ url("/track/upload") }}">Carica una traccia</a>
    </li>
    <li class="mb-2">
        <a class="badge badge-pill badge-info" href="{{ url("/modify") }}">Impostazioni</a>
    </li>
    <li class="mb-2">
        <a class="badge badge-pill badge-info" href="mailto:unison@altervista.org">Contattaci</a>
    </li>
    <li class="mb-2">
        <a class="badge badge-pill badge-info" href="{{ url("/") }}">Home page</a>
    </li>
    <li class="mb-2">
        <a class="badge badge-pill badge-danger" href="{{ route('logout') }}">Esci</a>
    </li>
</ul>
<h4>UNISON</h4>
<small>
    Ascoltare, condividire e scoprire nuova musica non è mai stato così facile.
    Immergiti nel mondo Unison e vivi un'esperienza unica.
</small>