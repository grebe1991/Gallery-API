<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;

class PhotoController extends Controller
{
    public function index(Album $album)
    {
        return response()->json($album->photos, 200);
    }

    public function show(Photo $photo)
    {
        return $photo;
    }

    public function store()
    {
        // code...
    }

    public function update(Request $request, Photo $photo)
    {
        // code...
    }

    public function delete(Photo $photo)
    {
        $photo->delete();

        return response()->json(null, 204);
    }
}
