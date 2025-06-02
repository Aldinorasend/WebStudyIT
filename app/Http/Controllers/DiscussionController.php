<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $discussions = Discussion::with('courses')->get();
        foreach ($discussions as $discussion) {
            if ($discussion->image) {
                $discussion->image_url = asset('backend-uploads/' . $discussion->image);
            }
        } // Mengambil data kursus beserta instruktur
        return view('user.discussion', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     $discussions = Discussion::all();
    //     return view('discussion.create', compact('discussions'));
    // }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'topic' => 'required|string|max:255',
            // 'discussion' => 'required|string',
            // 'modul_id' => 'required|string',
            'ModulID' => 'required|integer|exists:moduls,id',
    'UserID' => 'required|integer|exists:users,id',
    'topics' => 'required|string|max:255',
    'discussions' => 'required|string',
        ]);

        // Simpan data ke database
        Discussion::create($validated);
    
        return redirect('/admin/discussions')->with('success', 'Discussion added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discussion $discussion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discussion $discussion)
    {
        //
        return view('discussion.edit', compact('discussion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
        $discussion = Discussion::findOrFail($id);
        $discussion->update($request->all());
        return redirect('/admin/discussions')->with('success', 's updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discussion $discussion)
    {
        //
        $discussion = Discussion::findOrFail($id);
        $discussion->delete();
        return redirect('/admin/discussions')->with('success', 'Discussion deleted successfully.');
    }
}
