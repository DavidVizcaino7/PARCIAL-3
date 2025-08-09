<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\AuthFilter;  // Importa tu filtro AuthFilter

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'auth'          => AuthFilter::class,
    ];

    public array $globals = [
        'before' => [
            // No aplicar 'auth' globalmente para no bloquear API
            //'auth',
            //'csrf',
            //'honeypot',
            //'invalidchars',
        ],
        'after' => [
            //'honeypot',
            //'secureheaders',
            'toolbar',
        ],
    ];

    public array $methods = [];

    public array $filters = [
        'auth' => [
            'before' => [
                // Rutas web protegidas (ajusta según tu app)
                'zapatos/*',
                'vestidos/*',
                'carteras/*',
                'bienvenido',
                // otras rutas que quieras proteger
            ],
        ],
    ];
}
