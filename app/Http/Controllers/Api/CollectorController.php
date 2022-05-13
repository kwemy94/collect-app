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
                    'id' => $collector->id,
                    'name' => $collector->name,
                    'phone' => $collector->phone,
                    'email' => $collector->email,
                    'cni' => $collector->cni,
                    'date_of_issue' => $collector->date_of_issue,
                    'delivered_in' => $collector->delivered_in
                ];
            });
        return response()->json($collectors);
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
        $collector = Collector::find($id);

        if (is_null($collector)) {
            return response()->json('Data not found !', 404);
        } else {
            return response()->json($collector);
        }
        
    }

 
    public function update(Request $request, $id)
    {
        $collector = Collector::find($id);

        if (is_null($collector)) {
            return response('Data Collector  not found !!', 404);
        } else{
            $collector->update($request->all());

            return response('Data Collector Updated successfully !!');
        }

    }


    public function destroy($id)
    {
        $deleteCollector = Collector::find($id);

        if ($deleteCollector == null) {
            return response('Collector Data not found !!', 404);
        } else {
            $deleteCollector->delete();
            return response('Collector Data Deleted successfully !!', 200);
        }
    }

    #le programme enverrai un form muni de 2 champs et le form soumis, on reccupère
    # le collector_id et le sector_id
    public function assignCollector(Request $request) {
        $request->validate([
            'sector' => 'required|integer', # sector id
            'collector' => 'required|integer'  # colletor id
        ]);

        $collector = Collector::find($request->collector);

        if ($collector != null) {
            $collector->sectors()->attach($request->sector);

            return response()->json('Collector assigned succesfully !', 200);
        } else {
            return response()->json('Oups !! Someting are round, try again', 500);
        }
    }
}
