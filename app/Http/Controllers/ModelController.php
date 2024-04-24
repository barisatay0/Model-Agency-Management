<?php

namespace App\Http\Controllers;

use App\Models\Models;
use App\Models\Photos;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModelController extends Controller
{
    /* Update */

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

    public function bookphotodelete(Request $request)
    {

        $photoId = $request->input('photoid');
        $photo = Photos::find($photoId);

        if (!$photo) {
            return redirect()->back()->with('error', 'Photo not found.');
        }

        $photoPath = public_path($photo->photopath);

        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $photo->delete();

        return redirect()->back()->with('success', 'Photo deleted successfully.');
    }
}