<?php

namespace App\Http\Controllers;

use App\Models\Qwiker;
use App\Models\User;
use App\Models\UserFollower;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class QwikerAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $author_username = null)
    {
        if (isset($author_username)) {
            $author = User::firstWhere('username', $author_username);
            if (is_null($author)) {
                // throw new Exception('User not found!', HTTP);
                throw new NotFoundHttpException('User not found!');
            }
        } else {
            $author = request()->user();
        }

        // ddd($author);
        return Inertia::render('QwikerAuthor', [
            'qwikers' => Qwiker::latest()->where(
                'user_id', $author->id
            )->with('author')->get(),
            'author_id' => $author->id,
            'totalQwikes' => Qwiker::where(
                'user_id', $author->id
            )->count(),
            'author_name' => $author->name,
            'totalFollowers' => UserFollower::where(
                'user_id', $author->id
            )->count(),
            'totalFollowing' => UserFollower::where(
                'follower_id', $author->id
            )->count(),
            'isConnected' => UserFollower::where(
                'follower_id', $author->id,
            )->where(
                'user_id', request()->user()->id,
            )->count() > 0,
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
