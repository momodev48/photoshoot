@extends('_layoutAdmin')

@section('title') Dashboard @endsection

@section('title-page') Tableau de board @endsection

@section('content')
    <!-- contenu  -->
    <section class="section section__form">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-4 is-vertical is-parent">
                    <div class="tile is-child box">
                        <div class="box__el">
                            <p class="subtitle is-size-4 is-size-3-widescreen mb-1">Nombre de clients</p>
                            <p>
                                <span class="is-size-2">{{ \App\Http\Controllers\UserController::totalClients() }}</span>
                              {{--  <span class="is-size-5">  Clients</span>--}}
                            </p>
                        </div>
                        <div class="box__el">
                            <p class="subtitle is-size-4 is-size-3-widescreen mb-1">Nombre de galeries privées</p>
                            <p class="has-text-orange">
                                <span class="is-size-2">{{ \App\Http\Controllers\GalleryController::totalSelection() }}</span>
                                <span class="is-size-5">  En cours de séléction</span>
                            </p>
                            <p class="has-text-green">
                                <span class="is-size-2">{{ \App\Http\Controllers\GalleryController::totalFinished() }}</span>
                                <span class="is-size-5">  Validée(s)</span>
                            </p>
                        </div>
                    </div>
                    <div class="tile is-child">
                        <a href="{{ route('getFormClient') }}"
                           class="button button__dashboard button--blue is-large is-fullwidth is-size-5-mobile is-size-6-tablet is-size-5-widescreen has-text-weight-semibold">Ajouter un client</a>
                        <a href="{{ route('getListeClients') }}" class="button button__dashboard is-primary is-size-5-mobile is-size-6-tablet is-size-5-widescreen is-large is-fullwidth has-text-weight-semibold">Créer une galerie privée</a>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <div class="box__el">
                            <p class="subtitle is-size-4 is-size-3-widescreen mb-1">5 dernières galeries</p>
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
                                            {{--<a href="{{ route('galleryclient', $gallerie->id) }}">--}}
                                            <a href="{{ route('showGallery', $gallerie->id) }}">
                                                <p class="subtitle has-text-weight-semibold is-5">{{$gallerie->name}}</p>
                                                <p class="subtitle is-6 mt-1">{{ $gallerie->desc .", pour le client ". $gallerie->user->first_name ." " . $gallerie->user->last_name}}</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-right is-hidden-touch">
                                        <p class="has-text-right">{{ \Carbon\Carbon::parse($gallerie->created_at)->format('d/m/Y') }}</p>
                                        <a href="{{ route('showGallery', $gallerie->id) }}" class="button is-light mt-5 hvr-sweep-to-right">
                                            <span>Modifier</span>
                                            <span class="icon">
                                                <i class="fas fa-edit"></i>
                                                {{--<i class="fas fa-angle-double-right"></i>--}}
                                            </span>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        if (window.matchMedia("(max-width: 768px)").matches) {
            alert("Dashboard admin n'est pas optimisé pour smartphone");
        }
    </script>
@endsection
