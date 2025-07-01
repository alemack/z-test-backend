<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    public function index(Request $request)
    {
        $query = Tender::query();

        // Фильтрация по названию (name)
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        // Фильтрация по дате (updated_at)
        if ($request->filled('date')) {
            $query->whereDate('updated_at', $request->date);
        }

        return response()->json($query->get());
    }

    public function show($id)
    {
        $tender = Tender::find($id);

        if (!$tender) {
            return response()->json(['message' => 'Tender not found'], 404);
        }

        return response()->json($tender);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'external_code' => 'required|integer',
            'number' => 'required|string',
            'status' => 'required|string',
            'name' => 'required|string',
            'updated_at' => 'required|date',
        ]);

        $tender = Tender::create($data);

        return response()->json($tender, 201);
    }
}
