<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
    'react' => [
        'version' => '19.1.0',
    ],
    'react-dom/client' => [
        'version' => '19.1.0',
    ],
    'scheduler' => [
        'version' => '0.26.0',
    ],
    'react-dom' => [
        'version' => '19.1.0',
    ],
    'axios' => [
        'version' => '1.9.0',
    ],
    'vite' => [
        'version' => '6.3.5',
    ],
    '@vitejs/plugin-react' => [
        'version' => '4.4.1',
    ],
];
