<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Models;
use App\Models\Photos;
use App\Models\Video;
use ZipArchive;

class PackController extends Controller
{
    public function decryptModels(Request $request)
    {
        $encryptedData = $request->input('models');
        $decryptedData = Crypt::decrypt($encryptedData);
        $selectedModels = explode(',', $decryptedData);

        $models = Models::whereIn('modelid', $selectedModels)->get();

        $packData = [];
        foreach ($models as $model) {
            $bookPhotos = Photos::where('modelid', $model->modelid)->where('photocategory', 'Book')->orderBy('photoorder')->get();
            $digitalPhotos = Photos::where('modelid', $model->modelid)->where('photocategory', 'Digital')->orderBy('photoorder')->get();
            $videos = Video::where('modelid', $model->modelid)->orderBy('videoorder')->get();
            if ($models->isEmpty()) {
                abort(404);
            }
            $packData[] = [
                'model' => $model,
                'bookPhotos' => $bookPhotos,
                'digitalPhotos' => $digitalPhotos,
                'videos' => $videos,
            ];
        }
        return view('Pack', compact('packData'));
    }

}
