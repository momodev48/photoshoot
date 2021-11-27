@extends('_layoutClient')
@section('title') Mon profil @endsection
@section('hero')
    <section class="hero hero--profil mb-6">
        <div class="hero-body has-text-centered">
            <p class="title is-capitalized has-text-white is-center is-family-secondary">
                En attente
            </p>
            {{--<p class="subtitle">
                Primary subtitle
            </p>--}}
        </div>
    </section>
@endsection
@section('content')
    <!-- contenu  -->
    <section class="section section__galeriesclient">
        <div class="galeriesclient">
            @foreach($galleries as $gallerie)
                <div class="galeriesclient__el container is-desktop">
                    <a href="{{ route('galleryclient', $gallerie->id) }}">
                        @if(count($gallerie->media) > 0)
                            @foreach($gallerie->media as $media)
                                <img class="galeriesclient__cover" src="{{ asset('storage/'.$media->link) }}"
                                     alt="{{ $gallerie->name }}"/>
                                @break
                            @endforeach
                        @else
                            <img class="galeriesclient__cover" src="../assets/images/bg.jpg" srcset="../assets/images/bg.jpg 1x, ../assets/images/bg@2x.jpg 2x" alt="{{ $gallerie->name }}"/>
                        @endif
                        <div class="galeriesclient__details">
                            <div class="level is-mobile">
                                <!--statut-->
                                <div class="level-left">
                                    <div class="level-item">
                                        <div class="galeriesclient__details-statut">
                                            @if($gallerie->selection_lock == 0)
                                                <div class="has-text-orange">
                                                <span class="icon">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                </span>
                                                    <span>En attente</span>
                                                </div>
                                            @else
                                                <div class="has-text-green">
                                                <span class="icon">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                </span>
                                                    <span>Terminée</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--date-->
                                <div class="level-right">
                                    <span
                                        class="galeriesclient__details-date">{{ \Carbon\Carbon::parse($gallerie->created_at)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                            <!--titre-->
                            <span class="galeriesclient__details-titre is-size-5 is-block">{{ $gallerie->name }}</span>
                            <!--description-->
                            <div class="level is-mobile">
                                <div class="level-left">
                                    <div class="level-item">
                                        <span class="galeriesclient__details-description">Photos incluses : {{ $gallerie->number_photos }} photos</span>
                                    </div>
                                </div>
                                {{--<div class="level-right">
                                    <i class="fas fa-arrow-circle-right fa-2x galeriesclient__details-button"></i>
                                    --}}{{--<a href="#" class="button galeriesclient__details-button is-text">Voir la galerie</a>--}}{{--
                                </div>--}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('script')
    <script>
        "use strict";
        const galeriesclient__el = document.querySelectorAll(".galeriesclient__el");
        const galeriesclient__cover = document.querySelectorAll(".galeriesclient__cover");
        const galerie_description = document.querySelectorAll(".galeriesclient__details-description");
        const galerie_button = document.querySelectorAll(".galeriesclient__details-button");

        function mouseOver(i) {
            galerie_description[i].style.display = "block";
            galeriesclient__cover[i].classList.add('galeriesclient__cover--hover');
        }

        function mouseOut(i) {
            galerie_description[i].style.display = "none";
            galeriesclient__cover[i].classList.remove('galeriesclient__cover--hover');
        }

        if (window.matchMedia("(min-width: 1023px)").matches)
            for (let i = 0; i <= galeriesclient__el.length; i++) {
                galeriesclient__el[i].onmouseover = function () {
                    mouseOver(i)
                };
                galeriesclient__el[i].onmouseout = function () {
                    mouseOut(i)
                };
            }
    </script>
@endsection

