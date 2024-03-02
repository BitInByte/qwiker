<?php

namespace App\Http\Controllers;

use App\Models\Qwiker;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class QwikerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Qwiker', [
            'qwikers'=> Qwiker::latest()->with('author')->get()
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
            'qwikerMessage' => 'required|max:250|min:1'
        ]);


        $newQwiker = new Qwiker;
        $newQwiker->message = request('qwikerMessage');
        $newQwiker->slug = null;
        $newQwiker->user_id = '9b77b33d-08de-4158-874e-71f7fc3cd85e';
        // ddd(Str::slug(request('qwikerMessage', '-')));
        $newQwiker->save();
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
