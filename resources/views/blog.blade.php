@extends('layouts.app')

@section('content')

    <div class="box-news">
        <div class="row">
            @foreach($news as $n)
                <div class="col-md-4 col-sm-12 card-preview">
                    <article class="card">
                        <header class="cardThumb">
                            <a href="{{ route('noticia', ["id" => $n->id]) }}">
                                <img src="{{ URL::to('img/news/'.$n->id."/". $n->banner)  }}">
                            </a>
                        </header>
                        <div class="cardDate">
                            <span class="cardDateDay">{{ date("d", strtotime($n->data)) }}</span>
                            <span class="cardDateMonth">{{ date("M", strtotime($n->data)) }}</span>
                        </div>
                        <div class="cardBody">
                            <div class="cardCategory"><a href="{{ route('noticia', ["id" => $n->id]) }}">{{ $n->categoria }}</a></div>
                            <h2 class="cardTitle"><a href="{{ route('noticia', ["id" => $n->id]) }}">{{ $n->titulo }}</a></h2>
                            <div class="cardSubtitle">{{ $n->autor }}</div>
                            <p class="cardDescription">
                                {{ strip_tags($n->resumo) }}
                            </p>
                        </div>
                    </article>
                </div>
                @if ($loop->iteration % 3 == 0)
                </div>
                <div class="row">
                @endif
            @endforeach
        </div>
    </div>

@endsection