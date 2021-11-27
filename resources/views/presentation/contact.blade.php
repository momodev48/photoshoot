@extends('_layoutPresentation')
@section('title') Services @endsection

@section('content')
    <!-- contenu  -->
    @if($message = Session::get('success'))
        <div id="notificationSuccess" class="notification notification__success has-text-centered is-primary">
            {{ $message }}
        </div>
    @endif

    <section class="section section__rendezvous">
        <div class="columns">
            <div class="column">
                <h3 class="title font-weight-bolder is-size-3 is-size-2-desktop is-uppercase is-center my-6 is-family-secondary">Contact</h3>
            </div>
        </div>
        <div class="columns">
            <div class="column is-8 pt-0">
                <div class="container">
                    <form class="rendezvous" action="{{ route('contactForm') }}" method="post">
                        @csrf
                        <div class="notification is-white">
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <label for="first_name" class="label">Nom *</label>
                                        <div class="control">
                                            <input id="first_name" name="first_name" class="input" type="text" placeholder="Smith, Wilson&hellip;" value="{{ old('first_name') }}">
                                            @error('first_name')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <label for="last_name" class="label">Prénom *</label>
                                        <div class="control">
                                            <input id="last_name" name="last_name" class="input" type="text" placeholder="Alex, Khalil&hellip;" value="{{ old('last_name') }}">
                                            @error('last_name')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <label for="phone" class="label">Téléphone *</label>
                                        <div class="control">
                                            <input id="phone" name="phone" class="input" type="text" placeholder="+32xxxxxxxxx" value="{{ old('phone') }}">
                                            @error('phone')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <label for="email" class="label">E-mail *</label>
                                        <div class="control">
                                            <input id="email" name="email" class="input" type="text" placeholder="exemple@mail.com" value="{{ old('email') }}">
                                            @error('email')
                                            <p class="has-text-red">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <label for="desc" class="label">Commentaire</label>
                                        <div class="control">
                                            <textarea id="desc" rows="3" class="textarea" placeholder="Commentaire, service souhaité&hellip;" name="commentaire">{{ old('commentaire') }}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="field is-grouped is-grouped-right mt-5">
                                <p class="control">
                                    <button class="button button--black font-weight-bold" type="submit">Envoyer</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column is-4 pt-0">
                <div class="container">
                    <div class="notification is-white">
                        <div>
                            <h4 class="is-size-5 is-uppercase mb-3 has-text-weight-bold has-text-blue">Informations de contact</h4>
                            <ul class="liste liste__infocontact">
                                <li class="liste__infocontact-el">
                                    <span class="icon-text">
                                        <span class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </span>
                                        <a href="tel:081247030" class="is-size-6">
                                        081 24 70 30
                                        </a>
                                    </span>
                                </li>
                                <li class="liste__infocontact-el">
                                    <span class="icon-text">
                                        <span class="icon">
                                            <i class="fas fa-at"></i>
                                        </span>
                                        <a href="mailto:info@photoshoot.be" class="is-size-6">
                                        info@photoshoot.be
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-5">
                            <h4 class="is-size-5 is-uppercase mb-3 has-text-weight-bold has-text-blue">Heures d'ouvertures</h4>
                            <ul class="liste liste__infocontact">
                                <li class="liste__infocontact-el">
                                    <p>Du Lundi au Vendredi :</p>
                                    <span class="icon-text">
                                        <span class="icon">
                                            <i class="far fa-clock"></i>
                                        </span>
                                        <span>9h - 17h</span>
                                    </span>
                                </li>
                                <li class="liste__infocontact-el">
                                    <p>Samedi :</p>
                                    <span class="icon-text">
                                        <span class="icon">
                                            <i class="far fa-clock"></i>
                                        </span>
                                        <span>9h - 13h</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="justify-content-center is-center px-2 mt-5">
                            <h5 class="is-size-5 is-uppercase mb-3">Suivez-nous</h5>
                            <ul class="footer__listeres footer__listeres--center my-3">
                                <li class="footer__listeres-el">
                                    <a href="#"><i class="fab fa-facebook-f fa-2x"></i></a>
                                </li>
                                <li class="footer__listeres-el">
                                    <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                                </li>
                                <li class="footer__listeres-el">
                                    <a href="#"><i class="fab fa-tiktok fa-2x"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="columns mb-6">
        <div class="column is-12 is-offset has-text-centered">
            <iframe class="iframe iframe__maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2539.6987661774415!2d4.8751760158965!3d50.46533389417324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c1996cf13cdc91%3A0x2e63a966357a0567!2sHaute%20%C3%89cole%20Albert%20Jacquard-Campus%20infographique!5e0!3m2!1sfr!2sbe!4v1622796851934!5m2!1sfr!2sbe" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
@endsection

