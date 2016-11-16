<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use File;
use Route;
use Response;

class UserController extends Controller
{

  public function updateAvatar(Request $request)
  {

    // $product = Product::find($id);
    // $file = $request->file('file');
    // $ext = $file->extension();
    // $name = uniqId();
    // $file->storeAs('images/'.$product->id , $name.'.'.$ext);
    // $image = new \App\Image(['src' => $name.'.'.$ext]);
    // $product->images()->save($image);


    if (File::exists($request->file('avatar')))
    {
      Storage::delete("public/img/avatars/".Auth::user()->id.".".$request->file('avatar')->getClientOriginalExtension());
    }
    $path = $request->file('avatar')->store('img/avatars');
    Storage::move($path, "public/img/avatars/".Auth::user()->id.".".$request->file('avatar')->getClientOriginalExtension());
    $user = User::find(Auth::user()->id);
    $user->avatar = Auth::user()->id .".". $request->file('avatar')->getClientOriginalExtension();
    $user->save();

    return redirect('/profile');
  }

  public function getImage($filename) {
    $path = storage_path() . '/app/public/img/avatars/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
  }

  public function profile()
  {
    return view('front.profile');
  }
}
