<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Default Database Connection Name
      |--------------------------------------------------------------------------
      |
      | Here you may specify which of the database connections below you wish
      | to use as your default connection for all database work. Of course
      | you may use many connections at once using the Database library.
      |
     */

    'default' => env('DB_CONNECTION', 'mysql'),
    /*
      |--------------------------------------------------------------------------
      | Database Connections
      |--------------------------------------------------------------------------
      |
      | Here are each of the database connections setup for your application.
      | Of course, examples of configuring each database platform that is
      | supported by Laravel is shown below to make development simple.
      |
      |
      | All database work in Laravel is done through the PHP PDO facilities
      | so make sure you have the driver for your particular database of
      | choice installed on your machine before you begin development.
      |
     */
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
        'reportesmensajeros' => [
            'driver' => 'mysql',
            'host' => env('REPORTESMENSAJEROS_HOST', 'localhost'),
            'port' => env('REPORTESMENSAJEROS_PORT', '3306'),
            'database' => env('REPORTESMENSAJEROS_DATABASE', 'forge'),
            'username' => env('REPORTESMENSAJEROS_USERNAME', 'forge'),
            'password' => env('REPORTESMENSAJEROS_PASSWORD', ''),
            'unix_socket' => env('REPORTESMENSAJEROSS_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
        'mu_domicilios' => [
            'driver' => 'mysql',
            'host' => env('MU_DOMICILIOS_HOST', 'domiciliosurbanos.com'),
            'port' => env('MU_DOMICILIOS_PORT', '3306'),
            'database' => env('MU_DOMICILIOS_DATABASE', 'mu_domicilios'),
            'username' => env('MU_DOMICILIOS_USERNAME', 'joseluis'),
            'password' => env('MU_DOMICILIOS_PASSWORD', '597b9050653f3'),
            'unix_socket' => env('MU_DOMICILIOS_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
        'mensajeros' => [
            'driver' => 'mysql',
            'host' => env('MENSAJEROS_HOST', 'readmu.cu6dmpy5uhbo.us-west-2.rds.amazonaws.com'),
            'port' => env('MENSAJEROS_PORT', '3306'),
            'database' => env('MENSAJEROS_DATABASE', 'mensajeros'),
            'username' => env('MENSAJEROS_USERNAME', 'joseluis'),
            'password' => env('MENSAJEROS_PASSWORD', 'mensajeros123'),
            'unix_socket' => env('MENSAJEROS_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
    ],
    /*
      |--------------------------------------------------------------------------
      | Migration Repository Table
      |--------------------------------------------------------------------------
      |
      | This table keeps track of all the migrations that have already run for
      | your application. Using this information, we can determine which of
      | the migrations on disk haven't actually been run in the database.
      |
     */
    'migrations' => 'migrations',
    /*
      |--------------------------------------------------------------------------
      | Redis Databases
      |--------------------------------------------------------------------------
      |
      | Redis is an open source, fast, and advanced key-value store that also
      | provides a richer set of commands than a typical key-value systems
      | such as APC or Memcached. Laravel makes it easy to dig right in.
      |
     */
    'redis' => [
        'client' => 'predis',
        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],
    ],
];
