<nav class="navbar navbar-expand-md navbar-dark bg-secondary fixed-top navbarMinHeight">
    <a class="navbar-brand" href="/" title="Home page">
        <div class="navLogo container container-fluid h-100">
            &nbsp;
        </div>
    </a>
    <div class="d-flex flex-row order-0 order-md-3">
        <ul class="navbar-nav flex-row px-2 px-md-0 text-nowrap">
            @if(auth()->check())
                <li class="nav-item" title="Carica una traccia">
                    <a class="nav-link px-2" href="{{ route('upload') }}">
                        <span class="fas fa-cloud-upload-alt"></span>
                    </a>
                </li>
                <li class="nav-item" title="Impostazioni">
                    <a class="nav-link px-2" href="{{ route('modify') }}">
                        <span class="fas fa-cogs"></span>
                    </a>
                </li>
                <li class="nav-item" title="Il tuo profilo">
                    <a class="nav-link px-2" href="{{ asset("/user/" . auth()->user()->id) }}">
                        <span class="fas fa-user"></span>
                    </a>
                </li>
                <li class="nav-item" title="Esci">
                    <a class="nav-link px-2" href="{{ route('logout') }}">
                        <span class="d-none d-sm-inline">Esci</span>
                        <span class="fas fa-sign-out-alt"></span>
                    </a>
                </li>
            @else
                <li class="nav-item" title="Accedi">
                    <a class="nav-link px-2" href="{{ route('login') }}">
                        Accedi
                        <span class="fas fa-sign-in-alt"></span>
                    </a>
                </li>
            @endif
        </ul>
        <button class="navbar-toggler btn-outline-primary burgerFocus" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-nowrap">
            @if(!auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Iscriviti</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Feed</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('top50') }}">Top Tracks</a>
            </li>
        </ul>
        <div class="w-100 mx-0 mx-md-3">
            <form method="get" action="{{ route('search') }}">
                {{ csrf_field() }}

                <div class="input-group">
                    <select id="searchSelect" name="searchSelect" class="form-control center noOutline buttonWithoutShadow">
                        <option value="2"> Brani </option>
                        <option value="1" @if(isset($usersSelectedInNavbarForm) && $usersSelectedInNavbarForm) selected @endif> Utenti </option>
                    </select>

                    <input type="search" class="form-control" name="searchInput" placeholder="Cerca..." maxlength="128" required data-toggle="tooltip" data-trigger="focus" data-placement="bottom" data-html="true" title="<small>La stringa deve contenere almeno un carattere (sono ammessi solo simboli ASCII e lettere accentate).</small>">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default btn-primary btn-outline-light"><span class="fas fa-search"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>