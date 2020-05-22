@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="text-center">
            <a href="{{ route('albums.index') }}" class="button secondary">Nazad</a>
        </div>
    <hr>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <h3 class="panel-heading"><div><h3>Napravite novi album</h3></div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('albums.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Ime albuma:</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Ime albuma" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cover_image" class="col-md-4 control-label">Naslovna fotografija albuma:</label>
                                <div class="col-md-6">
                                    <input id="cover_image" type="file" class="form-control" name="cover_image" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" value="Create">
                                        Kreiraj album
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



