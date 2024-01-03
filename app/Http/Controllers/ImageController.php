<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImageController extends Controller
{
    //

    public function store(Request $request)
    {
        $img = $request->file('file');

        $imgName = Str::uuid() . "." . $img->extension();




        $imgServer = Image::make($img);
        $imgServer->fit(1000, 1000);

        $imgPath = public_path("uploads" . '/' . $imgName);


        $imgServer->save($imgPath);


        return response()->json(['imagen' => $imgName]);
    }
}
