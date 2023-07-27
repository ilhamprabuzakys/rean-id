<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    public function index()
    {
        // $url = config('app.url');
        // URL::forceRootUrl($url);

        $data = Category::with(['posts'])->orderBy('updated_at', 'desc')->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data) {
            return view('dashboard.categories.table__button')->with('data', $data);
        })
        ->make(true);
        // return response()->json([
        //     'data' => CategoryResource::collection($data),
        //     'message' => 'Fetch all data categories',
        //     'success' => true
        // ]);
    }
}
