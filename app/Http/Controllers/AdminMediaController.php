<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time() . '_' . $file->getClientOriginalName();
        $file->move('images', $name);

        Photo::create(['file' => $name]);
        Session::flash('user_action', 'Photo was successfully uploaded!');

    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);

        if ($photo->file) {
            unlink(public_path() . $photo->file);

            $photo->delete();

            Session::flash('user_action', 'Photo was successfully deleted!');
        }

        return redirect('/admin/media');
    }

    public function deleteMedia(Request $request)
    {
        $photos = Photo::findOrFail($request->photosArray);

        foreach ($photos as $photo) {
            if ($photo->file) {
                unlink(public_path() . $photo->file);

                $photo->delete();

            }
        }
        Session::flash('user_action', 'Photo(s) was successfully deleted!');

        return redirect()->back();
    }

}
