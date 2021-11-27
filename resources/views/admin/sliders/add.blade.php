@extends('_layoutAdmin')


@section('title') Créer un slider @endsection

@section('title-page') Créer un slider @endsection

@section('content')
    <!-- contenu  -->

    <section class="section section__form">
        <div class="container">
            <form class="form" action="{{ route('addSlider') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="notification is-white">
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="name" class="label">Nom *</label>
                                <div class="control">
                                    <input id="name" name="name" class="input" type="text" placeholder="Nom du slider&hellip;">
                                    @error('name')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="type" class="label">Type *</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select id="type" name="type">
                                            <option selected disabled>Séléctionner un type</option>
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
                                    <textarea id="desc" rows="2" class="textarea" placeholder="Description du slider" name="desc"></textarea>
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
                                <label class="label" for="file_slider">Fichier</label>
                                <div class="control">
                                    <div class="file is-boxed">
                                        <label class="file-label">
                                            <input id="file_slider" class="file-input" type="file" name="file_slider" required>
                                            <span class="file-cta">
                                          <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                          </span>
                                          <span class="file-label">
                                            Parcourir…
                                          </span>
                                        </span>
                                            <span id="file_slider-name" class="is-hidden file-name"></span>
                                            {{--<button class="button" onclick="FileDetails()"></button>--}}
                                        </label>
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
                    <button class="button is-dark" type="submit">Ajouter</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        "use strict";
        // GET THE FILE INPUT.
        let fi = document.getElementById('file_slider');
        let fn = document.getElementById('file_slider-name');
        function FileDetails() {
            // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
            if (fi.files != 0)
            {
                fn.innerHTML = '<b>' + fi.files.item(0).name + '</b></br >';
                fn.classList.remove('is-hidden');
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

