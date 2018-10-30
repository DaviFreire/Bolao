<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class Campeonato extends Model
{
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}
