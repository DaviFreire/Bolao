<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Campeonato extends Model
{
    use SoftDeletes;
	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao', 'dt_inicial', 'dt_final', 'owner_id', 'ativo'
    ];

    protected $dates = ['deleted_at'];
}
