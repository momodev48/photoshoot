@extends('_layoutClient')
@section('title') Mon profil @endsection
@section('hero')
    <section class="hero hero--profil mb-6">
        <div class="hero-body has-text-centered">
            <p class="title is-capitalized has-text-white is-center is-family-secondary">
                Mon profil
            </p>
            {{--<p class="subtitle">
                Primary subtitle
            </p>--}}
        </div>
    </section>
@endsection

@if($message = Session::get('success'))
    <div id="notificationSuccess" class="notification notification__success has-text-centered is-primary">
        {{ $message }}
    </div>
@endif

@section('content')
    <!-- contenu  -->
    <section class="section section__profil">
        {{--<div class="columns">
            <div class="column mb-5 is-8-desktop is-offset-1-desktop is-6-widescreen is-offset-2-widescreen">
                <span class="title title--uppercase is-size-4 is-size-3-desktop has-text-blue">Mon Profil</span>
            </div>
        </div>--}}
        <div class="columns is-block-touch">
            <div class="column is-9-desktop is-6-widescreen is-offset-2-widescreen ">
                <div class="container">
                    <form class="form" action="{{ route('updateProfil', $user->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="box">
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <label for="first_name" class="label">Nom *</label>
                                        <div class="control">
                                            <input id="first_name" name="first_name" class="input" type="text" value="{{ $user['first_name'] }}">
                                            @error('first_name')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="last_name" class="label">Prénom *</label>
                                        <div class="control">
                                            <input id="last_name" name="last_name" class="input" type="text" value="{{ $user['last_name'] }}">
                                            @error('last_name')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">

                                <div class="field-body is-half">

                                    <div class="field">
                                        <label for="phone" class="label">Téléphone *</label>
                                        <div class="control">
                                            <input id="phone" name="phone" class="input" type="text" value="{{ $user['phone'] }}">
                                            @error('phone')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="email" class="label">E-mail *</label>
                                        <div class="control">
                                            <input id="email" name="email" class="input" type="text" value="{{ $user['email'] }}">
                                            @error('email')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="field is-horizontal">

                                <div class="field-body is-half">

                                    <div class="field">
                                        <label for="type" class="label">Type *</label>
                                        <div class="control">
                                            <div class="select is-fullwidth">
                                                <select name="type" id="type">
                                                    <option value="Particulier">Particulier</option>
                                                    <option value="Professionnel">Professionnel</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="sexe" class="label">Sexe *</label>
                                        <div class="control">
                                            <div class="select is-fullwidth">
                                                <select name="sexe" id="sexe">
                                                    <option value="Homme">Homme</option>
                                                    <option value="Femme">Femme</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="field is-horizontal">

                                <div class="field-body">

                                    <div class="field">
                                        <label for="adress" class="label">Adresse *</label>
                                        <div class="control">
                                            <input id="adress" name="adress" class="input" type="text" value="{{ $user['adress'] }}">
                                            @error('adress')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input name="zipcode" class="input" type="text" value="{{ $user['zipcode'] }}">
                                            @error('zipcode')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <input name="city" class="input" type="text" value="{{ $user['city'] }}">
                                            @error('city')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <input name="country" class="input" type="text"
                                                   value="{{ $user['country'] }}">
                                            @error('country')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body is-half">
                                    <div class="field">
                                        <label for="login" class="label">Login</label>
                                        <div class="control">
                                            <input id="login" name="login" class="input" type="text" value="{{ $user['login'] }}">
                                            @error('login')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="password" class="label">Mot de passe</label>
                                        <div class="control">
                                            <input id="password" name="password" class="input input__password" type="text" placeholder="Mot de passe">
                                            @error('password')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                            <button class="button button__password is-light">
                                                <i class="fas fa-cog mr-2"></i>
                                                <span>Générer</span>
                                            </button>
                                            <button class="button button__copy is-light">
                                                <i class="fas fa-copy mr-2"></i>
                                                <span>Copier</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal is-flex-desktop mt-6">
                                <div class="field-label">
                                    <a href="{{ route('client') }}"
                                       class="button is-danger is-outlined is-fullwidth-touch">Annuler</a>
                                </div>
                                <button class="button button--black is-fullwidth-touch" type="submit">Modifier</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="column is-3-desktop is-2-widescreen ">
                <a href="{{ route('client') }}">
                    <div class="card mt-0 pt-0 hvr-shadow">
                        <div class="card-content">
                            <div class="content">
                                <img class="icon icon--medium" src="http://mohammedmoussaoui.be/projets/tfe/assets/icones/en_attente.svg" alt="En attente">
                                <span
                                    class="is-size-6-mobile is-size-5-tablet is-size-6-desktop has-text-blue">Espace client</span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('galeriesclient') }}">
                    <div class="card hvr-shadow">
                        <div class="card-content">
                            <div class="content">
                                <img class="icon icon--medium" src="http://mohammedmoussaoui.be/projets/tfe/assets/icones/pictures.svg" alt="Profil">
                                <span
                                    class="is-size-6-mobile is-size-5-tablet is-size-6-desktop has-text-blue">Mes galeries</span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card hvr-shadow">
                        <div class="card-content">
                            <div class="content">
                                <img class="icon icon--medium" src="http://mohammedmoussaoui.be/projets/tfe/assets/icones/profil.svg" alt="Profil">
                                <span class="is-size-6-mobile is-size-5-tablet is-size-6-desktop has-text-blue">Contactez-nous</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        "use strict";
        @if($user['type'])
        document.getElementById("type").value = '{{$user['type']}}';
        @endif
        @if($user['sexe'])
        document.getElementById("sexe").value = '{{$user['sexe']}}';
        @endif

        let btnPassword = document.querySelector('.button__password');
        let btnCopyPassword = document.querySelector('.button__copy');
        let inputPassword = document.querySelector('.input__password');
        btnPassword.addEventListener('click', (e) => {
            e.preventDefault();
            let randomstring = Math.random().toString(36).slice(-8);
            inputPassword.value = randomstring;
            //alert(randomstring);
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        btnCopyPassword.addEventListener('click', (e) => {
            e.preventDefault();
            if (inputPassword.value !== null && inputPassword.value !== '') {
                inputPassword.select();
                inputPassword.setSelectionRange(0, 99999);
                document.execCommand("copy");

                Toast.fire({
                    icon: 'success',
                    title: 'Mot de passe copié !'
                })
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Mot de passe vide'
                })
            }
        });

    </script>
@endsection

