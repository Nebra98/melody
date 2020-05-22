@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Uredi korisnički profil: {{$user->name}}</div>

                    <div class="card-body">



                            <div class="container bootstrap snippet">

                                    <div class="row">
                                        <div class="col-sm-3">

                                                <div class="text-center">
                                                    <img src="/uploads/avatar/{{ $user->avatar }}" class="avatar img-circle img-thumbnail" alt="avatar">

                                                </div>


                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Trenutna slika profila</div>
                                                </div>

                                                    <br>

                                        </div>

                                        <div class="col-sm-9">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="home">
                                                    <hr>
                                                    <form class="form" action="{{ route('profile.update',$user) }}" method="post" enctype="multipart/form-data">
                                                        @method('PUT')
                                                        @csrf

                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="name" class="col-md-3 col-form-label text">Ime</label>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="last_name" class="col-md-3 col-form-label text">Prezime</label>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                                                @error('last_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="email" class="col-md-3 col-form-label text">Email</label>
                                                            </div>


                                                            <div class="col-md-7">
                                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autofocus>

                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="facebook" class="col-md-3 col-form-label text">Facebook</label>
                                                            </div>


                                                            <div class="col-md-7">
                                                                <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $user->facebook }}" autofocus>

                                                                @error('facebook')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="instagram" class="col-md-3 col-form-label text">Instagram</label>
                                                            </div>


                                                            <div class="col-md-7">
                                                                <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ $user->instagram }}" autofocus>

                                                                @error('instagram')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="youtube" class="col-md-3 col-form-label text">YouTube</label>
                                                            </div>


                                                            <div class="col-md-7">
                                                                <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{ $user->youtube }}" autofocus>

                                                                @error('youtube')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="avatar" class="col-md-6 col-form-label text">Prenesite novu sliku profila</label>
                                                            </div>


                                                            <div class="col-md-7">
                                                                <input type="file" id="avatar" name="avatar" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="col-xs-6">
                                                                <label for="about" class="col-md-3 col-form-label text">Opis:</label>

                                                                <div class="col-md-7">
                                                                    <textarea name="about" id="about" cols="6" rows="6" value="{{ $user->about}}"class="form-control">{{ $user->about}}</textarea>
                                                            </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6">
                                                            <div class="col-md-7">
                                                                <button type="submit" class="btn btn-primary">Izmijeni</button>
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
