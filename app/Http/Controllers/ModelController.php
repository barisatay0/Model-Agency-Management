<?php

namespace App\Http\Controllers;

use Maestroerror\HeicToJpg;
use Illuminate\Support\Facades\Crypt;
use App\Models\models;
use App\Models\photos;
use App\Models\video;
use Illuminate\Http\Request;


class ModelController extends Controller
{
    /* Add Model */
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


        /* Book */
        if ($request->hasfile('book')) {
            $counter = 1;
            foreach ($request->allFiles() as $book) {
                $bookPath = $book->storePublicly('public/Books');
                $extension = $book->getClientOriginalExtension();
                if ($extension == 'heic') {
                    $jpgContent = HeicToJpg::convert($bookPath)->get();

                    $jpgPath = 'public/Books/' . pathinfo($bookPath, PATHINFO_FILENAME) . '.jpg';
                    file_put_contents($jpgPath, $jpgContent);

                    $photo = new photos;
                    $photo->modelid = $modelId;
                    $photo->photopath = $jpgPath;
                    $photo->photocategory = 'Book';
                    $photo->photoorder = $counter;
                    $photo->save();
                } else {
                    $photo = new photos;
                    $photo->modelid = $modelId;
                    $photo->photopath = $bookPath;
                    $photo->photocategory = 'Book';
                    $photo->photoorder = $counter;
                    $photo->save();
                }

                $counter++;
            }
        }

        /* Digital */
        if ($request->hasfile('digital')) {
            $counter = 1;
            foreach ($request->allFiles() as $digital) {
                $digitalPath = $digital->storePublicly('public/Digitals');

                $extension = $digital->getClientOriginalExtension();
                if ($extension == 'heic') {
                    $jpgContent = HeicToJpg::convert($digitalPath)->get();
                    $jpgPath = 'public/Digitals/' . pathinfo($digitalPath, PATHINFO_FILENAME) . '.jpg';
                    file_put_contents($jpgPath, $jpgContent);

                    $photo = new photos;
                    $photo->modelid = $modelId;
                    $photo->photopath = $jpgPath;
                    $photo->photocategory = 'Digital';
                    $photo->photoorder = $counter;
                    $photo->save();
                } else {
                    $photo = new photos;
                    $photo->modelid = $modelId;
                    $photo->photopath = $digitalPath;
                    $photo->photocategory = 'Digital';
                    $photo->photoorder = $counter;
                    $photo->save();
                }

                $counter++;
            }
        }
        /* Video */
        if ($request->hasfile('video')) {
            $counter = 1;
            foreach ($request->allFiles() as $videoFile) {
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
    /* Get Models For Pages */
    public function models()
    {
        $models = models::paginate(8);

        return view('manager', ['models' => $models]);
    }

    public function listmodels(Request $request)
    {
        $models = models::paginate(9);

        if ($request->ajax()) {
            return response()->json($models);
        }
        return view('list', ['models' => $models]);
    }


    /* When Checkbox is Checked "selected" Column Is Turn To 1 Or 0 */
    public function toggleSelection(Request $request)
    {
        $modelId = $request->input('modelid');
        $newSelected = $request->input('selected');

        $model = Models::where('modelid', $modelId)->first();

        if ($model) {
            $model->selected = $newSelected;
            $model->save();

            return response()->json(['success' => true, 'message' => 'New Model Added']);
        } else {
            return response()->json(['success' => false, 'message' => 'Model not found or something is wrong'], 404);
        }

    }
    /* All Model Selected Column Is Turn 1 or 0 */
    public function SelectDeleteAll(Request $request)
    {
        $value = $request->input('SelectAndDeleteButton');
        $models = models::all();

        $models->each(function ($model) use ($value) {
            $model->selected = $value;
            $model->save();
        });

        return redirect('/');
    }
    /* Get Selected Models For Checkbox */
    public function getSelectedModels()
    {
        $selectedModels = models::where('selected', 1)->get(['modelid', 'name']);

        return response()->json($selectedModels);
    }
    /* Make Link With Selected Models */
    public function saveSelection(Request $request)
    {
        $selectedModels = $request->input('selectedModels');
        $dataToEncrypt = implode(',', $selectedModels);
        $encryptedData = Crypt::encrypt($dataToEncrypt);
        $exampleLink = 'https://example.com?models=' . urlencode($encryptedData);
        return response()->json(['encryptedData' => $exampleLink]);
    }
}