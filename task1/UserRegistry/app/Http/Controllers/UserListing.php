<?php

namespace App\Http\Controllers;

use app\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserListing extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('User.index', ['users' => $users]);
    }

    /**
     * Store new User data
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $user = User::firstOrCreate([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'position' => $request->input('position'),
        ]);

        if ($user->wasRecentlyCreated) {
            $data = [
                'message' => 'New user Created !',
            ];
        } else {
            $data = [
                'message' => 'User already Exists!',
            ];
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $user_id
     * @return JsonResponse
     */
    public function destroy(int $user_id): JsonResponse
    {
        $user = User::find($user_id);
        $user->delete();

        $data = [
            'message' => 'User Deleted',
        ];

        return response()->json($data);
    }

}
