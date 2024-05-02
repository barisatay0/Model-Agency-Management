<?php

namespace App\Http\Controllers;

use App\Models\Models;
use App\Models\Photos;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maestroerror\HeicToJpg;


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
        $model->hair = $request->input('modelhair');
        $model->gender = $request->input('gender');
        $model->busy = $request->input('busy');
        $model->active = $request->input('active');
        if ($request->input('busy') == 0) {
            $model->fdto = null;
            $model->fdtt = null;
        } else {
            $model->fdto = $request->input('fdto');
            $model->fdtt = $request->input('fdtt');
        }

        $model->save();
        return redirect()->back();
    }

    /* Delete Photos */
    public function photodelete(Request $request)
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
    /* Delete Videos */
    public function videodelete(Request $request)
    {

        $videoId = $request->input('videoid');
        $video = Video::find($videoId);

        if (!$video) {
            return redirect()->back()->with('error', 'Video not found.');
        }

        $videoPath = public_path($video->videopath);

        if (file_exists($videoPath)) {
            unlink($videoPath);
        }

        $video->delete();

        return redirect()->back()->with('success', 'Video deleted successfully.');
    }
    /* Add Photos In Book */
    public function addbook(Request $request)
    {
        $bookPhotos = $request->file('bookphotos');
        $modelId = $request->input('modelid');
        $category = ('Book');
        if ($bookPhotos) {
            $maxOrder = Photos::where('modelid', $modelId)
                ->where('photocategory', 'book')
                ->max('photoorder');

            $maxOrder = $maxOrder ?? 0;

            foreach ($bookPhotos as $photo) {
                $bookPath = $photo->storePublicly('public/Books');
                $extension = $photo->getClientOriginalExtension();

                if ($extension == 'heic') {
                    $jpgContent = HeicToJpg::convert($bookPath)->get();

                    $jpgPath = 'public/Books/' . pathinfo($bookPath, PATHINFO_FILENAME) . '.jpg';
                    file_put_contents($jpgPath, $jpgContent);

                    $bookphoto = new photos;
                    $bookphoto->modelid = $modelId;
                    $bookphoto->photopath = $jpgPath;
                    $bookphoto->photocategory = $category;
                    $bookphoto->photoorder = ++$maxOrder;
                    $bookphoto->save();
                } else {
                    Photos::create([
                        'modelid' => $modelId,
                        'photopath' => $bookPath,
                        'photocategory' => $category,
                        'photoorder' => ++$maxOrder
                    ]);
                }
            }


            return redirect()->back()->with('success', 'Files uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No files uploaded.');
    }
    /* Add Photos In Digital */
    public function adddigital(Request $request)
    {
        $DigitalPhotos = $request->file('digitalphotos');
        $modelId = $request->input('modelid');
        $category = ('Digital');
        if ($DigitalPhotos) {
            $maxOrder = Photos::where('modelid', $modelId)
                ->where('photocategory', 'Digital')
                ->max('photoorder');

            $maxOrder = $maxOrder ?? 0;

            foreach ($DigitalPhotos as $photo) {
                $bookPath = $photo->storePublicly('public/Digitals');
                $extension = $photo->getClientOriginalExtension();

                if ($extension == 'heic') {
                    $jpgContent = HeicToJpg::convert($bookPath)->get();

                    $jpgPath = 'public/Digitals/' . pathinfo($bookPath, PATHINFO_FILENAME) . '.jpg';
                    file_put_contents($jpgPath, $jpgContent);

                    $bookphoto = new photos;
                    $bookphoto->modelid = $modelId;
                    $bookphoto->photopath = $jpgPath;
                    $bookphoto->photocategory = $category;
                    $bookphoto->photoorder = ++$maxOrder;
                    $bookphoto->save();
                } else {
                    Photos::create([
                        'modelid' => $modelId,
                        'photopath' => $bookPath,
                        'photocategory' => $category,
                        'photoorder' => ++$maxOrder
                    ]);
                }
            }


            return redirect()->back()->with('success', 'Files uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No files uploaded.');
    }
    /* Add Videos */
    public function addvideo(Request $request)
    {
        $videos = $request->file('videos');
        $modelId = $request->input('modelid');
        if ($videos) {
            $maxOrder = Video::where('modelid', $modelId)
                ->max('videoorder');

            $maxOrder = $maxOrder ?? 0;
            foreach ($videos as $Video) {
                $Videopath = $Video->storePublicly('public/Videos');
                Video::create([
                    'modelid' => $modelId,
                    'videopath' => $Videopath,
                    'videoorder' => ++$maxOrder
                ]);

            }


            return redirect()->back()->with('success', 'Files uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No files uploaded.');
    }
    /* Change The Photo Orders */
    public function photoorderupdate(Request $request)
    {
        $photoOrders = $request->input('photoOrders');

        foreach ($photoOrders as $photoOrder) {
            $photoId = $photoOrder['photoid'];
            $order = $photoOrder['photoorder'];

            Photos::where('photoid', $photoId)->update(['photoorder' => $order]);
        }

        return response()->json(['success' => true]);
    }


}