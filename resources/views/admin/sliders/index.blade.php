@extends('_layoutAdmin')


@section('title') Liste sliders @endsection

@section('title-page') Gestion des sliders @endsection

@if($message = Session::get('success'))
    <div id="notificationSuccess" class="notification notification__success has-text-centered is-primary">
        {{ $message }}
    </div>
@endif

@section('content')
    <section class="section section__table">
        <a href="{{ route('getFormSlider') }}" class="button button__table button--black">
            <span class="icon">
              <i class="fas fa-plus"></i>
            </span>
            <span>Ajouter un slider</span>
        </a>
        <table id="listesliders" class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Description</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $slider)
                <tr class="table__tr">
                    <th>{{ $slider->id }}</th>
                    <td> {{ $slider->name }} </td>
                    <td> {{ $slider->type }} </td>
                    <td> {{ $slider->desc }} </td>
                    <td> {{ $slider->created_at }} </td>

                    <!--SELECT COUNT(gallery_id) FROM gallery_user WHERE user_id=1-->
                    <td class="table__tr-action">
                        <a class="table__tr-btn" href="{{ route('updateSlider', $slider->id) }}"><i class="icon icon__edit fas fa-edit"></i></a>
                        <!-- <a class="btn btn-info" href="">Supprimer</a> -->
                        <form id="form-{{$slider->id}}" class="form form__delete" action="{{ route('destroySlider',$slider->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$slider->id}}">
                            <a class="table__tr-btn table__tr-btn--delete" onClick="showModal({{$slider->id}})"><i class="icon icon__delete fas fa-trash-alt"></i></a>
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
                title: 'Supprimer un slider',
                text: "Êtes-vous sûr de vouloir supprimer cet slider ? Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007CBA',
                cancelButtonColor: '#1F1F1F',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                // Si le button "oui" a été cliqué
                if(result.isConfirmed) {
                    //Alors on soumet le formulaire avec l'ID du slider
                    document.getElementById('form-'+id).submit();
                }
            })
        }

        $(function() {
            $('#listesliders').DataTable({
                // On désactive la possibilité de trier le tableau via la colonne "actions"
                "columnDefs": [ {
                    "targets": 5,
                    "orderable": false
                } ]
            });
        });
    </script>


@endsection
