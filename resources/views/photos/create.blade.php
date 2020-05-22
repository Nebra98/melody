@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <a href="{{ url('albums/' . $album_id) }}" class="button secondary">Natrag</a>
                    <h3 class="panel-heading"><div><h3>Prenesite novu pjesmu</h3></div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="songFile" class="col-md-4 control-label">Prenesite pjesmu:</label>
                                    <div class="col-md-6">
                                        <input id="songFile" type="file" class="form-control" name="songFile" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="songName" class="col-md-4 control-label">Nalov pjesme:</label>
                                    <div class="col-md-6">
                                        <input id="songName" type="text" class="form-control" name="songName" placeholder="Unesite ime pjesme" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="coverImage" class="col-md-4 control-label">Naslovna fotografija:</label>
                                    <div class="col-md-6">
                                        <input id="coverImage" type="file" class="form-control" name="coverImage" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="artistName" class="col-md-4 control-label">Ime autora:</label>
                                    <div class="col-md-6">
                                        <input id="artistName" type="text" class="form-control" name="artistName" placeholder="Unesite ime autora" required autofocus>
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
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection



