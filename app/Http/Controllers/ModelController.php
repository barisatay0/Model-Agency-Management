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