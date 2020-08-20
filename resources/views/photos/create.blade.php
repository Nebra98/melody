@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="text-center">
            <a href="{{ url('albums/' . $album_id) }}" class="button secondary">Nazad</a>
        </div>
        <hr>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" class="text-center">Prenesite novu pjesmu </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <form class="form-horizontal" method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="artistName" class="col-12">Ime autora:</label>
                                    <div class="col-12">
                                        <input id="artistName" type="text" class="form-control" name="artistName" placeholder="Unesite ime autora" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="songName" class="col-12">Nalov pjesme:</label>
                                    <div class="col-12">
                                        <input id="songName" type="text" class="form-control" name="songName" placeholder="Unesite ime pjesme" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="songFile" class="col-12">Prenesite pjesmu:</label>
                                    <div class="col-12">
                                        <input id="songFile" type="file" class="form-control" name="songFile" required>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="coverImage"class="col-12">Prenesite naslovnu fotografiju:</label>
                                    <div class="col-12">
                                        <input id="coverImage" type="file" class="form-control" name="coverImage" required>
                                    </div>
                                </div>



                                <input type="hidden" name="album_id" value="{{$album_id}}">

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" value="Create">
                                            Prenesi pjesmu
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div> </div>

                </div>
            </div>
        </div>


    </div>
@endsection



