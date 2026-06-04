<?php

$source = dirname(__DIR__).'/bootstrap/app-router.php';
$content = file_get_contents($source);

if ($content === false) {
    fwrite(STDERR, "Could not read bootstrap/app-router.php\n");
    exit(1);
}

$targets = [
    dirname(__DIR__).'/server.php',
    dirname(__DIR__).'/vendor/laravel/framework/src/Illuminate/Foundation/resources/server.php',
];

foreach ($targets as $target) {
    $directory = dirname($target);

    if (! is_dir($directory)) {
        continue;
    }

    if (file_put_contents($target, $content) !== false) {
        echo "Restored: {$target}\n";
    }
}
