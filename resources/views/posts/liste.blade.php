@extends('template')

@section('header')
    @if(Auth::check())
        <div class="btn-group pull-right">
            <a href="{{ route('post.create') }}" class="btn btn-info">Créer un article</a>
            <a href="{{ url('logout') }}" class="btn btn-warning">Deconnexion</a>
        </div>
    @else
        <a href="{{ url('login') }}" class="btn btn-info pull-right">Se connecter</a>
    @endif
@endsection

@section('contenu')
    @if(isset($info))
        <div class="row alert alert-info">{{ $info }}</div>
    @endif
    {!! $links !!}
    @foreach($posts as $post)
        <article class="row bg-primary">
            <div class="col-md-12">
                <header>
                    <h1>{{ $post->titre }}</h1>
                </header>
                <hr>
                <section>
                    <p>{{ $post->contenu }}</p>
                    @if(Auth::check() && Auth::user()->admin)
                        <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Vraiment supprimer cet article ?')">Supprimer cet article</button>
                        </form>
                    @endif
                    <em class="pull-right">
                        <span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }} le {{ $post->created_at->format('d-m-Y') }}
                    </em>
                </section>
            </div>
        </article>
        <br>
    @endforeach
    {!! $links !!}
@endsection
