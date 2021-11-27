<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    {{--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="assets/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- icones -->
    <script src="https://kit.fontawesome.com/aec0f859a6.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="/js/datatables.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;500;700&display=swap" rel="stylesheet">

    <title>Login - PhotoShoot</title>
</head>
<body>
<section class="section section__login">
    <div class="login">
        {{--<div class="login__logo is-center">
            <img src="/assets/icones/logo_photoshoot_mobile--blanc.svg" alt="PhotoShoot"/>
        </div>--}}
        <div class="login__form">
            <form class="form form__login" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <x-input class="input" id="email" type="email" name="email" id="formGroupExampleInput" placeholder="Adresse E-mail" required autofocus/>
                        <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                        </span>
                    </p>
                    @error('email')
                    <p class="has-text-red">{{$message}}</p>
                    @enderror
                </div>
                <div class="field">
                    <p class="control has-icons-left">
                        <x-input id="password" class="input" id="formGroupExampleInput2" type="password" name="password"
                                 placeholder="Mot de passe" required autocomplete="current-password"/>
                        <span class="icon is-small is-left">
                          <i class="fas fa-lock"></i>
                        </span>
                    </p>
                    @error('password')
                    <p class="has-text-red">{{$message}}</p>
                    @enderror
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
            @endif
            <!--  {{--<x-button class="ml-3 btn-lg">
                    {{ __('Login') }}
                </x-button>--}} -->
                <button type="submit" class="button button__login is-dark is-fullwidth">Se connecter</button>
            </form>
        </div>
    </div>
</section>
</body>
</html>

