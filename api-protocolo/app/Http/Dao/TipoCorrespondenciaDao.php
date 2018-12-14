<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use Illuminate\Support\Facades\DB;

class TipoCorrespondenciaDao extends Dao
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public static function lista($obj) {
      return DB::select("SELECT categoriaCorrespondencia as tipoCorrespondencia, descricao, usuarioCriador FROM categoriasCorrespondencias WHERE
      descricao LIKE '%{$obj['busca']}%'
      AND ativo = 1 ORDER BY descricao LIMIT {$obj['inicio']}, {$obj['fim']}");
    }

    public static function seleciona($id) {
      return DB::select("SELECT categoriaCorrespondencia as tipoCorrespondencia, descricao, usuarioCriador FROM categoriasCorrespondencias WHERE categoriaCorrespondencia = {$id} AND ativo = 1");
    }

    public static function apaga($dados) {
      return DB::update("UPDATE categoriasCorrespondencias SET ativo = 0, usuarioAlterador = {$dados['usuarioAlterador']} WHERE categoriaCorrespondencia = {$dados['id']}");
    }

    public static function salva($dados) {
      return DB::insert("INSERT INTO categoriasCorrespondencias (descricao, status, usuarioCriador) values ('{$dados['descricao']}', {$dados['status']}, {$dados['usuarioCriador']})");
    }

    public static function altera($dados) {
      return DB::update("UPDATE categoriasCorrespondencias SET  descricao = '{$dados['descricao']}', usuarioAlterador = {$dados['usuarioAlterador']} where categoriaCorrespondencia = {$dados['tipoCorrespondencia']}");
    }

    //
}
