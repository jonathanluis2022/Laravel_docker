<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor'
    ];

    // consulta o nome ao banco , caso nao encontre , traga os nomes correspondentes  
    public function getProdutoPesquisar(string $search = '') 
    {
        $produto = $this->where(function ($query) use ($search) {
            if($search) {
                $query->where('nome', $search); // exite no bd !?
                $query->orWhere('nome', 'LIKE', "%{$search}%"); // exitindo quero q vem nesta condição
            } 
        })->get();

        return $produto ; 
    }
    
}
