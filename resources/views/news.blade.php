@extends('layouts.app')

@section('content')

    <div class="box-news">

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="/">Voltar</a>
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12 box-detail-news">
                @foreach($news as $n)
                    <h1 class="news-title">{{ $n->titulo }}</h1>
                    <h4 class="news-sub">{!! $n->resumo !!}</h4>
                    <hr />
                    <h5 class="news-author"> {{ $n->autor }} - {{  date("d/m/Y", strtotime($n->data))  }}</h5>
                    <div class="news-content">
                        {!!   $n->conteudo !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection