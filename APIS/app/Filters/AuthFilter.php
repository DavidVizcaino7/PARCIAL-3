<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        /*
        $session = session();
        $uri = service('uri');

        // Si no está logueado
        if (!$session->get('logueado')) {

            // Si la URL comienza con 'api/' devolvemos JSON 401
            if (strpos($uri->getPath(), 'api/') === 0) {
                $response = service('response');
                return $response->setStatusCode(401)
                    ->setJSON([
                        'status' => 401,
                        'message' => 'No autorizado - sesión requerida'
                    ]);
            }

            // Para rutas normales, redirige a login
            return redirect()->to(base_url('login'));
        }
        */
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita acción después de la respuesta
    }
}
