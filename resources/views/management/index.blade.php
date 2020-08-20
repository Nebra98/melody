@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pregled albuma i glezbe</div>

                    <div class="card-body">

                        <div class="alert alert-primary" role="alert">
                            Napomena, <br>
                            Brisanjem albuma, brišete sve pjesme koje se nalaze u njemu.
                        </div>

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
                                    <td scope="row">{{ $album->id }}</td>
                                    <td> <a href="{{ url('albums/' . $album->id) }}">  {{ $album->name }} </a></td>

                                    <td>

                                        <table>

                                        @foreach($photos as $photo)
                                           @if($album->id == $photo->album_id)

                                                    <tr>
                                                        <td>{{ $photo->songName }}</td>
                                                        <td>
                                                            @php($zastavica = 0)
                                                            <form action="{{ route('photos.destroy', $photo, $user, 0) }}" method="POST" class="float-left">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button type="submit" class="btn btn-warning">Izbriši pjesmu</button>
                                                            </form>
                                                        </td>
                                                    </tr>


                                            @endif
                                        @endforeach

                                        </table>


                                    </td>



                                    <td>

                                            <form action="{{ route('albums.destroy', $album) }}" method="POST" class="float-left">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Izbriši Album</button>
                                            </form>

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
