<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Models;
use App\Models\Photos;
use App\Models\Video;

class PackController extends Controller
{
    public function decryptModels(Request $request)
    {
        // Şifrelenmiş model ID'lerini al
        $encryptedData = $request->input('models');

        // Şifrelenmiş veriyi çöz
        $decryptedData = Crypt::decrypt($encryptedData);

        // Çözülmüş veriyi diziye dönüştür
        $selectedModels = explode(',', $decryptedData);

        // Veritabanından çözülen model ID'leri ile ilgili modelleri bul
        $models = Models::whereIn('modelid', $selectedModels)->get();

        // Her model için ilgili fotoğraf ve videoları bul
        $packData = [];
        foreach ($models as $model) {
            $bookPhotos = Photos::where('modelid', $model->modelid)->where('photocategory', 'Book')->orderBy('photoorder')->get();
            $digitalPhotos = Photos::where('modelid', $model->modelid)->where('photocategory', 'Digital')->orderBy('photoorder')->get();
            $videos = Video::where('modelid', $model->modelid)->orderBy('videoorder')->get();

            // Modeller ve ilgili fotoğraf ve videoları birleştir
            $packData[] = [
                'model' => $model,
                'bookPhotos' => $bookPhotos,
                'digitalPhotos' => $digitalPhotos,
                'videos' => $videos,
            ];
        }

        // Pack sayfasına veriyi gönder
        return view('Pack', compact('packData'));
    }
}
