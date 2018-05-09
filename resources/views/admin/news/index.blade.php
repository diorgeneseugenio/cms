@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h3 class="title-route">{!! Icon::thList() !!} Listagem de Notícias</h3>
        </div>
        <div class="col-md-4 text-right buttons-bar">
                {!! Button::normal('Incluir Notícia')->asLinkTo(route('admin.news.create')) !!}
        </div>
    </div>

    <div class="row">
        <hr />
    </div>

    <div class="row table-div">
        {!!
            Table::withContents($news->items())
                ->callback("Ações", function($field, $model){
                    $linkEdit = route('admin.news.edit', [" news" => $model->id]);
                    $linkShow = route('admin.news.show', [" news" => $model->id]);

                    $btnEdit = Button::primary(Icon::pencil())->asLinkTo($linkEdit);
                    $btnShow =Button::success(Icon::search())->asLinkTo($linkShow);

                    return $btnShow." ".$btnEdit;
                })
        !!}
        {!! $news->links() !!}
    </div>
@endsection