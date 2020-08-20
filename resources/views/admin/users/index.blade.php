@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pregled svih korisnika</div>

                    <div class="card-body">

                        @can('delete-users')
                        <div class="alert alert-primary" role="alert">
                            Napomena, <br>
                            Brisanjem korisnika, brišete sve njegove albume i pjesme. <br>
                            Albume i pjesme mogu imati oni korisnicu koji imaju rolu 'user'.
                        </div>
                        @endcan
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">Ime</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Operacija</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(', ',  $user->roles()->get()->pluck('name')->toArray() )}}

                                    </td>
                                    <td>
                                        @can('edit-users')
                                            <a href="{{ route('admin.users.edit', $user->id) }}"> <button type="button" class="btn btn-primary float-left">Uredi</button></a>
                                            @php($aa = $user->roles()->get()->where('name', 'user')->pluck('name'))

                                            @if($aa == '["user"]')
                                                <a href="{{ route('information.show', $user) }}"> <button type="button" class="btn btn-info float-left">info</button></a>
                                            @endif
                                        @endcan

                                        @can('delete-users')

                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Izbriši</button>


                                        </form>


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
