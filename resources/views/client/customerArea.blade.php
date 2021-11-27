@extends('_layoutClient')
@section('title') Espace Client @endsection

@section('content')
    <!-- contenu  -->
    <section class="section section__espaceclient mt-6">
        <div class="columns is-multiline is-mobile  is-variable is-6">
            <div class="column is-full-mobile is-4-tablet ">
                <a href="{{ route('galeriesclient') }}">
                    <div class="card card--customerarea hvr-shadow hvr-float">
                        <div class="card-content is-align-vertical-middle is-paddingless-desktop">
                            <div class="content has-text-centered-tablet">
                                <img class="icon icon--big" src="http://mohammedmoussaoui.be/projets/tfe/assets/icones/pictures.svg" alt="Galeries">
                                <span class="title is-block-tablet-only is-uppercase font-weight-bolder is-size-5 is-size-6-desktop is-size-4-widescreen has-text-blue"><span class="is-hidden-touch">Mes</span> galeries</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="column is-full-mobile is-4-tablet">
                <a href="{{ route('showProfil') }}">
                    <div class="card card--customerarea hvr-shadow hvr-float">
                        <div class="card-content is-align-vertical-middle is-paddingless-desktop">
                            <div class="content has-text-centered-tablet">
                                <img class="icon icon--big" src="http://mohammedmoussaoui.be/projets/tfe/assets/icones/profil.svg" alt="Profil">
                                <span class="title is-block-tablet-only is-uppercase font-weight-bolder is-size-5 is-size-6-desktop is-size-4-widescreen has-text-blue"><span class="is-hidden-touch">Mon</span> profil</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @if((\App\Http\Controllers\GalleryController::countWaitingGalleries()) > 0)
                <div class="column is-full-mobile is-4-tablet">
                    <a href="{{ route('waitingGaleries') }}">
                        <div class="card card--customerarea hvr-shadow hvr-float is-relative">
                            <div class="p-0-tablet card-content is-align-vertical-middle is-paddingless-desktop">
                                <div class="content has-text-centered-tablet">
                                    <img class="icon icon--big" src="http://mohammedmoussaoui.be/projets/tfe/assets/icones/en_attente.svg" alt="En attente">
                                    <span class="title is-block-tablet-only is-uppercase font-weight-bolder is-size-5 is-size-6-desktop is-size-4-widescreen has-text-blue">En attente</span>
                                    <span class="badge badge__enattente">
                                    {{ \App\Http\Controllers\GalleryController::countWaitingGalleries() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @else
                <div class="column is-full-mobile is-4-tablet">
                    <a href="{{ route('rendezVous') }}">
                        <div class="card card--image hvr-shadow hvr-float">
                            <div class="card-content is-align-vertical-middle">
                                <div class="content">
                                    <span class="title is-uppercase font-weight-bolder is-size-5 is-size-6-desktop is-size-4-widescreen has-text-white">Réserver un shooting</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>

        <div class="columns is-variable is-6 mt-3">
            <div class="column is-8-tablet">
                @if(count($galleries)>0)
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <h4 class="title is-uppercase font-weight-bolder is-size-5 is-size-6-desktop is-size-4-widescreen has-text-blue">Dernière galeries</h4>
                                @foreach($galleries as $gallerie)
                                <article class="media pt-6 pb-3 pr-5">
                                    <figure class="media-left is-hidden-touch">
                                        @if(count($gallerie->media) >0)
                                            @foreach($gallerie->media as $media)
                                                <img class="image is-96x96" src="{{ asset('storage/'.$media->link) }}" alt="{{$media->title}}">
                                                @break
                                            @endforeach
                                        @else
                                            <img class="image is-96x96" src="https://bulma.io/images/placeholders/128x128.png" alt="Pas de miniature">
                                        @endif
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                            <a href="{{ route('galleryclient', $gallerie->id) }}">
                                                <p class="title is-5">{{$gallerie->name}}</p>
                                                <p class="subtitle is-6 mt-5">{{ $gallerie->desc }}</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-right is-hidden-touch is-hidden-desktop-only">
                                        <p class="has-text-right">{{ \Carbon\Carbon::parse($gallerie->created_at)->format('d/m/Y') }}</p>
                                        <a href="{{ route('galleryclient', $gallerie->id) }}" class="button is-light mt-5 hvr-sweep-to-right ">
                                            <span>Visualiser</span>
                                            <span class="icon">
                                                <i class="far fa-eye"></i>
                                            </span>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="column is-4-tablet">
                <div class="card card--tranparent">
                    <div class="card-content">
                        <div class="content">
                            <span class="title title--uppercase is-size-6-mobile is-size-5-tablet is-size-6-desktop is-size-4-widescreen has-text-blue">Liens utiles</span>
                            <ul class="ml-5">
                                <li class="mt-3"><a target="_blank" href="{{ route('services') }}">Nos services;</a></li>
                                <li class="mt-3"><a target="_blank" href="{{ route('contact') }}">Contacter le studio;</a></li>
                                <li class="mt-3"><a target="_blank" href="{{ route('rendezVous') }}">Réserver un shooting.</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
