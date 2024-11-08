<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use HasFactory, HasApiTokens;

    // Especifique o nome da tabela
    protected $table = 'Usuarios'; // Nome da tabela no banco

    protected $primaryKey = 'idUsuarios';

    // Defina os campos que podem ser preenchidos
    protected $fillable = [
        'name',
        'email',
        'senha',  // Usando 'senha' em vez de 'password'
    ];

    // Especifique os campos que devem ser ocultados nas respostas JSON
    protected $hidden = [
        'senha',  // Usando 'senha' em vez de 'password'
    ];

    // Criptografa a senha ao salvar no banco de dados
    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }
}
