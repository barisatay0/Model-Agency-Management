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
        $modelName = $request->input('name');
        if (models::where('name', $modelName)->exists()) {
            return back()->withErrors(['name' => 'This model name already exists']);
        }
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
        $profilephotopath = $profilephoto->storePublicly('public/Photos');

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

        $modelName = $request->input('name');
        $model = models::where('name', $modelName)->first();

        if (!$model) {
            return back()->withErrors(['name' => 'Model not found']);
        }

        $modelId = $model->modelid;



        if ($request->hasfile('book')) {
            $counter = 1;
            foreach ($request->allFiles('book') as $book) {
                $bookPath = $book->storePublicly('public/Books');
                $photo = new photos;
                $photo->modelid = $modelId;
                $photo->photopath = $bookPath;
                $photo->photocategory = 'Book';
                $photo->photoorder = $counter;
                $photo->save();
                $counter++;
            }
        }

        if ($request->hasfile('digital')) {
            $counter = 1;
            foreach ($request->allFiles('digital') as $digital) {
                $digitalPath = $digital->storePublicly('public/Digitals');
                $photo = new photos;
                $photo->modelid = $modelId;
                $photo->photopath = $digitalPath;
                $photo->photocategory = 'Digital';
                $photo->photoorder = $counter;
                $photo->save();
                $counter++;
            }
        }

        if ($request->hasfile('video')) {
            $counter = 1;
            foreach ($request->allFiles('video') as $videoFile) {
                $videoPath = $videoFile->storePublicly('public/Videos');
                $videoModel = new video;
                $videoModel->modelid = $modelId;
                $videoModel->videopath = $videoPath;
                $videoModel->videoorder = $counter;
                $videoModel->save();
                $counter++;

            }
        }


        return redirect('Editor');



    }
    public function models()
    {
        $models = models::paginate(12);
        return view('welcome', ['models' => $models]);
    }

    public function toggleSelection(Request $request)
    {
        $modelId = $request->input('modelid');
        $newSelected = $request->input('selected');

        $model = Models::where('modelid', $modelId)->first(); // models::find() yerine Models::where() kullanıyoruz

        if ($model) {
            $model->selected = $newSelected;
            $model->save();

            return response()->json(['success' => true, 'message' => 'Selected status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Model not found'], 404);
        }

    }

}