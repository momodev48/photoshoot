@extends('_layoutAdmin')


@section('title') Créer un article @endsection

@section('title-page') Créer un article @endsection

@section('content')
    <!-- contenu  -->

    <section class="section section__form">
        <div class="container">
            <form class="form" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="notification is-white">
                    <div class="field is-horizontal">
                        <div class="field-body is-half">
                            <div class="field">
                                <label for="title" class="label">Titre *</label>
                                <div class="control">
                                    <input required id="title" name="title" class="input" type="text" placeholder="Indiquer le titre" value="{{ old('title') }}">
                                    @error('title')
                                    <p class="is-size-6 has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="inputMetadescirption" class="label">Méta Description *</label>
                                <div class="control">
                                    <input required id="inputMetadescirption" maxlength="165" name="meta_description" class="input" type="text" placeholder="Indiquez la méta-description" value="{{ old('meta_description') }}">
                                    <p class="is-6">Il vous reste <span class="has-text-red" id="inputMetadescirptionCaracteres"></span></p>
                                    @error('meta_description')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-body is-half">
                            <div class="field">
                                <label for="published" class="label">Etat *</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select id="published" name="published">
                                            <option value="1">Publié</option>
                                            <option value="0">Non publié</option>
                                        </select>
                                    </div>
                                    @error('published')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-body is-half">
                            <div class="field">
                                <label class="label" for="cover_photo">Photo de couverture *</label>
                                <div class="control">
                                    <div class="file is-boxed">
                                        <label class="file-label">
                                            <input id="cover_photo" class="file-input" type="file" name="cover_photo" required>
                                            <span class="file-cta">
                                          <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                          </span>
                                          <span class="file-label">
                                            Parcourir…
                                          </span>
                                        </span>
                                            <span id="cover_photo-name" class="is-hidden file-name"></span>
                                            {{--<button class="button" onclick="FileDetails()"></button>--}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="content" class="label">Contenu *</label>
                                <div class="control">
                                    <div class="is-fullwidth">
                                        <textarea name="content_text" id="content" cols="30" rows="10" placeholder="Indiquez votre texte">{{ old('content_text') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label">
                        <a href="{{ route('indexBlog') }}" class="button is-danger is-outlined">Annuler</a>
                    </div>
                    <button class="button is-dark" type="submit">Crée l'article</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        "use strict";
        //compter caracteres
        let inputMetadescription = document.getElementById('inputMetadescirption');
        let inputMetadescirptionCaracteres = document.getElementById('inputMetadescirptionCaracteres');
        inputMetadescirptionCaracteres.textContent = 165 - inputMetadescription.value.length + " caractères";
        inputMetadescription.addEventListener('input', (e) => {
            inputMetadescirptionCaracteres.textContent = 165 - inputMetadescription.value.length + " caractères";
        });

        ClassicEditor
            .create(document.querySelector('#content'), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'alignment',
                        'bold',
                        'italic',
                        'fontColor',
                        'fontSize',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'indent',
                        'outdent',
                        '|',
                        'CKFinder',
                        'imageUpload',
                        'imageInsert',
                        'blockQuote',
                        'horizontalLine',
                        'insertTable',
                        'mediaEmbed',
                        'removeFormat',
                        'undo',
                        'redo'
                    ]
                },
                language: 'fr',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side',
                        'linkImage'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',

            })
            .then(editor => {
                window.editor = editor;

            })
            .catch(error => {
                console.error(error);
            });

        // GET THE FILE INPUT.
        let fi = document.getElementById('cover_photo');
        let fn = document.getElementById('cover_photo-name');
        function FileDetails() {
            // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
            if (fi.files != 0) {
                fn.innerHTML = '<b>' + fi.files.item(0).name + '</b></br >';
                fn.classList.remove('is-hidden');
            } else {
                alert('Veuillez sélectionner un fichier.')
            }
        }

        fi.addEventListener('change',(e)=>{
            e.preventDefault();
            FileDetails();
        });
    </script>
@endsection

