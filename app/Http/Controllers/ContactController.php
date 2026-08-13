<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Mail\AdminNotification;
use App\Mail\ClientAutoReply;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function resume()
    {
        $files = Storage::disk('public')->files('admin_media');
        $pdfs = array_values(array_filter($files, fn($f) => strtolower(pathinfo($f, PATHINFO_EXTENSION)) === 'pdf'));

        if (empty($pdfs)) {
            abort(404, 'Resume not uploaded yet.');
        }

        $latest = $pdfs[0];
        $mtime = 0;
        foreach ($pdfs as $pdf) {
            $t = Storage::disk('public')->lastModified($pdf);
            if ($t > $mtime) {
                $mtime = $t;
                $latest = $pdf;
            }
        }

        return Storage::disk('public')->download($latest, 'resume.pdf');
    }

    public function about()
    {
        return view('about');
    }

    public function skills()
    {
        $skills = Skill::orderBy('created_at', 'desc')->get();
        $projects = Project::where('featured', true)
            ->where('status', '!=', 'Draft')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        return view('skills', ['skills' => $skills, 'projects' => $projects]);
    }

    public function services()
    {
        $experience = Experience::orderBy('created_at', 'desc')->get();
        return view('services', ['experience' => $experience]);
    }

    public function projects()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('projects', ['projects' => $projects]);
    }

    public function blog()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('blog', ['posts' => $posts]);
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        $contact = Contact::create($data);

        Mail::to('thinkcode@muhammadbinimran.online')->send(new AdminNotification($contact));
        Mail::to($contact->email)->send(new ClientAutoReply($contact));

        return view('contact', ['success' => 'Your message has been sent. I will reply soon.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
