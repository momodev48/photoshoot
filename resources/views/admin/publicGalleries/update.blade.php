@extends('_layoutAdmin')


@section('title') Modifier une galerie @endsection

@section('title-page') Modifier une galerie @endsection

@section('content')
    <!-- contenu  -->

    <section class="section section__form">
        <div class="container">
            <div class="notification is-white">
                <form id="FormUpdate" class="form form__update"
                      action="{{ route('updatePublicGallery', $gallery->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $gallery->id }}">
                    <h2 class="subtitle pb-3 ">Modification de la galerie public <strong
                            class="has-text-blue">{{ $gallery->name }}</strong>, ID : <strong
                            class="has-text-blue">{{ $gallery->id }}</strong></h2>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="nom_galerie" class="label">Nom galerie *</label>
                                <div class="control">
                                    <input id="nom_galerie" name="nom_galerie" class="input" type="text" value="{{ old('nom_galerie') ?? $gallery->name }}">
                                    @error('nom_galerie')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="type">Type de galerie *</label>
                                <div class="control">
                                    <input id="type" readonly name="type" class="input" type="text" value="{{ old('type') ?? $gallery->type }}">
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
                                <label class="label" for="description_galerie">Description galerie</label>
                                <div class="control">
                                    <textarea id="description_galerie" rows="2" class="textarea" name="description_galerie">{{ old('description_galerie') ?? $gallery->desc }}</textarea>
                                    @error('description_galerie')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label" for="photo_galerie">Images *</label>
                                <div class="control">
                                    <div class="file is-boxed">
                                        <label class="file-label">
                                            <input id="photo_galerie" class="file-input" type="file" name="photo_galerie[]" multiple>
                                            <span class="file-cta">
                                          <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                          </span>
                                          <span class="file-label">
                                            Parcourir???
                                          </span>
                                        </span>
                                            <span id="photo_galerie-total" class="is-hidden file-name"></span>
                                            {{--<button class="button" onclick="FileDetails()"></button>--}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="miniature">
                    <form class="form form__delete" action="{{ route('gallery.media.destroy', $gallery->id) }}"
                          method="POST">
                        @csrf
                        <div class="miniature__liste">
                            @foreach($gallery->media as $media)
                                <div class="miniature__el">
                                    <input class="miniature__el-select" name="medias[]" value="{{$media->id}}"
                                           type="checkbox">
                                    <label class="miniature__el-label">
                                        <img class="miniature__el-image image is-128x128"
                                             src="{{ asset('/storage/'.$media->link) }}"
                                             alt="studio_32_{{ $media->title }}"/>
                                    </label>
                                </div>
                            @endforeach
                                <a class="button button__delete">
                                    <i class="fas fa-trash-alt fa-5x"></i>
                                </a>
                        </div>
                    </form>
                </div>

            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <a href="{{ route('indexPublicGallery') }}" class="button is-danger is-outlined">Annuler</a>
                </div>
                <button id="submitFormUpdate" class="button button--black" type="submit">Modifier</button>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        "use strict";
        var formUpdate = document.querySelector('.form__update');
        var btnDelete = document.querySelector('.button__delete');
        btnDelete.style.display="none";
        var submitFormUpdate = document.querySelector('#submitFormUpdate');
        submitFormUpdate.addEventListener('click', (e) => {
            e.preventDefault();
            formUpdate.submit();
        });

        $(function () {
            $('.miniature__el-label').on('click', function (e) {
                $(this).closest('label').toggleClass('miniature__el-label--selected');
                btnDelete.style.display="block";
                var checkbox = $(this).prev();
                if (checkbox.prop('checked') === true) {
                    checkbox.prop('checked', false);
                } else {
                    checkbox.prop('checked', true);
                }
                console.log(checkbox);
            })
        });

        function showModal() {
            Swal.fire({
                title: 'Supprimer la s??lection',
                text: "??tes-vous s??r de vouloir supprimer ce qui est s??l??ctionn?? ? !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007CBA',
                cancelButtonColor: '#1F1F1F',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                // Si le button "oui" a ??t?? cliqu??
                if (result.isConfirmed) {
                    //Alors on soumet le formulaire avec l'ID du client

                    $('.form__delete').submit();
                }
            })
        }

        btnDelete.addEventListener('click',(e)=>{
            e.preventDefault();
            showModal();
        });


        // GET THE FILE INPUT.
        let fi = document.getElementById('photo_galerie');
        let fn = document.getElementById('photo_galerie-total');
        function FileDetails() {
            // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
            if (fi.files.length == 1) {
                fn.innerHTML = '<b>' + fi.files.item(0).name + '</b></br >';
                fn.classList.remove('is-hidden');
            } else if (fi.files.length > 1) {

                // THE TOTAL FILE COUNT.
                fn.innerHTML = 'Photos s??lectionn??es: <b>' + fi.files.length + '</b></br >';

                // RUN A LOOP TO CHECK EACH SELECTED FILE.
                for (var i = 0; i <= fi.files.length - 1; i++) {

                    var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                    var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                    console.log(fname);
                    console.log(fsize);
                    // SHOW THE EXTRACTED DETAILS OF THE FILE.
                    /*document.getElementById('photo_galerie-total').innerHTML =
                        document.getElementById('photo_galerie-total').innerHTML + '<br /> ' +
                        fname + ' (<b>' + fsize + '</b> bytes)';*/
                    fn.classList.remove('is-hidden');
                }
            } else {
                alert('Veuillez s??lectionner un fichier.')
            }
        }

        fi.addEventListener('change',(e)=>{
            e.preventDefault();
            FileDetails();
        });
    </script>
@endsection
