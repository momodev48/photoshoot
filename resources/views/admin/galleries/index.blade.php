@extends('_layoutAdmin')


@section('title') Liste clients @endsection

@section('title-page') Galeries privées @endsection


@if($message = Session::get('success'))
    <div id="notificationSuccess" class="notification notification__success has-text-centered is-primary">
        {{ $message }}
    </div>
@endif

@section('content')
    <section class="section section__table">
        <a href="{{ route('getListeClients') }}" class="button button__table button--black">
            <span class="icon">
              <i class="fas fa-plus"></i>
            </span>
            <span>Créer une galerie</span>
        </a>
        <table id="listegalleries" class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date Création</th>
                <th>Nombre photos</th>
                <th>Sélection</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($galleries as $gallery)
                <tr class="table__tr">

                    <th>{{ $gallery->id }}</th>
                    <td> {{ $gallery->user->first_name }} </td>
                    <td> {{ $gallery->user->last_name }} </td>
                    <td> {{ $gallery->created_at }} </td>
                    <td> {{ $gallery->media()->count() }} </td>
                    <td>
                        @if($gallery->selection_lock==0)
                            <div class="has-text-orange">En cours</div>
                        @else
                            <div class="has-text-green">Terminée</div>
                        @endif

                    </td>
                    <!--SELECT COUNT(gallery_id) FROM gallery_user WHERE user_id=1-->
                    <td class="table__tr-action">
                        <a class="table__tr-btn" href="{{ route('updateGallery', $gallery->id) }}"><i
                                class="icon icon__edit fas fa-edit"></i></a>
                        <!-- <a class="btn btn-info" href="">Supprimer</a> -->
                        <form id="form-{{$gallery->id}}" class="form form__delete"
                              action="{{ route('destroyGallery',$gallery->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$gallery->id}}">
                            <a class="table__tr-btn table__tr-btn--delete" onclick="showModal({{$gallery->id}})"><i
                                    class="icon icon__delete fas fa-trash-alt"></i></a>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection

@section('script')
    <script>
        "use strict";

        function showModal(id) {
            Swal.fire({
                title: 'Supprimer cette galerie',
                text: "Êtes-vous sûr de vouloir supprimer cette galerie ? Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007CBA',
                cancelButtonColor: '#1F1F1F',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                // Si le button "oui" a été cliqué
                if (result.isConfirmed) {
                    //Alors on soumet le formulaire avec l'ID du client
                    document.getElementById('form-' + id).submit();
                }
            })
        }

        $(function () {
            $('#listegalleries').DataTable({
                // On désactive la possibilité de trier le tableau via la colonne "actions"
                "columnDefs": [{
                    "targets": 5,
                    "orderable": false
                }]
            });
        });
    </script>
@endsection

