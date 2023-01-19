<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root'   => storage_path('app'),
        ],
        
        'public' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public'),
            'url'        => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],
        'employer' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\employer'),
            'url'        => env('APP_URL') . '/storage/employer',
            'visibility' => 'public',
        ],
        'gallery' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\gallery'),
            'url'        => env('APP_URL') . '/storage/gallery',
            'visibility' => 'public',
        ],
        'videos' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\videos'),
            'url'        => env('APP_URL') . '/storage/videos',
            'visibility' => 'public',
        ],
        'sponsers' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\sponsers'),
            'url'        => env('APP_URL') . '/storage/sponsers',
            'visibility' => 'public',
        ],
        'contestants' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\contestants'),
            'url'        => env('APP_URL') . '/storage/contestants',
            'visibility' => 'public',
        ],
        'original' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\original'),
            'url'        => env('APP_URL') . '/storage/original',
            'visibility' => 'public',
        ],
        'applicant_image' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\applicant_image'),
            'url'        => env('APP_URL') . '/storage/applicant_image',
            'visibility' => 'public',
        ],
        'applicant_cv' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\applicant_cv'),
            'url'        => env('APP_URL') . '/storage/applicant_cv',
            'visibility' => 'public',
        ],
        'blog' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\blog'),
            'url'        => env('APP_URL') . '/storage/blog',
            'visibility' => 'public',
        ],
        'advertisement-copy' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\advertisement-copy'),
            'url'        => env('APP_URL') . '/storage/advertisement-copy',
            'visibility' => 'public',
        ],
        'website-pdf' => [
            'driver'     => 'local',
            'root'       => storage_path('app\public\website-url'),
            'url'        => env('APP_URL') . '/storage/website-url',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key'    => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],

    ],

];
