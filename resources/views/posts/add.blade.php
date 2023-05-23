@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Ajout d'un article</div>
            <div class="panel-body">
                <form method="POST" action="{{ route('post.store') }}">
                    @csrf
                    <div class="form-group {{ $errors->has('titre') ? 'has-error' : '' }}">
                        <input type="text" name="titre" class="form-control" placeholder="Titre" value="{{ old('titre') }}">
                        {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('contenu') ? 'has-error' : '' }}">
                        <textarea name="contenu" class="form-control" placeholder="Contenu">{{ old('contenu') }}</textarea>
                        {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                    </div>
                    <button type="submit" class="btn btn-info pull-right">Envoyer !</button>
                </form>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection
