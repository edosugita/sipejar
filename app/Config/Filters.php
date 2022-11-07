<?php

namespace Config;

use App\Filters\AdFil;
use App\Filters\AuthFilter;
use App\Filters\NoAd;
use App\Filters\NoAuthFilter;
use App\Filters\Role2Filter;
use App\Filters\RoleFilter;
use App\Filters\UnoFilter;
use App\Filters\UrlFilter;
use App\Filters\UrlFilter2;
use App\Filters\UserFilter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'AuthFilter'    => AuthFilter::class,
        'NoAuthFilter'  => NoAuthFilter::class,
        'RoleFilter'    => RoleFilter::class,
        'Role2Filter'   => Role2Filter::class,
        'UserFilter'    => UserFilter::class,
        'UnoFilter'     => UnoFilter::class,
        'UrlFilter'     => UrlFilter::class,
        'UrlFilter2'    => UrlFilter2::class,
        'NoAd'          => NoAd::class,
        'AdFil'         => AdFil::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
