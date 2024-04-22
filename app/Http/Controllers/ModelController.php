<?php

namespace App\Http\Controllers;

use Maestroerror\HeicToJpg;
use App\Models\Models;
use App\Models\Photos;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModelController extends Controller
{
    /* Add Model */
    public function addModel(Request $request)
    {
        $modelName = $request->input('name');
        if (Models::where('name', $modelName)->exists()) {
            return back()->withErrors(['name' => 'This model name already exists']);
        }
        $validatedData = $request->validate([
            /* File Controls */
            'profilephoto' => 'required|image|mimes:jpeg,png,jpg,gif,heic|max:50048',
            'book.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic|max:150048',
            'digital.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic|max:150048',
            'video.*' => 'nullable|mimetypes:video/mp4,video/webm,video/mpeg,video/quicktime,video/x-msvideo,video/x-flv|max:900048',
        ], [
            'profilephoto.required' => 'The profile photo is required.',
            'profilephoto.image' => 'The uploaded file must be an image.',
            'profilephoto.mimes' => 'The image file must be in JPEG, PNG, JPG, GIF, or HEIC format.',
            'profilephoto.max' => 'The image file must not be greater than :max 50 MB.',
            'book.*.image' => 'The uploaded file must be an image.',
            'book.*.mimes' => 'The image file must be in JPEG, PNG, JPG, GIF, or HEIC format.',
            'book.*.max' => 'The image file must not be greater than :max 150 MB.',
            'digital.*.image' => 'The uploaded file must be an image.',
            'digital.*.mimes' => 'The image file must be in JPEG, PNG, JPG, GIF, or HEIC format.',
            'digital.*.max' => 'The image file must not be greater than :max 150 MB.',
            'video.*.mimetypes' => 'The video file must be in MP4, WebM, MPEG, QuickTime, AVI, or FLV format.',
            'video.*.max' => 'The video file must not be greater than :max 900 MB.',
        ]);

        $profilephoto = $request->file('profilephoto');
        $profilephotopath = $profilephoto->storePublicly('public/Photos');

        $model = new Models;
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
        $model->active = '1';
        $model->busy = '1';
        $model->selected = '0';
        $model->save();

        $modelName = $request->input('name');
        $model = Models::where('name', $modelName)->first();

        if (!$model) {
            return back()->withErrors(['name' => 'Model not found']);
        }

        $modelId = $model->modelid;


        /* Book */
        $bookFiles = $request->file('book');
        if ($bookFiles !== null) {
            $bookcounter = 1;
            foreach ($bookFiles as $book) {
                $bookPath = $book->storePublicly('public/Books');
                $extension = $book->getClientOriginalExtension();
                if ($extension == 'heic') {
                    $jpgContent = HeicToJpg::convert($bookPath)->get();

                    $jpgPath = 'public/Books/' . pathinfo($bookPath, PATHINFO_FILENAME) . '.jpg';
                    file_put_contents($jpgPath, $jpgContent);

                    $bookphoto = new photos;
                    $bookphoto->modelid = $modelId;
                    $bookphoto->photopath = $jpgPath;
                    $bookphoto->photocategory = 'Book';
                    $bookphoto->photoorder = $bookcounter;
                    $bookphoto->save();
                } else {
                    $bookphoto = new photos;
                    $bookphoto->modelid = $modelId;
                    $bookphoto->photopath = $bookPath;
                    $bookphoto->photocategory = 'Book';
                    $bookphoto->photoorder = $bookcounter;
                    $bookphoto->save();
                }

                $bookcounter++;
            }
        }
        /* Digital */
        $digitalFiles = $request->file('digital');
        if ($digitalFiles !== null) {
            $digitalcounter = 1;
            foreach ($digitalFiles as $digital) {
                $digitalPath = $digital->storePublicly('public/Digitals');

                $extension = $digital->getClientOriginalExtension();
                if ($extension == 'heic') {
                    $jpgContent = HeicToJpg::convert($digitalPath)->get();
                    $jpgPath = 'public/Digitals/' . pathinfo($digitalPath, PATHINFO_FILENAME) . '.jpg';
                    file_put_contents($jpgPath, $jpgContent);

                    $digitalphoto = new photos;
                    $digitalphoto->modelid = $modelId;
                    $digitalphoto->photopath = $jpgPath;
                    $digitalphoto->photocategory = 'Digital';
                    $digitalphoto->photoorder = $digitalcounter;
                    $digitalphoto->save();
                } else {
                    $digitalphoto = new photos;
                    $digitalphoto->modelid = $modelId;
                    $digitalphoto->photopath = $digitalPath;
                    $digitalphoto->photocategory = 'Digital';
                    $digitalphoto->photoorder = $digitalcounter;
                    $digitalphoto->save();
                }

                $digitalcounter++;
            }
        }

        /* Video */
        $videoFiles = $request->file('video');
        if ($videoFiles !== null) {
            $videocounter = 1;
            foreach ($request->file('video') as $videoFile) {
                $videoPath = $videoFile->storePublicly('public/Videos');
                $videoModel = new Video;
                $videoModel->modelid = $modelId;
                $videoModel->videopath = $videoPath;
                $videoModel->videoorder = $videocounter;
                $videoModel->save();
                $videocounter++;

            }
        }


        return redirect('Editor');



    }
    public function modelupdate(Request $request)
    {
        $model = Models::where('name', $request->input('modelname'))->first();
        if (!$model) {
            return response()->json(['message' => 'Model not found'], 404);
        }

        $model->name = $request->input('modelname');
        $model->instagram = $request->input('instagram');
        $model->height = $request->input('modelheight');
        $model->chest_bust = $request->input('modelchest_bust');
        $model->waist = $request->input('modelwaist');
        $model->hips = $request->input('modelhips');
        $model->shoes = $request->input('modelshoes');
        $model->eyes = $request->input('modeleyes');
        $model->nation = $request->input('modelnation');
        $model->gender = $request->input('gender');
        $model->busy = $request->input('busy');
        $model->active = $request->input('active');
        $model->fdto = $request->input('fdto');
        $model->fdtt = $request->input('fdtt');
        $model->save();
        return redirect()->back();
    }


    public function deletemodel(Request $request)
    {
        $modelName = $request->input('modelname');

        $model = Models::where('name', $modelName)->first();

        if ($model) {
            $photos = Photos::where('modelid', $model->modelid)->get();
            $videos = Video::where('modelid', $model->modelid)->get();
            Storage::delete($model->profilephoto);
            foreach ($photos as $photo) {
                Storage::delete($photo->photopath);

                $photo->delete();
            }

            foreach ($videos as $video) {
                Storage::delete($video->videopath);

                $video->delete();
            }
            $model->delete();

            return redirect()->back()->with('success', 'Model, photos, and videos successfully deleted');
        } else {
            return redirect()->back()->with('error', 'Model not found');
        }
    }
}