@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h3 class="title-route">{!! Icon::thList() !!} Listagem de Usuários</h3>
        </div>
        <div class="col-md-4 text-right buttons-bar">
                {!! Button::normal('Incluir Usuário')->asLinkTo(route('admin.users.create')) !!}
        </div>
    </div>

    <div class="row">
        <hr />
    </div>

    <div class="row table-div">
        {!!
            Table::withContents($users->items())
                ->callback("Ações", function($field, $model){
                    $linkEdit = route('admin.users.edit', [" users" => $model->id]);
                    $linkShow = route('admin.users.show', [" users" => $model->id]);

                    $btnEdit = Button::primary(Icon::pencil())->asLinkTo($linkEdit);
                    $btnShow =Button::success(Icon::search())->asLinkTo($linkShow);

                    return $btnShow." ".$btnEdit;
                })
        !!}
        {!! $users->links() !!}
    </div>
@endsection