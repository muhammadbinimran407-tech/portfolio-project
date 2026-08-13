<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'group' => 'Primary', 'pct' => 95],
            ['name' => 'PHP', 'group' => 'Primary', 'pct' => 92],
            ['name' => 'Golang', 'group' => 'Primary', 'pct' => 90],
            ['name' => 'JavaScript', 'group' => 'Primary', 'pct' => 88],
            ['name' => 'REST APIs', 'group' => 'Primary', 'pct' => 93],
            ['name' => 'MySQL', 'group' => 'Secondary', 'pct' => 85],
            ['name' => 'Docker', 'group' => 'Secondary', 'pct' => 80],
            ['name' => 'Linux / Nginx', 'group' => 'Secondary', 'pct' => 78],
            ['name' => 'Redis', 'group' => 'Secondary', 'pct' => 72],
            ['name' => 'Tailwind CSS', 'group' => 'Secondary', 'pct' => 82],
        ];
        foreach ($skills as $skill) {
            Skill::firstOrCreate(['name' => $skill['name']], $skill);
        }

        $projects = [
            [
                'title' => 'Invoicely',
                'category' => 'Laravel',
                'tech' => 'Laravel, Livewire, MySQL',
                'github' => 'https://github.com/muhammadbinimran407-tech/invoicely',
                'demo' => 'https://invoicely.muhammadbinimran.online',
                'featured' => true,
                'status' => 'Published',
                'description' => 'A SaaS invoice generator with recurring billing, PDF export, client portals and payment reminders built for freelancers and small teams.',
                'stars' => 240,
                'forks' => 62,
            ],
            [
                'title' => 'Fleetpulse',
                'category' => 'Go',
                'tech' => 'Golang, WebSockets, Redis',
                'github' => 'https://github.com/muhammadbinimran407-tech/fleetpulse',
                'demo' => 'https://fleetpulse.muhammadbinimran.online',
                'featured' => true,
                'status' => 'Published',
                'description' => 'Real-time fleet tracking platform streaming live vehicle telemetry over WebSockets, with Redis pub/sub and a Go-based ingestion pipeline.',
                'stars' => 310,
                'forks' => 88,
            ],
            [
                'title' => 'Kanbly',
                'category' => 'JavaScript',
                'tech' => 'JavaScript, IndexedDB',
                'github' => 'https://github.com/muhammadbinimran407-tech/kanbly',
                'demo' => 'https://kanbly.muhammadbinimran.online',
                'featured' => true,
                'status' => 'Published',
                'description' => 'Offline-first kanban board that persists everything in IndexedDB, syncs across tabs and works without a backend.',
                'stars' => 185,
                'forks' => 41,
            ],
            [
                'title' => 'Docuflow',
                'category' => 'Full Stack',
                'tech' => 'Laravel, Go, OpenAPI',
                'github' => 'https://github.com/muhammadbinimran407-tech/docuflow',
                'demo' => 'https://docuflow.muhammadbinimran.online',
                'featured' => false,
                'status' => 'Published',
                'description' => 'API documentation and schema generation tool that turns OpenAPI specs into live testable docs with code samples in multiple languages.',
                'stars' => 128,
                'forks' => 27,
            ],
            [
                'title' => 'Deployd',
                'category' => 'Go',
                'tech' => 'Golang, Docker, GitHub Actions',
                'github' => 'https://github.com/muhammadbinimran407-tech/deployd',
                'demo' => '',
                'featured' => false,
                'status' => 'Published',
                'description' => 'A deployment CLI that rolls out containerised apps to Linux servers with zero-downtime releases, rollbacks and status notifications.',
                'stars' => 96,
                'forks' => 18,
            ],
            [
                'title' => 'Taskmine',
                'category' => 'Full Stack',
                'tech' => 'Laravel, Vue, Tailwind',
                'github' => 'https://github.com/muhammadbinimran407-tech/taskmine',
                'demo' => '',
                'featured' => false,
                'status' => 'Draft',
                'description' => 'Team task manager with role-based permissions, drag-and-drop boards, and activity audit logs.',
                'stars' => 0,
                'forks' => 0,
            ],
        ];
        foreach ($projects as $project) {
            Project::firstOrCreate(['title' => $project['title']], $project);
        }

        $experience = [
            [
                'role' => 'Senior Full Stack Developer',
                'company' => 'Freelance / Contract',
                'duration' => '2023 — Present',
                'description' => "Delivered Laravel and Go applications for clients across fintech and logistics.\nDesigned REST APIs consumed by mobile and web clients simultaneously.\nOwned deployment pipelines from staging through to production on Linux/Nginx.",
            ],
            [
                'role' => 'Full Stack Web Developer',
                'company' => 'Software Agency',
                'duration' => '2021 — 2023',
                'description' => "Built and maintained client-facing web platforms end to end in Laravel and MySQL.\nIntroduced a Tailwind CSS design system, cutting frontend delivery time significantly.",
            ],
            [
                'role' => 'BS Computer Science',
                'company' => 'University',
                'duration' => '2019 — 2023',
                'description' => "Focused coursework in data structures, databases, and networked systems.",
            ],
        ];
        foreach ($experience as $entry) {
            Experience::firstOrCreate(['role' => $entry['role'], 'company' => $entry['company']], $entry);
        }

        $testimonials = [
            [
                'name' => 'Ayesha Khan',
                'company' => 'Fintech Startup',
                'rating' => 5,
                'text' => 'Muhammad rebuilt our billing platform in Laravel and the team has been shipping on it ever since. Clean code, honest estimates, zero downtime during the migration.',
            ],
            [
                'name' => 'Daniel Osei',
                'company' => 'Logistics Company',
                'rating' => 5,
                'text' => 'The Go real-time tracking API he built handles thousands of concurrent connections without breaking a sweat. Communication and delivery speed were outstanding.',
            ],
            [
                'name' => 'Sara Malik',
                'company' => 'SaaS Agency',
                'rating' => 5,
                'text' => 'Took our messy spec and delivered a polished, tested product end to end — REST API, client portal, the works. One of the most reliable devs we have hired.',
            ],
        ];
        foreach ($testimonials as $testimonial) {
            Testimonial::firstOrCreate(['name' => $testimonial['name']], $testimonial);
        }
    }
}
