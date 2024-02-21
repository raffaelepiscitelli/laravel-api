<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('type', 'technologies')->paginate(20);
        return response()->json([
            "success" => true,
            "results" => $portfolios
        ]);
    }

    public function show(Portfolio $portfolio)
    {
        return response()->json([
            "success" => true,
            "results" => $portfolio
        ]);
    }

    public function search(Request $request)
    {
        $data = $request->all();
        if (isset($data['project'])) {
            $stringa = $data['project'];
            $portfolios = Portfolio::where('Project', 'LIKE', "%{$stringa}%")->get();
        } elseif (is_null($data['project'])) {
            $portfolios = Portfolio::all();
        } else {
            abort(404);
        }
        return response()->json([
            "success" => true,
            "results" => $portfolios,
            'matches' => count($portfolios)
        ]);
    }
}
