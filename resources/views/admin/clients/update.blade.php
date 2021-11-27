@extends('_layoutAdmin')


@section('title') Modifier un client @endsection

@section('title-page') Modifier un client @endsection

@section('content')
    <!-- contenu  -->

    <section class="section section__form">
        <div class="container">
            <form class="form" action="{{ route('updateClient', $client->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="notification is-white">
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="first_name" class="label">Nom *</label>
                                <div class="control">
                                    <input id="first_name" name="first_name" class="input" type="text" value="{{ old('first_name') ?? $client->first_name }}">
                                    @error('first_name')
                                    <p class="is-size-6 has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="last_name" class="label">Prénom *</label>
                                <div class="control">
                                    <input id="last_name" name="last_name" class="input" type="text" value="{{ old('last_name') ?? $client->last_name }}">
                                    @error('last_name')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="field">
                                <label class="label">Prénom</label>
                                <p class="control is-expanded has-icons-left has-icons-right">
                                    <input class="input is-success" type="email" placeholder="Email" value="alex@smith.com">
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-envelope"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                      <i class="fas fa-check"></i>
                                    </span>
                                </p>
                            </div>--}}
                        </div>
                    </div>

                    <div class="field is-horizontal">

                        <div class="field-body">

                            <div class="field">
                                <label for="phone" class="label">Téléphone *</label>
                                <div class="control">
                                    <input id="phone" name="phone" class="input" type="text" value="{{ old('phone') ?? $client->phone }}">
                                    @error('phone')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="email" class="label">E-mail *</label>
                                <div class="control">
                                    <input id="email" name="email" class="input" type="text" value="{{ old('email') ?? $client->email }}">
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
                                        <select id="type" name="type">
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
                                    <input id="adress" name="adress" class="input" type="text" value="{{ old('adress') ?? $client->adress }}">
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
                                    <input name="zipcode" class="input" type="text" value="{{ old('zipcode') ?? $client->zipcode }}">
                                    @error('zipcode')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="city" class="input" type="text" value="{{ old('city') ?? $client->city }}">
                                    @error('city')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="country" class="input" type="text" value="{{ old('county') ?? $client->country }}">
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
                                    <input id="login" name="login" class="input" type="text" value="{{ old('login') ?? $client->login }}">
                                    @error('login')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="password" class="label">Créer un nouveau mot de passe</label>
                                <div class="control">
                                    <input id="password" name="password" class="input input__password" type="text" placeholder="Créer un nouveau mot de passe">
                                    <button class="button button__password is-light"><i class="fas fa-cog mr-2"></i>
                                        Générer
                                    </button>
                                    <button class="button button__copy is-light"><i class="fas fa-copy mr-2"></i> Copier
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label">
                        <a href="/clients" class="button is-danger is-outlined">Annuler</a>
                    </div>
                    <button class="button button--black" type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        "use strict";
        @if($client->type)
        document.getElementById("type").value = '{{$client->type}}';
        @endif
        @if($client->sexe)
        document.getElementById("sexe").value = '{{$client->sexe}}';
        @endif

        let btnPassword = document.querySelector('.button__password');
        let btnCopyPassword = document.querySelector('.button__copy');
        let inputPassword = document.querySelector('.input__password');

        btnPassword.addEventListener('click', (e) => {
            e.preventDefault();
            let randomstring = Math.random().toString(36).slice(-8);
            inputPassword.value = randomstring;
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
