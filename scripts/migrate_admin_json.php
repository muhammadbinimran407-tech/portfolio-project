<?php
// one-off migration script: php scripts/migrate_admin_json.php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

$map = [
    'projects' => App\Models\Project::class,
    'skills' => App\Models\Skill::class,
    'experience' => App\Models\Experience::class,
    'testimonials' => App\Models\Testimonial::class,
    'posts' => App\Models\Post::class,
    'blog' => App\Models\Post::class,
];

foreach ($map as $file => $class) {
    $path = __DIR__ . '/../storage/app/admin_' . $file . '.json';
    if (!file_exists($path)) {
        echo "no file for $file\n";
        continue;
    }
    $content = file_get_contents($path);
    $rows = json_decode($content, true) ?: [];
    echo "Found " . count($rows) . " rows for $file\n";
    foreach ($rows as $r) {
        if (isset($r['id'])) {
            $exists = $class::find($r['id']);
            if ($exists) continue;
        }
        // normalize keys: match fillable attributes
        $instance = new $class();
        $fillable = $instance->getFillable();
        $data = array_filter($r, function($k) use ($fillable){ return in_array($k, $fillable); }, ARRAY_FILTER_USE_KEY);
        try {
            $class::create($data);
            echo "inserted {$r['id']}\n";
        } catch (Throwable $e) {
            echo "failed to insert id={$r['id']} : " . $e->getMessage() . "\n";
        }
    }
}

echo "done\n";
