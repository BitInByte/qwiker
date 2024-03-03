<?php

namespace App\Http\Controllers;

use App\Models\Qwiker;
use App\Models\User;
use App\Models\UserFollower;
use App\Repositories\UserFollowerRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class QwikerAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(?string $author_username = null)
    {
        if (isset($author_username)) {
            if ($author_username === request()->user()->username) {
                return redirect('/author');
            }
            $author = User::firstWhere('username', $author_username);
            if (is_null($author)) {
                // throw new Exception('User not found!', HTTP);
                throw new NotFoundHttpException('User not found!');
            }
        } else {
            $author = request()->user();
        }

        return Inertia::render('QwikerAuthor', [
            'qwikers' => Qwiker::latest()->where(
                'user_id', $author->id
            )->with('author')->paginate(5),
            'author_id' => $author->id,
            'totalQwikes' => Qwiker::where(
                'user_id', $author->id
            )->count(),
            'author_name' => $author->name,
            'totalFollowing' => UserFollower::where(
                'user_id', $author->id
            )->count(),
            'totalFollowers' => UserFollower::where(
                'follower_id', $author->id
            )->count(),
            'isConnected' => UserFollower::where(
                'follower_id', $author->id,
            )->where(
                'user_id', request()->user()->id,
            )->count() > 0,
            'author_username' => $author->username,
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

    public function connect(string $author_username, UserFollowerRepository $userFollowerRepository)
    {
        // Check if exist on database already
        $followerAuthor = User::firstWhere('username', $author_username);
        if (! isset($followerAuthor)) {
            throw new NotFoundHttpException('User not found!');
        }

        $connection = $userFollowerRepository->getRecordQuery($followerAuthor->id)->count();

        $isConnected = $connection > 0;
        if ($isConnected) {
            $userFollowerRepository->getRecordQuery($followerAuthor->id)->delete();
        } else {
            $newConnection = new UserFollower;
            $newConnection->user_id = request()->user()->id;
            $newConnection->follower_id = $followerAuthor->id;
            $newConnection->save(['timestamps' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qwiker $qwiker)
    {
        //
    }
}
