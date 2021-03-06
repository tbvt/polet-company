<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Black listed IP  addresses
    |--------------------------------------------------------------------------
    |
    */
    'blacklist'  => [
        // '127.0.0.1',
    ],

    /*
    |--------------------------------------------------------------------------
    | White listed IP addresses,
    |--------------------------------------------------------------------------
    |
    */
    'whitelist'  => [
        // '127.0.0.2',
    ],

    /*
    |--------------------------------------------------------------------------
    | File extensions that will be scanned
    |--------------------------------------------------------------------------
    |
    */
    'extensions' => [
        '.ph',
        '.php',
        '.php3',
        '.phtml',
        '.htm',
        '.htm',
        '.html',
        '.txt',
        '.js',
        '.pl',
        '.cgi',
        '.py',
        '.bash',
        '.sh',
        '.xml',
        '.ssi',
        '.inc',
        '.pm',
        '.tpl',
    ],

    /*
    |--------------------------------------------------------------------------
    | Typical signs of malicious scripts
    |--------------------------------------------------------------------------
    |
    */
    'signatures' => [
        'exec',
        'passthru',
        'system',
        'shell_exec',
        'popen',
        'proc_open',
        'pcntl_exec',
        'eval',
        'base64',
        'base64_decode',
        'assert',
        'preg_replace',
        'create_function',
        'include',
        'include_once',
        'require',
        'require_once',
        'ReflectionFunction',
    ],

];
