@extends('_layoutPresentation')
@section('title')  @endsection

@section('content')
    <!-- contenu  -->
    <section class="section section__slider p-0">
        <div class="slider">
            @foreach($sliders as $slider)
                @if ($loop->first)
                    <div class="slider__el">
                        <img class="image image__slider kenburns-top" src="{{ asset('storage/'.$slider->link) }}" srcset="{{ asset('storage/'.$slider->link) }} 1x, {{ asset('storage/'.$slider->link) }} 2x" alt="{{ $slider->name }}">
                        <div class="slider__el-text is-center text-focus-in">
                            <h1 class="title is-size-2 is-size-2-tablet is-size-1-desktop has-text-white is-family-secondary is-center is-uppercase text-shadow-drop-center ">PhotoShoot</h1>
                            <h2 class="subtitle is-size-6 is-size-5-tablet is-size-4-widescreen has-text-white">La plus belle des signatures numérique</h2>
                        </div>
                    </div>
                @endif

                @if ($loop->last)
                    <div class="slider__el">
                        <img class="image image__slider kenburns-top" src="{{ asset('storage/'.$slider->link) }}" srcset="{{ asset('storage/'.$slider->link) }} 1x, {{ asset('storage/'.$slider->link) }} 2x" alt="{{ $slider->name }}">
                        <div class="slider__el-text is-center text-focus-in">
                            <h1 class="title is-size-2 is-size-2-tablet is-size-1-desktop has-text-white is-family-secondary is-center is-uppercase text-focus-in-fast text-shadow-drop-center">On a tant à partager</h1>
                            <h2 class="subtitle is-size-6 is-size-5-tablet is-size-4-widescreen has-text-white">Découvrez tous nos services</h2>
                            <a href="{{ route('services') }}" class="button is-medium">
                                <span class="is-size-6-touch-only">Nos services</span>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
            <a class="slider__button slider__button--left">
                <i class="fas fa-chevron-left fa-2x"></i>
            </a>
            <a class="slider__button slider__button--right">
                <i class="fas fa-chevron-left fa-2x fa-rotate-180"></i>
            </a>
        </div>
    </section>
    {{--A Propos--}}
    <div class="section section__apropos">
        <div class="columns ">
            <div class="column">
                <h3 class="title font-weight-bolder is-size-3 is-size-2-desktop is-uppercase is-center">&Agrave; propos</h3>
                <p>Photoshoot est un endroit idéal pour donner vie a des idées, des souvenirs&hellip;
                Vous serez accueillis avec le sourire et professionnalisme afin de faire de votre séance photo une expérience inoubliable.</p>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        "use strict";

        //slider
        let sliders = document.querySelectorAll('.slider__el');
        const prev=document.querySelector(".slider__button--left");
        const next=document.querySelector(".slider__button--right");
        let index = 1;
        /*for(index; index<sliders.length; index++)
        {
            sliders[index].style.display = "none";
        }*/
        showDivs(index);
        function plusDivs(n) {
            showDivs(index += n);
        }
        function showDivs(n) {
            let i;
            if (n > sliders.length) {index = 1}
            if (n < 1) {index = sliders.length} ;
            for (i = 0; i < sliders.length; i++) {
                sliders[i].style.display = "none";
            }
            sliders[index-1].style.display = "block";
        }
        /*function interval()
        {
            let intervalId = window.setInterval(function(){
                clearInterval(intervalId);
                plusDivs(1);
            }, 5000);
        }*/
        let interval = 7000;
        prev.addEventListener('click',(e)=>{
            plusDivs(-1);
            interval = 0;
        });
        next.addEventListener('click',(e)=>{
            plusDivs(1);
            interval = 0;
        });
        setInterval(function(){
            plusDivs(1);
        }, interval);

        //hide / show go top button
        const navBar = document.querySelector(".navbar");
        const connexionBtn = document.querySelector(".buttons");
        //navBar.style.display = 'none';
        function hideNavBar()
        {
            navBar.style.backgroundColor = "transparent";
            connexionBtn.classList.add('button--white');
            //connexionBtn.classList.add('button');
            //connexionBtn.classList.remove('buttons');
        }
        function showNavBar()
        {
            navBar.style.backgroundColor = "white";
            connexionBtn.classList.remove('button--white');
            //connexionBtn.classList.remove('button');
            //connexionBtn.classList.add('buttons');
        }
        if (window.matchMedia("(min-width: 1023px)").matches)
        {
            hideNavBar();
        }
        window.addEventListener("scroll", (e) => {
            if (window.matchMedia("(min-width: 1023px)").matches)
            {
                if(window.scrollY > 300)
                {
                    showNavBar();
                }
                else
                {
                    hideNavBar();
                }
            }
        });
    </script>
@endsection
