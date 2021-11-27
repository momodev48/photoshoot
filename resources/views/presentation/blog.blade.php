@extends('_layoutPresentation')
@section('title') Services @endsection

@section('content')
    <!-- contenu  -->
    @if($message = Session::get('success'))
        <div id="notificationSuccess" class="notification notification__success has-text-centered is-primary">
            {{ $message }}
        </div>
    @endif
    <section class="section section__blog">
        <h3 class="title font-weight-bolder is-size-3 is-size-2-desktop is-uppercase is-center my-6 is-family-secondary">Blog</h3>
        <div class="container">
            <div class="columns is-mobile is-flex is-multiline">
                @foreach($articles as $article)
                    @if($article->published == 1)
                        <div class="column is-12-mobile is-4-tablet is-3-widescreen">
                            <a href="{{ route('blogArticle', $article->id) }}">
                                <div class="card">
                                    <div class="card-image">
                                        <figure class="image is-4by3">
                                            <img src="{{ asset('storage/'.$article->cover_photo) }}"
                                                 alt="{{ $article->title }}">
                                        </figure>
                                    </div>
                                    <div class="card-content">
                                        <div class="media mb-3">
                                            {{--<div class="media-left">
                                                <figure class="image is-48x48">
                                                    <img src="https://bulma.io/images/placeholders/96x96.png"
                                                         alt="Placeholder image">
                                                </figure>
                                            </div>--}}
                                            <div class="media-content">
                                                <p class="title title--blog is-size-6 has-text-weight-bold">{{substr(htmlspecialchars(strip_tags($article->title)), 0,  45)}}&hellip;</p>
                                                <p class="subtitle is-7 has-text-blue">{{ $article->user->first_name .' '.$article->user->last_name }}</p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="is-hidden-touch is-size-7">
                                                {{--{!! Str::limit($article->content_text, 30) !!}--}}
                                                {{--{{htmlspecialchars(trim(strip_tags(substr($article->content_text, 0,  40))))}}--}}
                                                {{substr(htmlspecialchars(strip_tags($article->content_text)), 0,  40)}}&hellip;

                                            </div>
                                            <div class="mt-1 is-size-6 has-text-orange">{{ \Carbon\Carbon::parse($article->created_at)->format('d-m-Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

@endsection

