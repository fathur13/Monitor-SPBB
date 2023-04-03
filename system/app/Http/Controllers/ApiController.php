<?php

namespace App\Http\Controllers;

use App\Models\MSensor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $sensor = MSensor::all();
        return response()->json($sensor);
    }

    public function show($id)
    {
        $sensor = MSensor::findOrFail($id);
        return response()->json($sensor);
    }

    public function latest(): JsonResponse
    {
        $sensor = MSensor::orderBy('created_at', 'desc')->first();
        return response()->json($sensor);
    }

    public function getByDateRange(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $sensor = MSensor::whereBetween('created_at', [$start_date, $end_date])->get();

        $data = [];
        foreach ($sensor as $s) {
            $data[] = [
                'id' => $s->id,
                'suhu' => $s->value,
                'created_at' => $s->created_at->format('Y-m-d H:i:s')
            ];
        }

        return response()->json($data);
    }
    // 
    public function view()
    {
        $sensor = MSensor::all();
        return view('API/api-index', ['sensor' => $sensor]);
    }

    public function ViewRestfull()
    {
        $sensor = MSensor::all();
        return view('API/api-restfull', ['sensor' => $sensor]);
    }

    public function store(Request $request)
    {
        $sensor = new MSensor();
        $sensor->suhu = $request->input('suhu');
        $sensor->save();

        return response()->json([
            'message' => 'Data suhu berhasil ditambahkan.'
        ]);
    }
    public function update(Request $request, $id)
    {
        $sensor = MSensor::find($id);
        // $sensor->sensor_id = $request->input('sensor_id');
        $sensor->suhu = $request->input('suhu');
        $sensor->save();

        return response()->json(['message' => 'sensor updated successfully'], 200);
    }

    public function destroy($id)
    {
        $sensor = MSensor::find($id);
        $sensor->delete();

        return response()->json(['message' => 'sensor deleted successfully'], 200);
    }
}
