@extends('_layoutPresentation')
@section('title') Services @endsection

@section('content')
    <!-- contenu  -->
    <section class="section section__services">
        <h1 class="title font-weight-bolder is-size-3 is-size-2-desktop is-uppercase is-center my-6 is-family-secondary">Services</h1>
        <div class="columns px-3">
            <div class="column">
                <div class="service service--mariage">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Mariage</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Mettons en lumière vos souvenirs les plus chers.     
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="service service--evenementiel">
                    <div class="service__details">
                        <h5 class=" service__details-title is-size-4 is-size-3-widescreen">Événementiel</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Capturez vos événements pour les garder en mémoire&#8239;!
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="service service--sportif">
                    <div class="service__details">
                        <h5 class="is-size-4 is-size-3-widescreen">Sportif</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Capturez la dynamique sportive.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns p-3">
            <div class="column">
                <div class="service service--portrait">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Portrait</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Mettez en valeur votre profil&#8239;!
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="service service--complicite">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Photos complicité</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Avec votre fidèle compagnon, vos amis, votre chien ou votre chat&hellip;
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="service service--produits">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Photos de produits</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Pour rendre votre e-shop et/ou catalogue plus vendeur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns p-3">
            <div class="column">
                <div class="service service--immobilier">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Photographie immobilière</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Boostez la vente ou la location de votre bien !
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="service service--corporate">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Corporate</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Faites briller votre société et montrer à vos clients vos valeurs !
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="service service--culinaire">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Culinaire</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Nous réaliserons des photos réalistes et appétissantes de vos plats.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns p-3">
            <div class="column">
                <div class="service service--grossesse">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Grossesse</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Sublimez votre maternité et immortaliser les instants magnifiques que vous procurent la grossesse.
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="service service--famille">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Famille</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Immortaliser des instants précieux, des regards tendres et des petits scintillements surs les yeux de vos proches.
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="service service--nouveaune">
                    <div class="service__details">
                        <h5 class="service__details-title is-size-4 is-size-3-widescreen">Nouveau né</h5>
                        <p class="service__details-description is-size-7 is-size-6-widescreen">
                            Révélez la lumière de votre enfant ainsi que le bonheur de votre nouvelle famille.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="columns pt-3 px-3">
            <div class="column">
                <img class="image image__services" src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
            </div>
            <div class="column">
                <img class="image image__services" src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
            </div>
            <div class="column">
                <img class="image image__services" src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
            </div>
        </div>--}}
    </section>

    <section class="section section__package">
        <h3 class="title font-weight-bolder is-size-3 is-size-2-desktop is-uppercase is-center is-family-secondary my-6">Packages</h3>
        <div class="columns px-3">
            <div class="column ">
                <div class="package">
                    <div class="package__details">
                        <h3 class="package__details-title is-size-3 is-size-4-tablet is-size-3-desktop is-uppercase mb-2">standard</h3>
                        <h2 class="package__details-price is-size-2 is-size-3-tablet is-size-2-desktop is-uppercase mb-2">200&nbsp;€</h2>
                        <ul class="package__details-description is-size-6">
                            <li class="mb-2">3&nbsp;Heures</li>
                            <li class="mb-2">50 Photos</li>
                            <li class="mb-2">Retouches et éditions</li>
                            <li class="mb-2">Galerie en ligne </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="package">
                    <div class="package__details">
                        <h3 class="package__details-title is-size-3 is-size-4-tablet is-size-3-desktop is-uppercase mb-4">Premium</h3>
                        <h2 class="package__details-price is-size-2 is-size-3-tablet is-size-2-desktop is-uppercase mb-2">350&nbsp;€</h2>
                        <ul class="package__details-description is-size-6">
                            <li class="mb-2">6&nbsp;Heures</li>
                            <li class="mb-2">100 Photos</li>
                            <li class="mb-2">Retouches et éditions</li>
                            <li class="mb-2">Galerie en ligne </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="package">
                    <div class="package__details">
                        <h3 class="package__details-title is-size-3 is-size-4-tablet is-size-3-desktop is-uppercase mb-4">Platinum</h3>
                        <h2 class="package__details-price is-size-2 is-size-3-tablet is-size-2-desktop is-uppercase mb-2">500&nbsp;€</h2>
                        <ul class="package__details-description is-size-6">
                            <li class="mb-2">12&nbsp;Heures</li>
                            <li class="mb-2">250 Photos</li>
                            <li class="mb-2">Retouches et éditions</li>
                            <li class="mb-2">Galerie en ligne </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section has-large-spacing-top is-centered is-full-width has-background-orange">
        <div class="columns is-multiline ">
            <div class="column has-margin-auto is-two-thirds  is-center">
                <h4 class="title is-size-4 is-size-4-tablet is-size-3-widescreen has-text-white is-uppercase is-center">int&Eacute;ress&Eacute; par nos services ?</h4>
                <div class="subtitle is-size-6 is-size-5-tablet is-size-4-widescreen has-text-white">Contactez-nous maintenant<p><span></span></p></div>
                <a href="{{route('contact')}}" class="button">
                    <span class="icon">
                      <i class="fas fa-phone-alt"></i>
                    </span>
                    <span>Nous contactez</span>
                </a>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        "use strict";
        const service = document.querySelectorAll(".service");
        const service_description = document.querySelectorAll(".service__details-description");
        const galeriesclient__cover = document.querySelectorAll(".galeriesclient__cover");
        const galerie_button = document.querySelectorAll(".galeriesclient__details-button");

        function mouseOver(i) {
            service_description[i].style.display = "block";
            //galeriesclient__cover[i].classList.add('galeriesclient__cover--hover');
        }

        function mouseOut(i) {
            service_description[i].style.display = "none";
            //galeriesclient__cover[i].classList.remove('galeriesclient__cover--hover');
        }
        if(window.matchMedia("(min-width: 1023px)").matches)
            for (let i=0; i<service.length; i++)
            {
                service_description[i].style.display = "none";
                service[i].onmouseover = function() {mouseOver(i)};
                service[i].onmouseout = function() {mouseOut(i)};
            }



    </script>
@endsection
