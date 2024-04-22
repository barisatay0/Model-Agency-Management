<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use Illuminate\Support\Facades\Crypt;

class Manager extends Controller
{
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
    }//
    public function men(Request $request)
    {
        Models::where('gender', 'men')->update(['selected' => 1]);
        Models::where('gender', '!=', 'men')->update(['selected' => 0]);
        return redirect('/');
    }
    public function women(Request $request)
    {
        Models::where('gender', 'women')->update(['selected' => 1]);
        Models::where('gender', '!=', 'women')->update(['selected' => 0]);
        return redirect('/');
    }
}
