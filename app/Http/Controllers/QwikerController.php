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
            'qwikers' => Qwiker::latest()->with('author')->get(),
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
        // ddd($request);
        request()->validate([
            'qwikerMessage' => 'required|max:250|min:1',
        ]);

        $message = strip_tags(request('qwikerMessage'));

        preg_match_all('/#(\\w+)/', $message, $hashtagsList);
        // ddd($hashtagsList);
        // ddd(request('qwikerMessage'), strip_tags(request('qwikerMessage')));

        $newQwiker = new Qwiker;
        $newQwiker->message = $message;
        $newQwiker->slug = null;
        // $newQwiker->user_id = '9b780b57-08bc-4786-b3bf-77fb02b240c8';
        $newQwiker->user_id = request()->user()->id;
        $hashtagsAttach = [];

        // if (isset($hashtagsList[1]) && sizeof($hashtagsList[1]) > 0) {
        if (isset($hashtagsList[1]) && !empty($hashtagsList[1])) {
            foreach ($hashtagsList[1] as $currentHashtag) {
            // collect($hashtagsList[1])->each(function (string $currentHashtag) {
                $hasHashtag = Hashtag::where('name', $currentHashtag)->first();

                if(is_null($hasHashtag)) {
                    $newHashtag = new Hashtag;
                    $newHashtag->name = $currentHashtag;
                    $newHashtag->save();
                    $hashtagsAttach[] = $newHashtag->id;
                } else {
                    $hashtagsAttach[] = $hasHashtag->id;
                }
                // $hashtagsAttach[] = 'test';
            // });
            };
        }

        // ddd($hashtagsAttach);
        // ddd(Str::slug(request('qwikerMessage', '-')));
        // $newQ
        $newQwiker->save();
        $newQwiker->hashtags()->attach($hashtagsAttach);

        // return back();
        return redirect('/');
        // ddd($newQwiker->id);
        // $qwiker->create([
        //     'message' => request('qwikerMessage'),
        //     'slug' => 'example-slug'
        // ]);
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
