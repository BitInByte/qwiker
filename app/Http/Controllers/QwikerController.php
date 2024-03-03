<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Qwiker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class QwikerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Qwiker', [
            // 'qwikers' => Qwiker::latest()->with('author')->get(),
            'qwikers' => Qwiker::latest()->with('author')->paginate(5),
        ]);
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
    public function store(Request $request, Qwiker $qwiker)
    {
        request()->validate([
            'qwikerMessage' => 'required|max:250|min:1',
        ]);

        $message = strip_tags(request('qwikerMessage'));

        preg_match_all('/#(\\w+)/', $message, $hashtagsList);

        $newQwiker = new Qwiker;
        $newQwiker->message = $message;
        $newQwiker->slug = null;
        $newQwiker->user_id = request()->user()->id;
        $hashtagsAttach = [];

        if (isset($hashtagsList[1]) && !empty($hashtagsList[1])) {
            foreach ($hashtagsList[1] as $currentHashtag) {
                $hasHashtag = Hashtag::where('name', $currentHashtag)->first();

                if(is_null($hasHashtag)) {
                    $newHashtag = new Hashtag;
                    $newHashtag->name = $currentHashtag;
                    $newHashtag->save();
                    $hashtagsAttach[] = $newHashtag->id;
                } else {
                    $hashtagsAttach[] = $hasHashtag->id;
                }
            };
        }

        $newQwiker->save();
        $newQwiker->hashtags()->attach($hashtagsAttach);

        // return back();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Qwiker $qwiker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Qwiker $qwiker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Qwiker $qwiker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qwiker $qwiker)
    {
        //
    }
}
