<?php

namespace App\Http\Controllers;

use App\Models\models;
use App\Models\photos;
use App\Models\video;
use Illuminate\Http\Request;


class ModelController extends Controller
{
    public function addModel(Request $request)
    {
        $validatedData = $request->validate([
            'profilephoto' => 'required|image|mimes:jpeg,png,jpg,gif,heic|max:50048',
            'book' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic|max:150048',
            'digital' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic|max:150048',
            'video' => 'nullable|mimetypes:video/mp4,video/webm,video/mpeg,video/quicktime,video/x-msvideo,video/x-flv|max:900048',
        ], [
            'profilephoto.required' => 'The profile photo is required.',
            'profilephoto.image' => 'The uploaded file must be an image.',
            'profilephoto.mimes' => 'The image file must be in JPEG, PNG, JPG, GIF, or HEIC format.',
            'profilephoto.max' => 'The image file must not be greater than :max 50 MB.',
            'book.image' => 'The uploaded file must be an image.',
            'book.mimes' => 'The image file must be in JPEG, PNG, JPG, GIF, or HEIC format.',
            'book.max' => 'The image file must not be greater than :max 150 MB.',
            'digital.image' => 'The uploaded file must be an image.',
            'digital.mimes' => 'The image file must be in JPEG, PNG, JPG, GIF, or HEIC format.',
            'digital.max' => 'The image file must not be greater than :max 150 MB.',
            'video.mimetypes' => 'The video file must be in MP4, WebM, MPEG, QuickTime, AVI, or FLV format.',
            'video.max' => 'The video file must not be greater than :max 900 MB.',
        ]);
        $profilephoto = $request->file('profilephoto');
        $profilephotopath = $profilephoto->storePublicly('Photos');

        $model = new models;
        $model->profilephoto = $profilephotopath;
        $model->name = $request->input('name');
        $model->height = $request->input('height');
        $model->chest_bust = $request->input('chest_bust');
        $model->waist = $request->input('waist');
        $model->hips = $request->input('hips');
        $model->shoes = $request->input('shoes');
        $model->eyes = $request->input('eyes');
        $model->nation = $request->input('nation');
        $model->instagram = $request->input('instagram');
        $model->gender = $request->input('gender');

        $model->save();
        return redirect('Editor');


    }
}