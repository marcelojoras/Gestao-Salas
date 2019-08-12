<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = ['name','localization','is_reserved'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'salas';
}
