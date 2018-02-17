<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Album::all(), 200);
    }


    /**
     * @param Album $album
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Album $album)
    {
        return response()->json($album, 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//        if($request->validate([
//            'album_name' => 'required|max:20|min:1|',
//            'album_description' => 'max:255',
//            'cover_image'   => 'image|size:7600'
//        ]))

        return response()->json(Album::create($request->all()), 201);


    }


    /**
     * @param Request $request
     * @param Album $album
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Album $album)
    {
//        $request->validate([
//            'album_name' => 'max:20|min:1',
//            'album_description' => 'max:255',
//            'cover_image'   => 'image|size:7600'
//        ]);

        $album->update($request->all());

        return response()->json($album, 200);

    }

    public function delete(Album $album)
    {
        $album->delete();

        return response()->json(null, 204);
    }


}
