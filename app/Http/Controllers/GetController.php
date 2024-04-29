<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\Photos;
use App\Models\Video;

class GetController extends Controller
{
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
        $videos = Video::where('modelid', $model->modelid)->orderBy('videoorder')->get();
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
    public function listsearchModels(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $models = Models::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $models = Models::paginate(10);
        }

        return response()->json($models);
    }
}
