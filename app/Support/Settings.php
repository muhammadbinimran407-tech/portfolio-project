<?php

namespace App\Support;

use Illuminate\Support\Facades\File;

class Settings
{
    protected static ?array $cache = null;

    protected static string $path = '';

    public static function defaults(): array
    {
        return [
            'site_name' => 'Muhammad Bin Imran',
            'site_title' => 'Muhammad Bin Imran — Full Stack Web Developer',
            'tagline' => 'Laravel · Go · REST APIs',
            'contact_email' => 'thinkcode@muhammadbinimran.online',
            'meta_title' => 'Muhammad Bin Imran | Laravel & Go Developer',
            'meta_description' => 'Full stack web developer specializing in Laravel, Go and REST APIs. Available for hire.',
            'og_image' => '',
            'maintenance_mode' => false,
            'footer_bio' => 'Full stack web developer building reliable Laravel and Go systems.',
            'copyright' => '© ' . date('Y') . ' Muhammad Bin Imran. All rights reserved.',
            'github' => 'https://github.com/muhammadbinimran407-tech',
            'linkedin' => 'https://www.linkedin.com/in/muhammadbinimran/',
            'twitter' => '',
        ];
    }

    public static function path(): string
    {
        if (self::$path === '') {
            self::$path = storage_path('app/settings.json');
        }
        return self::$path;
    }

    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }
        $data = [];
        if (File::exists(self::path())) {
            $raw = json_decode((string) File::get(self::path()), true);
            if (is_array($raw)) {
                $data = $raw;
            }
        }
        return self::$cache = array_merge(self::defaults(), $data);
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        $all = self::all();
        return array_key_exists($key, $all) ? $all[$key] : $default;
    }

    public static function set(array $values): array
    {
        $merged = array_merge(self::all(), $values);
        File::ensureDirectoryExists(dirname(self::path()));
        File::put(self::path(), json_encode($merged, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        self::$cache = null;
        return $merged;
    }
}
