<?php

namespace App\Http\Controllers;

use App\Album;

class PhotoController extends Controller
{
    public function index(Album $album)
    {
        return response()->json($album->photos, 200);
    }

    public function store()
    {
        // code...
    }
}
