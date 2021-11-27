@extends('_layoutAdmin')


@section('title') Créer un article @endsection

@section('title-page') Créer un article @endsection

@section('content')
    <!-- contenu  -->

    <section class="section section__form">
        <div class="container">
            <form class="form" action="{{ route('updateArticle', $article->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="notification is-white">
                    <div class="field is-horizontal">
                        <div class="field-body is-half">
                            <div class="field">
                                <label for="title" class="label">Titre *</label>
                                <div class="control">
                                    <input id="title" name="title" class="input" type="text" value="{{ old('title') ?? $article->title }}">
                                    @error('title')
                                    <p class="is-size-6 has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="inputMetadescirption" class="label">Méta Description *</label>
                                <div class="control">
                                    <input id="inputMetadescirption" maxlength="165" name="meta_description" class="input" type="text" value="{{ old('meta_description') ?? $article->meta_description }}">
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
                                            @if($article->published == 0)
                                                <option value="0">Non publié</option>
                                                <option value="1">Publié</option>
                                            @else
                                                <option value="1">Publié</option>
                                                <option value="0">Non publié</option>
                                            @endif
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
                        <div class="field-body">
                            <div class="field">
                                <label class="label" for="cover_photo">Photo de couverture</label>
                                <div class="control">
                                    <div class="miniature">
                                        <div class="miniature__liste">
                                            <div class="miniature__el">
                                                <img class="miniature__el-image image is-128x128"
                                                     src="{{ asset('/storage/'.$article->cover_photo) }}"
                                                     alt="studio_32_{{ $article->title }}"/>
                                            </div>
                                            <div class="miniature__el">
                                                <div class="file is-boxed">
                                                    <label class="file-label">
                                                        <input id="cover_photo" class="file-input" type="file" name="cover_photo">
                                                        <span class="file-cta">
                                                          <span class="file-icon">
                                                            <i class="fas fa-upload"></i>
                                                          </span>
                                                          <span class="file-label">
                                                            Parcourir…
                                                          </span>
                                                        </span>
                                                        <span id="cover_photo-name"
                                                              class="@if(is_null($article->cover_photo)) is-hidden @endif file-name"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
                                        <textarea name="content_text" id="content" cols="30" rows="10">{{ $article->content_text }}</textarea>
                                    </div>
                                    @error('content_text')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label">
                        <a href="{{ route('indexBlog') }}" class="button is-danger is-outlined">Annuler</a>
                    </div>
                    <button class="button is-dark" type="submit">Modifier</button>
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

        var fl = document.getElementById('cover_photo-name');

        @if($article->cover_photo)

        let cover_photo = '{{ $article->cover_photo }}';
        cover_photo = cover_photo.slice(8);
        fl.innerHTML = cover_photo;
        @endif

        let fi = document.getElementById('cover_photo');
        function FileDetails() {
            if (fi.files.length === 1) {
                for (var i = 0; i <= fi.files.length - 1; i++) {
                    var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                    fl.innerHTML = fname;
                }
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
