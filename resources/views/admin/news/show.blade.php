@extends('admin.layouts.app')

@section('content')

    @php
        $linkEdit = route('admin.news.edit', ['news' => $news->id]);
        $linkDelete = route('admin.news.destroy', ['news' => $news->id]);
        $linkList = route('admin.news.index');

        $formDelete = FormBuilder::plain([
            'id' => 'form-delete',
            'url' => $linkDelete,
            'method' => 'DELETE',
            'style' => 'display:none'
        ])
    @endphp

    <div class="row">
        <div class="col-md-8">
            <h3 class="title-route">{!! Icon::search() !!} Detalhes de Notícia</h3>
        </div>
        <div class="col-md-4 text-right buttons-bar">
            {!! Button::primary("Voltar ".Icon::arrowLeft())->asLinkTo($linkList) !!}
            {!! Button::primary("Editar ".Icon::pencil())->asLinkTo($linkEdit) !!}
            {!!
                Button::danger("Remover ".Icon::trash())
                    ->asLinkTo($linkDelete)
                    ->addAttributes([
                        'onclick' => "
                            event.preventDefault();
                            document.getElementById(\"form-delete\").submit();"
                    ])
            !!}

            {!! form($formDelete) !!}
        </div>
    </div>

    <div class="row">
        <hr />
    </div>

    <div class="row table-div">
        <table class="table table-bordered">
            <tr>
                <th scope="row">Cód.</th>
                <td>{{ $news->id }}</td>
            </tr>
            <tr>
                <th scope="row">Titulo.</th>
                <td>{{ $news->titulo }}</td>
            </tr>
            <tr>
                <th scope="row">Autor</th>
                <td>{{ $news->autor }}</td>
            </tr>
            <tr>
                <th scope="row">Categoria</th>
                <td>{{ $news->categoria }}</td>
            </tr>
            <tr>
                <th scope="row">Data</th>
                <td>{{ date("d/m/Y", strtotime($news->data)) }}</td>
            </tr>
            <tr>
                <th scope="row">Imagem</th>
                <td>{{ $news->banner }}</td>
            </tr>
            <tr>
                <th scope="row">Resumo</th>
                <td>{{ $news->resumo }}</td>
            </tr>
            <tr>
                <th scope="row">Conteúdo</th>
                <td>{{ $news->conteudo }}</td>
            </tr>
            <tr>
                <th scope="row">Ativo?</th>
                <td>{{ $news->ativo }}</td>
            </tr>
        </table>
    </div>
@endsection