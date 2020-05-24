<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // constantes
    const MARITAL_STATUS = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado'
    ];

    const TYPE_INDIVIDUAL = 'individual';
    const TYPE_LEGAL = 'legal';

    // adicionado para mass assignment
    protected $fillable = [
        'name',
        'document_number',
        'email',
        'phone',
        'defaulter',
        'date_birth',
        'sex',
        'marital_status',
        'physical_disability'
    ];

    public static function getClientType($type)
    {
        return $type == Client::TYPE_LEGAL ? $type : Client::TYPE_INDIVIDUAL;
    }


}
