@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profil korisnika - {{$user->name}}</div>

                    <div class="card-body">



                            <div class="container bootstrap snippet">

                                    <div class="row">
                                        <div class="col-sm-3">

                                                <div class="text-center">
                                                    <img src="/uploads/avatar/{{ $user->avatar }}" class="avatar img-circle img-thumbnail" alt="avatar">

                                                </div>

                                                <p class= "text-center social-media-links">
                                <a href="{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $user->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a href="{{ $user->youtube}}" target="_blank"><i class="fa fa-youtube-square"></i></a>
                            </p>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Social Media</div>

                                                </div>


                                                <ul class="list-group">
                                                    <li class="list-group-item text-muted">Aktivnost </li>
                                                    <li class="list-group-item text"><span class="pull-left"><strong>Broj albuma: </strong>{{ $albums->count() }}</span>
                                                    </li>
                                                    <li class="list-group-item text"><span class="pull-left"><strong>Broj pjesama: </strong>{{ $photos->count() }}</span></li>

                                                </ul>
                                                    <br>

                                                <a href="{{ route('profile.edit',$user) }}"> <button type="button" class="btn btn-primary float-left">Uredite profil</button></a>

                                        </div>

                                        <div class="col-sm-9">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="home">
                                                    <hr>
                                                    <form class="form" action="##" method="post" id="registrationForm">
                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="name" class="col-md-3 col-form-label text">Ime:</label>
                                                                <label for="name" class="col-md-6 col-form-label text-md-left">{{$user->name}}  </label>

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="last_name" class="col-md-3 col-form-label text">Prezime:</label>
                                                                <label for="last_name" class="col-md-6 col-form-label text-md-left">{{$user->last_name}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="email" class="col-md-3 col-form-label text">Email:</label>
                                                                <label for="email" class="col-md-6 col-form-label text-md-left">{{$user->email}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="about" class="col-md-3 col-form-label text">Opis:</label>
                                                                <label for="about" class="col-md-6 col-form-label text-md-left">{{$user->about}}</label>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                            </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
