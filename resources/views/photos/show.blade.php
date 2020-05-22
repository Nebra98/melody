@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Album view Panel</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="row">
                                @foreach($files as $file)

                                        <div class="col-12">
                                            <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                                                <div class="song-thumbnail">
                                                    <img src="/uploads/songs_and_cover_images/{{ $file->coverImage }} " alt="">
                                                </div>
                                                <div class="song-play-area">
                                                    <div class="song-name">
                                                        <p>01. {{$file->artistName}} - {{$file->songName}}</p>
                                                    </div>
                                                    <audio preload="auto" controls>
                                                        <source src="/uploads/songs_and_cover_images/{{ $file->songFile }} ">
                                                    </audio>
                                                </div>
                                            </div>
                                        </div>

                                @endforeach
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
