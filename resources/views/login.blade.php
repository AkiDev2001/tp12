@extends('template')

@section('contenu')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Connexion</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Adresse email</label>
                            <div class="col-md-6">
                                <input type="email" id="email" name="email" class="form-control" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>
                            <div class="col-md-6">
                                <input type="password" id="password" name="password" class="form-control" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Se connecter</button>
                                <a href="{{ url('password/reset') }}">Mot de passe oublié ?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
