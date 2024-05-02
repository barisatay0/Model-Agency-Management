<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\Photos;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class ListController extends Controller
{
     /* Delete Model */
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
