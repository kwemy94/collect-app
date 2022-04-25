<?php

namespace App\Http\Controllers\Api;

use App\Models\Configuration\Sector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sector = Sector::latest()->get()
            ->map( function($sector) {
                return [
                    'name' => $sector->name,
                    'locality' => $sector->locality
                ];
                
            }
        );

        return response()->json($sector);
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'locality' => 'required'
            ]
        );

        Sector::create($request->all());

        return response()->json('Sector Created successfully !!', 200);
    }


    public function show($id)
    {
        return response()->json(Sector::findorfail($id));
    }


    public function update(Request $request, $id)
    {
        $sector = Sector::find($id);

        if (is_null($sector)) {
            return response('Data Sector not found !!', 404);
        } else{
            $sector->update($request->all());

            return response('Sector Updated successfully !!');
        }
    }


    public function destroy($id)
    {
        $deleteSector = Sector::find($id);
        
        if ($deleteSector == null) {
            return response('Sector Data not found !!', 404);
        } else {
            $deleteSector->delete();
            return response('Sector Data Deleted successfully !!', 200);
        }
    }
}
