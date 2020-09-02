<?php

namespace App\Http\Controllers;

//error reporting
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

use Exception;
use App\Collection;
use App\Theme;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = auth()->user();
            if ($user != null) {
                $data = Collection::orderBy('id', 'desc')->with('theme')->where('users_id', $user->id)->get();
                return response()->json($data);
            }
        } catch (Exception $e) {
            return response(["Error" => $e->getMessage()], 500);
        }
    }

    /**
     * toggle favorite.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getFavorites()
    {
        try {
            $user = auth()->user();
            if ($user != null) {
                $data = Collection::orderBy('id', 'desc')->with('theme')->where('users_id', $user->id)->where('favorite', 1)->get();
                return response()->json($data);
            }
        } catch (Exception $e) {
            return response(["Error" => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $user = auth()->user();
            
            if ($user == null) {
                return response()->json(["message" => "user not found"], 404);
            }

            $collection = new Collection([
                'name' => $request['name'],
                'description' => $request['description'],
                'users_id' => $user->id,
                'image' => "image/image"
            ]);

            $collection->save();
     
            return response()->json('The collection successfully added', 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * toggle favorite.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function favorite($id)
    {
        try {
            $user = auth()->user();
            
            if ($user == null) {
                return response()->json(["message" => "user not found"], 404);
            }

            $collection = Collection::findOrFail($id);
            $collection->favorite = ($collection->favorite == 0) ? 1 : 0;
            if ($collection->save()) {
                return response()->json('Favorite toggled', 200);
            }else{
                return response()->json('Favorite not toggled', 500);
            }

        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * change theme.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function theme($id, Request $request)
    {
        try {
            $user = auth()->user();
            
            if ($user == null) {
                return response()->json(["message" => "user not found"], 404);
            }

            $collection = Collection::findOrFail($id);
            $theme = Theme::where('name', $request->theme)->get();
            $collection->theme_id = $theme[0]->id;
            if ($collection->save()) {
                return response()->json('theme toggled', 200);
            }else{
                return response()->json('theme not toggled', 500);
            }

        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $collection = new Collection();
            $collection->name = $request['name'];
            $collection->description = $request['description'];
            $collection->image = $request['image'];
            $collection->save();
            return response()->json('The collection has been updated successfully', 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $collection = Collection::findOrFail($id);
            $collection->delete();
            return response()->json('The collection has been removed successfully', 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

}
