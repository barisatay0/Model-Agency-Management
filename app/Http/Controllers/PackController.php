<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Models;
use App\Models\Photos;
use App\Models\Video;
use ZipArchive;
use File;

class PackController extends Controller
{
    /* Download Photos */
    public function downloadphotos(Request $request)
    {
        $model = Models::where('name', $request->input('modelnameInput'))->first();

        if ($model) {
            $modelId = $model->modelid;

            $Photos = Photos::where('modelid', $modelId)->get();

            if ($Photos->isEmpty()) {
                abort(404, 'Photos Not Found.');
            }

            $zip = new ZipArchive;
            $zipFileName = 'photos.zip';

            if ($zip->open(public_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
                foreach ($Photos as $photo) {
                    $zip->addFile(public_path($photo->photopath), basename($photo->photopath));
                }

                $zip->close();

                return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
            }

            abort(500, 'Zip File Couldnt Create');
        } else {
            abort(404, 'Model Not Found.');
        }
    }
    /* Download Videos */
    public function downloadVideos(Request $request)
    {
        $model = Models::where('name', $request->input('modelnameInput'))->first();

        if ($model) {
            $modelId = $model->modelid;

            $Videos = Video::where('modelid', $modelId)->get();
            if ($Videos->isEmpty()) {
                abort(404, 'Video Not Found.');
            }

            $zip = new ZipArchive;
            $zipFileName = 'Videos.zip';

            if ($zip->open(public_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
                foreach ($Videos as $Video) {
                    $zip->addFile(public_path($Video->videopath), basename($Video->videopath));
                }

                $zip->close();

                return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
            }

            abort(500, 'Zip File Couldnt Create');
        } else {
            abort(404, 'Model Not Found.');
        }


    }
    /* Decrypt Url */
    public function decryptModels(Request $request)
    {
        $encryptedData = $request->input('models');
        echo "Encrypted Data: " . $encryptedData; // Kontrol için log ekle
        $decryptedData = Crypt::decrypt($encryptedData);
        echo "Decrypted Data: " . $decryptedData; // Kontrol için log ekle
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
