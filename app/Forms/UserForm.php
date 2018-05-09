<?php

namespace CMS\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');

        $this
            ->add("name", "text", [
                'label' => 'Nome',
                'rules' => "required"
            ])
            ->add("email","email", [
                'label' => 'E-mail',
                'rules' => "required|min:6|unique:users,email,{$id}"
            ]);
    }
}
