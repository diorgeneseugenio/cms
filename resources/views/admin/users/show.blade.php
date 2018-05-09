@extends('admin.layouts.app')

@section('content')

    @php
        $linkEdit = route('admin.users.edit', ['user' => $user->id]);
        $linkDelete = route('admin.users.destroy', ['user' => $user->id]);
        $linkList = route('admin.users.index');

        $formDelete = FormBuilder::plain([
            'id' => 'form-delete',
            'url' => $linkDelete,
            'method' => 'DELETE',
            'style' => 'display:none'
        ])
    @endphp

    <div class="row">
        <div class="col-md-8">
            <h3 class="title-route">{!! Icon::search() !!} Detalhes de Usuário</h3>
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
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th scope="row">Nome.</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th scope="row">E-mail</th>
                <td>{{ $user->email }}</td>
            </tr>
        </table>
    </div>
@endsection