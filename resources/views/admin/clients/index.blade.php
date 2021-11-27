@extends('_layoutAdmin')


@section('title') Liste clients @endsection

@section('title-page') Gestion des clients @endsection

@if($message = Session::get('success'))
    <div id="notificationSuccess" class="notification notification__success has-text-centered is-primary">
        {{ $message }}
    </div>
@endif

@section('content')
    <section class="section section__table">
        <a href="{{ route('getFormClient') }}" class="button button__table button--black">
            <span class="icon">
              <i class="fas fa-plus"></i>
            </span>
            <span>Ajouter client</span>
        </a>
        <table id="listeclients" class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Galerie(s)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr class="table__tr">
                    <th>{{ $client->id }}</th>
                    <td> {{ $client->first_name }} </td>
                    <td> {{ $client->last_name }} </td>
                    <td> {{ $client->phone }} </td>
                    <td>
                        {{ $client->gallery()->count() }}
                    </td>
                    <!--SELECT COUNT(gallery_id) FROM gallery_user WHERE user_id=1-->
                    <td class="table__tr-action">
                        <a class="table__tr-btn" href="{{ route('updateClient', $client->id) }}">
                            <i class="icon icon__edit fas fa-edit"></i>
                        </a>
                        <!-- <a class="btn btn-info" href="">Supprimer</a> -->
                        <form id="form-{{$client->id}}" class="form form__delete" action="{{ route('destroyClient',$client->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$client->id}}">
                            <a class="table__tr-btn table__tr-btn--delete" onClick="showModal({{$client->id}})"><i class="icon icon__delete fas fa-trash-alt"></i></a>
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
                title: 'Supprimer un utilisateur',
                text: "Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible!",
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
            $('#listeclients').DataTable({
                //responsive: true,
                // On désactive la possibilité de trier le tableau via la colonne "actions"
                "columnDefs": [{
                    "targets": 5,
                    "orderable": false
                }]
            });
        });
    </script>
@endsection
