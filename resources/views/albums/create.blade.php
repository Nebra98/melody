@extends('layouts.app')


@section('content')
    <div class="container">
       <div class="text-center">
            <a href="{{ route('albums.index') }}" class="button secondary">Nazad</a>
        </div>
    <hr>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" class="text-center">Napravite novi album </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <form class="form-horizontal" method="POST" action="{{ route('albums.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group" >
                                    <label for="name" class="col-12">Ime albuma:</label>
                                    <div class="col-12">
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Ime albuma" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cover_image" class="col-12">Naslovna fotografija albuma:</label>
                                    <div class="col-12">
                                        <input id="cover_image" type="file" class="form-control" name="cover_image" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" value="Create">
                                            Napravi album
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div> </div>

                </div>
            </div>
        </div>


@endsection



