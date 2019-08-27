<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ator extends Model
{
    protected $table = 'atores';
    protected $primaryKey = 'id';
    protected $fillable = ['nome'];    

    public function filmes(){
        $this->hasMany(Filme::class, 'id_protagonista', 'id');
    }
}
