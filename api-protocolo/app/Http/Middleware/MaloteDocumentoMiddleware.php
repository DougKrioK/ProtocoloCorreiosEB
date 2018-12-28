<?php

namespace App\Http\Middleware;

use Closure;
use App\ChromePhp;
use App\Http\Controllers\ValidaPermissoesController;

class MaloteDocumentoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $permissoes = new ValidaPermissoesController($request);
      $method = $request->method();
      if ($method == 'GET') {
        $permissao = $permissoes->abrir('maloteDocumento');
      } else if ($method == 'POST') {
        $permissao = $permissoes->inserir('maloteDocumento');
      } else if ($method == 'PUT') {
        $permissao = $permissoes->alterar('maloteDocumento');
      } else if ($method == 'DELETE') {
        $permissao = $permissoes->excluir('maloteDocumento');
      }

      if ($permissao) {
        return $next($request);
      } else {
        return response()->json([
          'error' => 'Seu grupo de usuario não tem permissao para esta operacao'
        ], 403);
      }
    }
}
