@extends('_layoutClient')
@section('title') Espace Client @endsection
@section('hero')
    <section class="hero hero--profil mb-6">
        <div class="hero-body has-text-centered">
            <p class="title is-capitalized has-text-white is-center is-family-secondary">
                {{ $gallery->name }}
            </p>
            {{--<p class="subtitle"> Primary subtitle </p>--}}
        </div>
    </section>
@endsection
@section('content')
    <nav class="level level--galleryclient is-mobile">
        <div class="level-item has-text-centered is-size-7-touch">
            <div>
                <a href="{{ URL::previous() }}">
                    <p class="heading">Retour</p>
                    <i class="fas fa-arrow-left fa-2x"></i>
                </a>
            </div>
        </div>
        <div id="top" class="level-item has-text-centered">
            <div>
                <p class="heading">Sélectionnées</p>
                <p class="title is-size-1-desktop is-size-2-touch">{{ \App\Http\Controllers\MediaController::nombrePhotosSelec($gallery->id) }}/{{ count($gallery->media) }}</p>
            </div>
        </div>
        <div class="level-item has-text-centered is-hidden-touch">
            <div>
                <!-- Si la sélection de galerie est déjà finie -->
                @if($gallery->selection_lock == 1)
                <a href="{{ $gallery->link_zip }}" class="button is-dark">
                <span class="icon">
                  <i class="fas fa-download"></i>
                </span>
                    <span>Télécharger la galerie</span>
                </a>
                <!-- Si l'utilisateur n'a pas encore fini de sélectionner le nombre minimum de photos -->
                @elseif(\App\Http\Controllers\MediaController::nombrePhotosSelec($gallery->id) < count($gallery->media))
                <button class="button is-dark" title="Veuillez terminer votre sélection" disabled>
                    <span class="icon">
                      <i class="fas fa-check"></i>
                    </span>
                    <span>Valider la sélection</span>
                </button>
                @else
                <!-- Si l'utilisateur a sélectionné le nombre minimum de photos et que la galerie est prête pour validation -->
                <button class="button is-dark">
                    <span class="icon">
                      <i class="fas fa-check"></i>
                    </span>
                    <span>Valider la sélection</span>
                </button>
                @endif
            </div>
        </div>
    </nav>
    <section class="section section__galleryclient">
        <div class="columns galleryclient">
            <div class="column is-3 is-2-widescreen is-offset-1">
                <div class="galleryclient__miniature card is-shadowless is-transparent">
                    <div class="card-image is-hidden-touch mb-5">
                        @if(count($gallery->media) >0)
                            @foreach($gallery->media as $media)
                                <img class="image is-128x128" src="{{ asset('storage/'.$media->link) }}" alt="{{$media->title}}">
                                @break
                            @endforeach
                        @else
                            <img class="image is-128x128" src="https://bulma.io/images/placeholders/128x128.png" alt="Pas de miniature">
                        @endif
                    </div>
                    <div class="card-content pl-1 pt-0">
                        <p class="is-size-6">{{ $gallery->name }}</p>
                        <p class="is-size-6 mt-1"><span class="has-text-weight-bold has-text-orange">Photos incluses: </span> {{$gallery->number_photos}}</p>
                        <p class="is-size-6 mt-1"><span class="has-text-weight-bold has-text-orange">Pack actuel: </span>
                            @if($gallery->number_photos <= 20)
                            Starter
                            @elseif($gallery->number_photos >= 20 && $gallery->number_photos <= 40)
                            Zen
                            @else
                            Max
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="galleryclient__liste">
                    @if(count($gallery->media) > 0)
                        @foreach($gallery->media as $media)
                            {{--href 2000x1333      data-lcl-thumb 400 267       backgound image 150x100--}}
                            <a class="galleryclient__el" href="{{ asset('storage/'.$media->link) }}" title="{{ $loop->index+1 ."/". count($gallery->media)}}" data-lcl-txt="{{ $gallery->desc }}" data-lcl-author="www.pexels.com{{--{{ $gallery->user->first_name." ".$gallery->user->last_name }}--}}" data-lcl-thumb="{{ asset('storage/'.$media->link) }}">
                                @if($media->selected==1)
                                    <img data-desc="selected" data-id="{{$media->id}}" class="galleryclient__el-img galleryclient__el-img--selected" src="{{ asset('storage/'.$media->link) }}" alt="{{$media->title}}">
                                @else
                                    <img data-desc="unselected" data-id="{{$media->id}}" class="galleryclient__el-img" src="{{ asset('storage/'.$media->link) }}" alt="{{$media->title}}">
                                @endif
                            </a>
                            {{--<a id="lcl_on_open" href="#" class="galleryclient__el-button button button--blue">
                            <span class="icon">
                              <i class="fas fa-undo-alt"></i>
                            </span>
                                <span>Sélectionner</span>
                            </a>--}}
                        @endforeach
                    @else
                        <div class="is-block">
                            <h1 class="title is-4">Aucune photo n'a été encore ajouté dans cet album</h1>
                            <a href="{{ URL::previous() }}" class="button button--blue">
                            <span class="icon">
                              <i class="fas fa-undo-alt"></i>
                            </span>
                                <span>Retour</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <a href="#top">
                <i class="icon icon__top fas fa-chevron-up"></i>
            </a>
        </div>
    </section>
@endsection

@section('script')
    <!-- LIGHTBOX INITIALIZATION -->
    <script>
        "use strict";
        $(document).ready(function(e) {
            // live handler
            lc_lightbox('.galleryclient__el', {
                wrap_class: 'lcl_fade_oc',
                gallery : true,
                thumb_attr: 'data-lcl-thumb',
                skin: 'minimal',
                radius: 0,
                padding	: 0,
                border_w: 0,
                //custom
                cmd_position:'outer',
                fullscreen:true,
                fs_img_behavior:'fit',
                fs_only:false,
                socials:true,
                //txt_toggle_cmd:true,
                download:true,
                touchswipe:true,
                mousewheel:true,
                rclick_prevent:true,
                html_is_ready :function(opts,vars){
                    //console.log("html ready : l'index de l'image courante est :",vars.elem_index);
                    //console.log("html is ready :",", opts :",opts,", vars :",vars);
                    let button = $("<button class='galleryclient__el-button button button--blue'>Sélectionner</button>");
                    //button.attr('id', vars.elem_index);
                    $('#lcl_contents_wrap').append(button);
                }

            })/*.on('lcl_on_open lcl_on_elem_switch',function(e,opts,index){
                console.log("e.type :",e.type,", index :",index);
                $('#lcl_contents_wrap')
                    .on('click','#btn',function(){
                        console.log(
                            'data-id de l\'image courante est :'+$("#lcl_contents_wrap").find("img.image").eq(index).attr("data-id")
                            +', l\'index de l\'image courante est :',index
                        );
                    });
            });*/
        });

        /*let el = $(".galleryclient__el-img").data("id");
        console.log("value : " + el);*/

        /*const selectionImages = document.querySelectorAll('.galleryclient__el-img');
        const selectionButtons = document.querySelectorAll('.galleryclient__el-button');*/

        /*function setIdButton()
        {
            for (let i=0; i<selectionImages.length; i++)
            {
                for (let j=0; i<selectionButtons.length; j++)
                {
                    if(selectionImages[i].dataset.desc == "unselected")
                    {
                        //console.log(selectionImages[i].dataset.id);
                        selectionButtons[j].id = selectionImages[i].dataset.id;
                        selectionButtons[j].innerHTML = "Sélectionner";
                    }
                    else
                    {
                        selectionButtons[j].id = selectionImages[i].dataset.id;
                        selectionButtons[j].innerHTML = "Désélectionner";
                    }
                }
            }
        }*/

        /*for (let i=0; i<selectionImages.length; i++)
        {
            selectionImages[i].addEventListener('click',(e)=>{
                console.log("sdf");
            });
            const lclTnImage = document.querySelectorAll('.lcl_tn_image');
            if (lclTnImage)
            {
                for (let i=0; i<lclTnImage.length; i++)
                {
                    lclTnImage[i].addEventListener('click',(e)=>{
                        console.log("sdf");
                    });
                }
            }
        }*/

    </script>
@endsection




























{{--
@extends('_layoutClient')
@section('title') Mon profil @endsection
@section('hero')
    <section class="hero hero--profil mb-6">
        <div class="hero-body has-text-centered">
            <p class="title is-capitalized has-text-white">
                {{ $gallery->name }}
            </p>
            --}}
{{--<p class="subtitle">
                Primary subtitle
            </p>--}}{{--

        </div>
    </section>
@endsection
@section('content')
    <!-- contenu  -->
    <nav class="level is-mobile">
        <div class="level-item has-text-centered is-hidden-touch">
            <div>
                <a href="{{ URL::previous() }}">
                    <p class="heading">Retour</p>
                    <i class="fas fa-undo-alt fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">Sélectionnées</p>
                <p class="title">{{ $gallery->photos_selection }}/{{ $gallery->number_photos }}</p>
            </div>
        </div>
        <div class="level-item has-text-centered is-hidden-touch">
            <div>
                <button class="button button--black">
                            <span class="icon">
                              <i class="fas fa-check"></i>
                            </span>
                    <span>Valider la sélection</span>
                </button>
            </div>
        </div>
    </nav>
    <section class="section section__galleryclient">
        <div class="galleryclient columns">
            <div class="column is-3 is-2-widescreen is-offset-1">
                <div class="galleryclient__miniature card is-shadowless is-transparent">
                    <div class="card-image ">
                        @if(count($gallery->media) >0)
                            @foreach($gallery->media as $media)
                                <img class="image is-128x128" src="{{ asset('storage/'.$media->link) }}" alt="{{$media->title}}">
                                @break
                            @endforeach
                        @else
                            <img class="image is-128x128" src="https://bulma.io/images/placeholders/128x128.png" alt="Pas de miniature">
                        @endif
                    </div>
                    <div class="card-content pl-1">
                        <p>{{ $gallery->name }}</p>
                        <p><span class="font-weight-bolder">Photos incluses: </span> {{$gallery->number_photos}}</p>
                        <p><span class="font-weight-bolder">Pack actuel: </span> Starter</p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="galleryclient__liste">
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                    <div class="galleryclient__el">
                        <figure class="image">
                            <img src="/assets/images/bg.jpg" srcset="/assets/images/bg.jpg 1x, /assets/images/bg@2x.jpg 2x" alt="Miniature album photos produit">
                        </figure>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        "use strict";
        /*script ici*/
    </script>
@endsection



--}}
