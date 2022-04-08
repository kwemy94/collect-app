<?php

namespace App\Http\Controllers\Api;

use App\Models\Configuration\Collector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CollectorController extends Controller
{
    
    public function index()
    {
        $collectors = Collector::latest()->get()
             ->map(function ($collector){
                return [
                    'name' => $collector->name,
                'phone' => $collector->phone,
                'email' => $collector->email,
                'cni' => $collector->cni
                ];
            });
        return response()->json($collectors);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $valide = $request->validate([
            'name' => 'required|',
            'surname' => '',
            'phone' => 'required|',
            'email' =>'',
            'cni' => 'required|',
            'date_of_issue' => 'required|',
            'delivered_in' => 'required|',
        ]);

        $collector = Collector::create($request->all());

        return response(['Insert successfully !!',200]);
    }


    public function show($id)
    {
        $collector = Collector::findOrFail($id);
      
        return response()->json(Collector::findOrFail($id));
        
    }

 
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
