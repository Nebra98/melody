@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Pregled korinsika {{ $user->name }}</div>

                    <div class="card-body">


                        <div class="form-group">

                            <div class="col-xs-6">
                                <div class="col-sm-2 rounded float-right">
                                    <div>
                                        <img src="/uploads/avatar/{{ $user->avatar }}" class="rounded float-right img-circle img-thumbnail" alt="avatar">
                                        <label class="col-form-label text-center">Slika profila</label>

                                        <label class="col-form-label text">Broj albuma: {{ $albums->count() }}</label>
                                        <label class="col-form-label text">Broj pjesama: {{ $photos->count() }}</label>
                                    </div>

                                </div>

                                <label for="name" class="col-md-3 col-form-label text">Ime:</label>
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{$user->name}}  </label>

                                <label for="name" class="col-md-3 col-form-label text">Prezime:</label>
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{$user->last_name}}  </label>

                                <label for="name" class="col-md-3 col-form-label text">Email:</label>
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{$user->email}}  </label>

                                <label for="name" class="col-md-3 col-form-label text">Role:</label>
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{ implode(', ',  $user->roles()->get()->pluck('name')->toArray() )}}  </label>

                                <label for="name" class="col-md-3 col-form-label text">Facebook:</label>
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{$user->facebook}}  </label>

                                <label for="name" class="col-md-3 col-form-label text">Instagram:</label>
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{$user->instagram}}  </label>

                                <label for="name" class="col-md-3 col-form-label text">YouTube:</label>
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{$user->youtube}}  </label>

                                <label for="name" class="col-md-3 col-form-label text">Opis:</label>
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{$user->about}}  </label>


                            </div>
                        </div>
                        <div class="card-header"><b>Popis albuma i glazbe</b></div>
                        @can('delete-users')
                        <div class="alert alert-primary" role="alert">
                            Napomena, <br>
                            Brisanjem albuma korisnika, brišete sve pjesme koje se nalaze u njemu.
                        </div>
                        @endcan

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#Album id</th>
                                <th scope="col">Ime albuma</th>
                                <th scope="col">Glazba</th>
                                <th scope="col">Operacija</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($albums as $album)
                                <tr>
                                    <td scope="row"><b>{{ $album->id }} </b></td>
                                    <td> <span class="text-primary"><b> {{ $album->name }}</b></span> </td>

                                    <td>

                                        <table>

                                            @foreach($photos as $photo)
                                                @if($album->id == $photo->album_id)

                                                    <tr>
                                                        <td><span class="text-primary"><b>{{ $photo->songName }}</b></span>

                                                        </td>
                                                        <td>
                                                            @php($zastavica = 1)
                                                            @can('delete-users')
                                                            <form action="{{ route('photos.destroy', $photo, $user) }}" method="POST" class="float-left">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button type="submit" class="btn btn-warning">Izbriši pjesmu</button>
                                                            </form>
                                                                @endcan
                                                            @cannot('delete-users')
                                                                <i>Not Admin</i>
                                                                @endcan
                                                        </td>
                                                    </tr>


                                                @endif
                                            @endforeach

                                        </table>


                                    </td>



                                    <td>
                                        @can('delete-users')
                                        <form action="{{ route('albums.destroy', $album) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Izbriši Album</button>
                                        </form>
                                            @endcan

                                            @cannot('delete-users')
                                                <i>Not Admin</i>
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
