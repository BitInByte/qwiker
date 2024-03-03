<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $hashtag_name)
    {
        $hashtag = Hashtag::where('name', $hashtag_name)->with('qwikers')->first();
        if(!isset($hashtag)) {
            throw new NotFoundHttpException('The hashtag doesn\'t exst');
        }

        return Inertia::render('QwikerHashtag', [
            'qwikers' => $hashtag->qwikers()->with('author')->paginate(5),
            'hashtagName' => $hashtag_name,
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hashtag $hashtag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hashtag $hashtag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hashtag $hashtag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hashtag $hashtag)
    {
        //
    }
}
