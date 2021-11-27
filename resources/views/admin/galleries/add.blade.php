@extends('_layoutAdmin')


@section('title') Créer une nouvelle galerie @endsection

@section('title-page') Créer une galerie @endsection

@section('content')
    <!-- contenu  -->

    <section class="section section__form">

        <div class="container">
            <form class="form" action="{{ route('addGallery', $client->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $client->id }}">
                <div class="notification is-white">
                    <h2 class="subtitle pb-3 ">Création d'une galerie pour <strong class="has-text-blue">{{ $client->last_name.' '.$client->first_name }}</strong>, ID client : <strong class="has-text-blue">{{ $client->id }}</strong></h2>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="number_photos" class="label">Nombre photos *</label>
                                <div class="control">
                                    <input id="number_photos" name="number_photos" class="input" type="text" placeholder="Nombre de photos défini dans le contrat" >
                                    @error('number_photos')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="link_zip" class="label">Link ZIP</label>
                                <div class="control">
                                    <input id="link_zip" name="link_zip" class="input" type="text" placeholder="www.photoshoot.be/&hellip;" >
                                    @error('link_zip')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body is-half">
                            <div class="field">
                                <label for="nom_galerie" class="label">Nom galerie *</label>
                                <div class="control">
                                    <input id="nom_galerie" name="nom_galerie" class="input" type="text" placeholder="Photos produits, Corporate, Mariage&hellip;" >
                                    @error('nom_galerie')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="type" class="label">Type de galerie *</label>
                                <div class="control">
                                    <input id="type" name="type" class="input" type="text" value="Privée" readonly>
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
                                <label for="description_galerie" class="label">Description galerie</label>
                                <div class="control">
                                    <textarea id="description_galerie" rows="2" class="textarea" placeholder="Description de la galerie" name="description_galerie"></textarea>
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
                                <label for="photo_galerie" class="label">Photo(s)</label>
                                <div class="control">
                                    <div class="file is-boxed">
                                        <label class="file-label">
                                            <input id="photo_galerie" class="file-input" type="file" name="photo_galerie[]" multiple required>
                                            <span class="file-cta">
                                          <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                          </span>
                                          <span class="file-label">
                                            Parcourir…
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
                </div>

                <div class="field is-horizontal">
                    <div class="field-label">
                        <a href="{{ route('getListeClients') }}" class="button is-danger is-outlined">Annuler</a>
                    </div>
                    <button class="button button--black" type="submit">Créer</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        "use strict";
        let fi = document.getElementById('photo_galerie');
        let fn = document.getElementById('photo_galerie-total');
        function FileDetails() {
            // GET THE FILE INPUT.
            // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
            if (fi.files.length == 1)
            {
                fn.innerHTML = '<b>' + fi.files.item(0).name + '</b></br >';
                fn.classList.remove('is-hidden');
            }

            else if (fi.files.length > 1) {

                // THE TOTAL FILE COUNT.
                fn.innerHTML = 'Photos sélectionnées: <b>' + fi.files.length + '</b></br >';

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

