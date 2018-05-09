@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3 class="title-route">{!! Icon::plus() !!} Incluir Notícia</h3>
        </div>
    </div>

    <div class="row">
        <hr />
    </div>

    <div class="row form-div">
        {!!
            form(
                $form->add("insert", "submit", [
                    'attr' => [ 'class' => 'btn btn-primary' ],
                    'label' => 'Inserir'
                ])
            )
        !!}
    </div>
@endsection