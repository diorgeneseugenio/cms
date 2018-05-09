<?php

namespace CMS\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class News extends Model implements TableInterface
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'autor',
        'categoria',
        'data',
        'banner',
        'resumo',
        'conteudo',
        'ativo',
    ];

    public function getTableHeaders()
    {
        return [
            'Título',
            'Autor',
            'Categoria',
            'Data',
            'Ativo',
        ];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Título':
                return $this->titulo;
            case 'Autor':
                return $this->autor;
            case 'Categoria':
                return $this->categoria;
            case 'Data':
                return date("d/m/Y", strtotime($this->data));
            case 'Ativo':
                return $this->ativo;

        }
    }
}
