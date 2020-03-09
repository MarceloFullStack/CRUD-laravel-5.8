@extends('layouts.listLayout')
@section('lista')

    @foreach ($users as $item)

<li>{{$item->name}} <a class="btn btn-sm btn-danger" href="/usuarios/{{$item->id}}/delete">Deletar</a>
    <a class="btn btn-sm btn-warning" href="/usuarios/{{$item->id}}/editar">Editar</a>
</li>
    <li>{{$item->email}}</li>
    <hr>
    @endforeach
    @endsection



    @section('formulario')
<form action="/usuarios" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control mb-1" name="name" id=""aria-describedby="helpId"placeholder="Nome"/>

        <input type="email" class="form-control" name="email" id=""aria-describedby="helpId"placeholder="E-mail"/>
        <input type="password" class="form-control" name="senha" id=""aria-describedby="helpId"placeholder="Password"/>
        <button class="btn btn-dark mt-1" type="submit">
                Enviar <span class="badge badge-primary"></span>
        </button>
        <small id="helpId" class="form-text text-muted">MarceloGuimaraesDeveloper</small>
    </div>
</form>
@endsection




 @section('post')
@if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['senha']))
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>PassWord</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $_POST['name']  }}</td>
            <td>{{ $_POST['email'] }}</td>
            <td>{{ $_POST['senha'] }}</td>
        </tr>
        </tbody>
</table>

@endif
@endsection

@section('navBar')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@endsection
