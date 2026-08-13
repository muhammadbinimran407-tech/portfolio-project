<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;

class LaravelProjectsSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'NovaCart — E-Commerce Platform',
                'name' => 'NovaCart — E-Commerce Platform',
                'category' => 'Laravel',
                'description' => 'Full e-commerce platform with cart, Stripe checkout, order management, an admin dashboard and real-time stock tracking — Laravel 12 + Livewire + MySQL.',
                'tech' => 'Laravel, Livewire, MySQL, Stripe',
                'technologies' => 'Laravel, Livewire, MySQL, Stripe',
                'github' => 'https://github.com/muhammadbinimran407-tech/novacart',
                'demo' => 'https://novacart.example.com',
                'url' => 'https://novacart.example.com',
                'stars' => 214,
                'forks' => 38,
                'featured' => true,
                'status' => 'completed',
            ],
            [
                'title' => 'APIForge — REST API Engine',
                'name' => 'APIForge — REST API Engine',
                'category' => 'Laravel',
                'description' => 'Versioned REST API scaffold with Laravel Sanctum auth, rate limiting, API resource transformers, OpenAPI docs and Postman collection generation.',
                'tech' => 'Laravel, Sanctum, PostgreSQL, OpenAPI',
                'technologies' => 'Laravel, Sanctum, PostgreSQL, OpenAPI',
                'github' => 'https://github.com/muhammadbinimran407-tech/apiforge',
                'demo' => 'https://apiforge.example.com',
                'url' => 'https://apiforge.example.com',
                'stars' => 132,
                'forks' => 21,
                'featured' => true,
                'status' => 'completed',
            ],
            [
                'title' => 'TaskFlow — Team Task Manager',
                'name' => 'TaskFlow — Team Task Manager',
                'category' => 'Laravel',
                'description' => 'Real-time team task manager with kanban boards, notifications, roles and permissions. Laravel broadcasting powers live board updates.',
                'tech' => 'Laravel, Livewire, Alpine.js, Redis',
                'technologies' => 'Laravel, Livewire, Alpine.js, Redis',
                'github' => 'https://github.com/muhammadbinimran407-tech/taskflow',
                'demo' => 'https://taskflow.example.com',
                'url' => 'https://taskflow.example.com',
                'stars' => 96,
                'forks' => 17,
                'featured' => false,
                'status' => 'completed',
            ],
            [
                'title' => 'InertiaCMS — Laravel Content System',
                'name' => 'InertiaCMS — Laravel Content System',
                'category' => 'Laravel',
                'description' => 'Lightweight content management system built with Laravel + Inertia.js + Vue. Markdown editing, media library and role-based publishing.',
                'tech' => 'Laravel, Inertia.js, Vue, Tailwind',
                'technologies' => 'Laravel, Inertia.js, Vue, Tailwind',
                'github' => 'https://github.com/muhammadbinimran407-tech/inertiacms',
                'demo' => 'https://inertiacms.example.com',
                'url' => 'https://inertiacms.example.com',
                'stars' => 78,
                'forks' => 12,
                'featured' => false,
                'status' => 'completed',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['title' => $project['title']], $project);
        }

        $skills = [
            ['name' => 'Laravel', 'group' => 'Backend', 'pct' => 95],
            ['name' => 'Livewire', 'group' => 'Frontend', 'pct' => 80],
            ['name' => 'MySQL', 'group' => 'Database', 'pct' => 88],
            ['name' => 'REST APIs', 'group' => 'Backend', 'pct' => 86],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }
    }
}
