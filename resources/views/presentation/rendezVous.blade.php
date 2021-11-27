@extends('_layoutPresentation')
@section('title') Services @endsection

@section('content')
    <!-- contenu  -->
    @if($message = Session::get('success'))
        <div id="notificationSuccess" class="notification notification__success has-text-centered is-primary">
            {{ $message }}
        </div>
    @endif

    <section class="section section__rendezvous">
        <h3 class="title font-weight-bolder is-size-3 is-size-2-desktop is-uppercase is-center my-6 is-family-secondary">Réserver un
            photoshoot</h3>
        <div class="container">
            <form class="rendezvous" action="{{ route('reservationForm') }}" method="post">
                @csrf
                <div class="notification is-white">
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="first_name" class="label">Nom *</label>
                                <div class="control">
                                    <input id="first_name" name="first_name" class="input" type="text" placeholder="Smith, Wilson&hellip;" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="last_name" class="label">Prénom *</label>
                                <div class="control">
                                    <input id="last_name" name="last_name" class="input" type="text" placeholder="Alex, Khalil&hellip;"
                                           value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">

                        <div class="field-body is-half">
                            <div class="field">
                                <label for="phone" class="label">Téléphone *</label>
                                <div class="control">
                                    <input id="phone" name="phone" class="input" type="text" placeholder="+32xxxxxxxxx" value="{{ old('phone') }}">
                                    @error('phone')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="email" class="label">E-mail *</label>
                                <div class="control">
                                    <input id="email" name="email" class="input" type="text" placeholder="exemple@mail.com" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-body is-half">
                            <div class="field">
                                <label for="date" class="label">Date *</label>
                                <div class="control">
                                    <input id="date" type="date" name="date" class="input" value="{{Illuminate\Support\Carbon::now()->format('Y-m-d')}}">
                                    @error('date')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label for="heure" class="label">Heure *</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select id="heure" name="heure">
                                            <option selected disabled>Choisir l'heure&hellip;</option>
                                            <option>8:00</option>
                                            <option>9:00</option>
                                            <option>10:00</option>
                                            <option>11:00</option>
                                            <option>13:00</option>
                                            <option>14:00</option>
                                            <option>15:00</option>
                                            <option>16:00</option>
                                            <option>17:00</option>
                                        </select>
                                    </div>
                                    @error('heure')
                                    <p class="has-text-red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="desc" class="label">Commentaire</label>
                                <div class="control">
                                    <textarea id="desc" rows="3" class="textarea" placeholder="Commentaire, service souhaité&hellip;" name="commentaire">{{old('commentaire')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-right mt-5">
                        <p class="control">
                            <button class="button button--black font-weight-bolder" type="submit">Réserver</button>
                        </p>
                    </div>
                </div>

                {{--<div class="field is-horizontal">
                    <div class="field-label">
                        <button class="button button--black" type="submit">Réserver</button>
                    </div>
                </div>--}}
            </form>
        </div>
    </section>

@endsection

