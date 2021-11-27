@extends('_layoutAdmin')


@section('title') Créer une galerie @endsection

@section('title-page') Choisir un client @endsection

@section('content')

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <section class="section section__table">

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
                        <a class="table__tr-btn" href="{{ route('addGallery', $client->id) }}"><i class="icon icon__add far fa-plus-square"></i></a>
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
        $(function() {

            $('#listeclients').DataTable({
                // On désactive la possibilité de trier le tableau via la colonne "actions"
                "columnDefs": [ {
                    "targets": 5,
                    "orderable": false
                } ]
            });
        });
    </script>
@endsection
