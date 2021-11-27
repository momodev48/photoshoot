@extends('_layoutPresentation')
@section('title') Services @endsection

@section('content')
    <!-- contenu  -->
    @if($message = Session::get('success'))
        <div id="notificationSuccess" class="notification notification__success has-text-centered is-primary">
            {{ $message }}
        </div>
    @endif
    <section class="section section__article">
        @foreach($articles as $article)
            <div class="container">
                <h3 class="title font-weight-bolder is-size-3 is-size-2-desktop my-6 is-center is-family-secondary">{{$article->title}}</h3>
                <div class="columns is-multiline notification is-white">
                    <div class="column is-12">
                        <figure>
                            <img class="image image__article" src="{{ asset('storage/'.$article->cover_photo) }}"
                                 alt="{{ $article->title }}">
                            <figcaption class="has-text-centered">{{ $article->meta_description }}</figcaption>
                        </figure>
                    </div>
                    <div class="column is-12">
                        {!! $article->content_text !!}
                    </div>
                </div>
            </div>
        @endforeach
        <a href="#top">
            <i class="icon icon__top fas fa-chevron-up"></i>
        </a>
    </section>

@endsection

