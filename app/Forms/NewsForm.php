<?php

namespace CMS\Forms;

use Illuminate\Routing\Route;
use Kris\LaravelFormBuilder\Form;



class NewsForm extends Form
{
    public function buildForm()
    {
        $ativo = $this->getData('ativo');

        $this
            ->add("titulo", "text", [
                'label' => 'Título',
                'rules' => "required|min:6"
            ])
            ->add("autor","text", [
                'label' => 'Autor',
                'rules' => "required|min:6"
            ])
            ->add("categoria","text", [
                'label' => 'Categoria',
                'rules' => "required"
            ])
            ->add("data","date", [
                'label' => 'Data',
                'rules' => "required"
            ]);
        $route = \Illuminate\Support\Facades\Route::currentRouteName();
        if($route != "admin.news.edit") {
            $this->add("banner", "file", [
                'label' => 'Imagem'
            ]);
        }
        $this
            ->add("resumo","textarea", [
                'label' => 'Resumo',
                'rules' => "required"
            ])
            ->add("conteudo","textarea", [
                'label' => 'Conteúdo',
                'rules' => "required"
            ]);
        if($route != "admin.news.create") {
            $this->add('ativo', 'select', [
                'choices' => [
                    'Sim' => 'Sim',
                    'Não' => 'Não'
                ],
                'selected' => $ativo,
                'label' => 'Ativo?'
            ]);
        }
    }
}
