@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Popis albuma</div>
    @if($albums)

        <div id="albums">
            <div class="grid-x text-center">
                @foreach($albums as $album)
                    @if($album->user_id == Auth::user()->id)
                        <br>

                            <div class="card flex-row flex-wrap">
                                <div class="card-header border-0">
                                    <img src="/uploads/albums_photos/{{$album->cover_image}}" width="200" height="200" alt="{{$album->name}}" class="thumbnail">
                                </div>
                                <div class="card-block px-2">
                                    <br>
                                    <h4 class="card-title">{{$album->name}}</h4>
                                    @php($count=0)
                                    @foreach($photos as $photo)
                                        @if($album->id == $photo->album_id)
                                            @php(++$count)
                                        @endif()
                                    @endforeach
                                    <label class="col-form-label text">Broj pjesama: {{ $count  }}</label>
                                    <br>
                                    <a href="{{ url('albums/' . $album->id) }}" class="btn btn-primary">Pogledaj album</a>
                                </div>
                                <div class="w-100"></div>

                            </div>
                            <br>



                    @endif
                @endforeach
            </div>

        </div>
    @else
        <p>No Albums to display</p>
    @endif
                    </div>
                </div>
            </div>

    </div>

@endsection
