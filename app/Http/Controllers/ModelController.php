<?php

namespace App\Http\Controllers;

use Maestroerror\HeicToJpg;
use Illuminate\Support\Facades\Crypt;
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

    /* Get Models For Pages */
    public function models()
    {
        $models = Models::paginate(8);

        return view('manager', ['models' => $models]);
    }
    public function modelpage($name)
    {
        $model = Models::where('name', $name)->first();

        if (!$model) {
            abort(404);
        }
        $bookPhotos = Photos::where('modelid', $model->modelid)->where('photocategory', 'Book')->orderBy('photoorder')->get();
        $digitalPhotos = Photos::where('modelid', $model->modelid)->where('photocategory', 'Digital')->orderBy('photoorder')->get();
        $videos = Video::where('modelid', $model->modelid)->get();
        return view('Model', compact('model', 'bookPhotos', 'digitalPhotos', 'videos'));
    }

    public function listmodels(Request $request)
    {
        $models = Models::paginate(9);

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
        $models = Models::all();

        $models->each(function ($model) use ($value) {
            $model->selected = $value;
            $model->save();
        });

        return redirect('/');
    }
    /* Get Selected Models For Checkbox */
    public function getSelectedModels()
    {
        $selectedModels = Models::where('selected', 1)->get(['modelid', 'name']);

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