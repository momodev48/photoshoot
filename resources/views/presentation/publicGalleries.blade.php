@extends('_layoutPresentation')
@section('title') Services @endsection

@section('content')
    <!-- contenu  -->
    <section id="top" class="section section__gallerypublic">
        <h3 class="title font-weight-bolder is-size-3 is-size-2-desktop is-uppercase is-center my-6 is-family-secondary">Galeries</h3>
        <div class="gallerypublic">
            <div class="flexbin flexbin-margin">
                @foreach($galleries as $gallery)
                    @foreach($gallery->media as $media)
                    <a class="gallerypublic__el" href="{{ asset('storage/'.$media->link) }}" title="{{ $gallery->name }}" data-lcl-txt="{{ $gallery->desc }}" data-lcl-author="pexels.com" data-lcl-thumb="{{ asset('storage/'.$media->link) }}">
                        <img class="gallerypublic__el-img" src="{{ asset('storage/'.$media->link) }}" alt="{{$media->title}}">
                    </a>
                    @endforeach
                @endforeach
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

        //hide / show nack top button
        const btnTop = document.querySelector(".icon__top");
        btnTop.style.display = 'none';
        window.addEventListener("scroll", (e) => {
            if(window.scrollY > 400)
            {
                btnTop.style.display = 'block';
            }
            else
            {
                btnTop.style.display = 'none';
            }
        });

        $(document).ready(function(e) {
            // live handler
            lc_lightbox('.gallerypublic__el', {
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
            });

        });


    </script>
@endsection
