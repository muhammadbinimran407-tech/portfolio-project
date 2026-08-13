<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class AdminApiController extends Controller
{
    protected function storagePath(string $entity): string
    {
        $safe = preg_replace('/[^a-z0-9_\-]/i', '', $entity);
        return storage_path('app/admin_' . $safe . '.json');
    }

    protected function read(string $entity): array
    {
        $path = $this->storagePath($entity);
        if (!file_exists($path)) return [];
        $json = file_get_contents($path);
        $data = json_decode($json, true);
        return is_array($data) ? $data : [];
    }

    protected function write(string $entity, array $data): void
    {
        $path = $this->storagePath($entity);
        if (!is_dir(dirname($path))) mkdir(dirname($path), 0755, true);
        file_put_contents($path, json_encode(array_values($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    public function index(Request $request, $entity)
    {
        $e = strtolower($entity);

        // media: list uploaded files
        if ($e === 'media') {
            $dir = storage_path('app/public/admin_media');
            $files = [];
            if (is_dir($dir)) {
                foreach (array_values(array_diff(scandir($dir), ['.', '..'])) as $f) {
                    $path = 'storage/admin_media/' . $f;
                    $files[] = [
                        'name' => $f,
                        'size' => filesize($dir . DIRECTORY_SEPARATOR . $f),
                        'url' => url($path),
                    ];
                }
            }
            return response()->json($files);
        }

        // messages from Contact model
        if ($e === 'messages') {
            try {
                $rows = Contact::orderBy('created_at', 'desc')->get();
                $data = $rows->map(fn($r) => [
                    'id' => $r->id,
                    'name' => $r->name,
                    'email' => $r->email,
                    'message' => $r->message,
                    'date' => $r->created_at ? $r->created_at->format('M j, Y') : null,
                    'read' => $r->read ?? false,
                ])->toArray();
                return response()->json($data);
            } catch (\Throwable $e) {
                Log::warning('AdminApiController: contact read failed: '.$e->getMessage());
            }
        }

        // model-backed entities
        $map = [
            'projects' => Project::class,
            'skills' => Skill::class,
            'experience' => Experience::class,
            'testimonials' => Testimonial::class,
            'blog' => Post::class,
            'posts' => Post::class,
        ];
        if (isset($map[$e])) {
            $cls = $map[$e];
            $rows = $cls::orderBy('created_at', 'desc')->get();
            return response()->json($rows->toArray());
        }

        // fallback file-backed
        $data = $this->read($entity);
        return response()->json($data);
    }

    public function store(Request $request, $entity)
    {
        $payload = $request->all();
        $e = strtolower($entity);

        // media upload handling
        if ($e === 'media') {
            if (!$request->hasFile('file')) {
                return response()->json(['message' => 'No file uploaded'], 400);
            }
            $uploaded = [];
            $files = $request->file('file');
            if (!is_array($files)) $files = [$files];
            foreach ($files as $f) {
                $name = time() . '_' . preg_replace('/[^a-z0-9_\.-]/i', '_', $f->getClientOriginalName());
                $f->storeAs('public/admin_media', $name);
                $uploaded[] = [
                    'name' => $name,
                    'size' => $f->getSize(),
                    'url' => url('storage/admin_media/' . $name),
                ];
            }
            return response()->json($uploaded, 201);
        }

        // messages
        if ($e === 'messages') {
            $contact = Contact::create([
                'name' => $payload['name'] ?? 'Unknown',
                'email' => $payload['email'] ?? null,
                'message' => $payload['message'] ?? '',
            ]);
            return response()->json([
                'id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
                'message' => $contact->message,
                'date' => $contact->created_at ? $contact->created_at->format('M j, Y') : null,
                'read' => $contact->read ?? false,
            ], 201);
        }

        // model-backed entities
        $map = [
            'projects' => Project::class,
            'skills' => Skill::class,
            'experience' => Experience::class,
            'testimonials' => Testimonial::class,
            'blog' => Post::class,
            'posts' => Post::class,
        ];
        if (isset($map[$e])) {
            $cls = $map[$e];
            $record = $cls::create($payload);
            return response()->json($record, 201);
        }

        // fallback file-backed
        $data = $this->read($entity);
        $id = isset($payload['id']) ? $payload['id'] : (int) round(microtime(true) * 1000);
        $payload['id'] = $id;
        $data[] = $payload;
        $this->write($entity, $data);
        return response()->json($payload, 201);
    }

    public function update(Request $request, $entity, $id)
    {
        $e = strtolower($entity);
        // messages
        if ($e === 'messages') {
            $contact = Contact::find($id);
            if (!$contact) return response()->json(['message' => 'Not found'], 404);
            $contact->fill($request->all());
            $contact->save();
            return response()->json([
                'id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
                'message' => $contact->message,
                'date' => $contact->created_at ? $contact->created_at->format('M j, Y') : null,
                'read' => $contact->read ?? false,
            ]);
        }

        $map = [
            'projects' => Project::class,
            'skills' => Skill::class,
            'experience' => Experience::class,
            'testimonials' => Testimonial::class,
            'blog' => Post::class,
            'posts' => Post::class,
        ];
        if (isset($map[$e])) {
            $cls = $map[$e];
            $m = $cls::find($id);
            if (!$m) return response()->json(['message' => 'Not found'], 404);
            $m->fill($request->all());
            $m->save();
            return response()->json($m);
        }

        $data = $this->read($entity);
        $found = false;
        foreach ($data as &$item) {
            if ((string)$item['id'] === (string)$id) {
                $item = array_merge($item, $request->all());
                $item['id'] = $id;
                $found = true;
                break;
            }
        }
        if (!$found) return response()->json(['message' => 'Not found'], 404);
        $this->write($entity, $data);
        return response()->json($item);
    }

    public function destroy(Request $request, $entity, $id)
    {
        $e = strtolower($entity);
        if ($e === 'messages') {
            $contact = Contact::find($id);
            if (!$contact) return response()->json(['message' => 'Not found'], 404);
            $contact->delete();
            return response()->json(['deleted' => true]);
        }
        if ($e === 'media') {
            $dir = storage_path('app/public/admin_media');
            $file = $dir . DIRECTORY_SEPARATOR . $id;
            if (!file_exists($file)) return response()->json(['message' => 'Not found'], 404);
            unlink($file);
            return response()->json(['deleted' => true]);
        }
        $map = [
            'projects' => Project::class,
            'skills' => Skill::class,
            'experience' => Experience::class,
            'testimonials' => Testimonial::class,
            'blog' => Post::class,
            'posts' => Post::class,
        ];
        if (isset($map[$e])) {
            $cls = $map[$e];
            $m = $cls::find($id);
            if (!$m) return response()->json(['message' => 'Not found'], 404);
            $m->delete();
            return response()->json(['deleted' => true]);
        }
        $data = $this->read($entity);
        $orig = count($data);
        $data = array_values(array_filter($data, fn($i) => (string)$i['id'] !== (string)$id));
        if (count($data) === $orig) return response()->json(['message' => 'Not found'], 404);
        $this->write($entity, $data);
        return response()->json(['deleted' => true]);
    }
}
