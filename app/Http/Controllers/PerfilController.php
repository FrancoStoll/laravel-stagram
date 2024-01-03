<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }


    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);


        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
            'email' => ['required', 'unique:users,email,' . auth()->user()->id, 'email', 'max:50'],
        ]);

        if ($request->image) {
            $img = $request->file('image');

            $imgName = Str::uuid() . "." . $img->extension();




            $imgServer = Image::make($img);
            $imgServer->fit(1000, 1000);

            $imgPath = public_path("perfiles" . '/' . $imgName);


            $imgServer->save($imgPath);
        }



        // Guardar cambios
        $user = User::find(auth()->user()->id);

        $user->username = $request->username;
        $user->img = $imgName ?? auth()->user()->img ?? null; // or return $imgName ?? $user->img i test and it is working




        if ($request->password || $request->new_password) {
            $this->validate($request, [
                'password' => 'required|current_password',
                'new_password' => 'required|min:6|different:password|confirmed',
                'new_password_confirmation' => 'required|min:6'
            ]);

            $user->password = Hash::make($request->new_password) ?? auth()->user()->password;
        }

        $user->save();
        // Redirect

        return redirect()->route('posts.index', $user->username);
    }
}
