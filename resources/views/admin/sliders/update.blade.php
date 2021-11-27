@extends('_layoutAdmin')


@section('title') Modifier un slider @endsection

@section('title-page') Modifier un slider @endsection

@section('content')
    <!-- contenu  -->

    <section class="section section__form">


        <div class="container">
            <form class="form" action="{{ route('updateSlider', $slider->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="notification is-white">
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="name" class="label">Nom *</label>
                                <div class="control">
                                    <input id="name" name="name" class="input" type="text" value="{{old('name')??$slider->name}}">
                                    @error('name')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="type" class="label">Type *</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="type" id="type">
                                            <option value="Photo">Photo</option>
                                            <option value="Vidéo">Vidéo</option>
                                            <option value="GIF">GIF</option>
                                        </select>
                                    </div>
                                    @error('type')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="desc" class="label">Description *</label>
                                <div class="control">
                                    <textarea id="desc" rows="2" class="textarea" placeholder="Description du slider" name="desc">{{old('desc')??$slider->desc}}</textarea>
                                    @error('desc')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label" for="file_slider">Fichier source</label>
                                <div class="control">
                                    <div class="miniature">
                                        <div class="miniature__liste">
                                            <div class="miniature__el">
                                                <img class="miniature__el-image image is-128x128" src="{{ asset('/storage/'.$slider->link) }}" alt="studio_32_{{ $slider->name }}"/>
                                            </div>
                                            <div class="miniature__el">
                                                <div class="file is-boxed">
                                                    <label class="file-label">
                                                        <input id="file_slider" class="file-input" type="file" name="file_slider">
                                                        <span class="file-cta">
                                                          <span class="file-icon">
                                                            <i class="fas fa-upload"></i>
                                                          </span>
                                                          <span class="file-label">
                                                            Parcourir…
                                                          </span>
                                                        </span>
                                                        <span id="file_slider-name" class="@if(is_null($slider->link)) is-hidden @endif file-name"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label">
                        <a href="{{ route('indexSliders') }}" class="button is-danger is-outlined">Annuler</a>
                    </div>
                    <button class="button is-dark" type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        "use strict";
        @if($slider->type)
        document.getElementById("type").value = '{{$slider->type}}';
        @endif

        var fl = document.getElementById('file_slider-name');

        @if($slider->link)

        var link = '{{ $slider->link }}';
            link = link.slice(8);
            fl.innerHTML = link;
        @endif

        let fi = document.getElementById('file_slider');
        function FileDetails() {
            if (fi.files.length === 1) {
                for (var i = 0; i <= fi.files.length - 1; i++) {
                    var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                    fl.innerHTML = fname;
                }
            }

            else   {
                alert('Veuillez sélectionner un fichier.')
            }
        }
        fi.addEventListener('change',(e)=>{
            e.preventDefault();
            FileDetails();
        });
    </script>
@endsection
