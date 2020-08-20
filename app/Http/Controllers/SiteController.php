<?php

namespace App\Http\Controllers;

//error reporting
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

use App\Site;
use Exception;
use Illuminate\Http\Request;
use shweshi\OpenGraph\OpenGraph;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Site::orderBy('id', 'desc')->where('collection_id', $id)->get();
        return response()->json($data);
    }

    /**
     * Show tog:data
     *
     * @return \Illuminate\Http\Response
     */
    public function getOpenGraph(Request $request)
    {
        try {
            $op = new OpenGraph();
            $data = $op->fetch($request->url);
            return response()->json(["data" => $data], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $site = new Site();
            $site->collection_id = $id;
            $site->url = $request['url'];
            $site->image = $request['image'];
            $site->title = $request['title'];
            $site->description = Str::limit($request['description'], 200, "...");
            $site->save();

            return response()->json('The site successfully added', 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $site = new Site();
            $site->title = $request['title'];
            $site->description = $request['description'];
            $site->image = $request['image'];
            $site->save();
            return response()->json('The site has been updated successfully', 200);
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
            $site = Site::findOrFail($id);
            $site->delete();
            return response()->json('The site has been removed successfully', 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }
}
