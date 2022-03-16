<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Shore;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function getPropertyById($id)
    {
        try {
            
            $property = Property::findOrFail($id);
            $property->shores = Shore::where("property_id", $property->id)->get() ?? [];
            return $property;   

        } catch (\Exception $th) {
            return $th->getMessage();
        }

    }

    public function createShore(Request $request, $id)
    {
        try {
            
             $values["name"] = $request->name;
             $values["description"] = $request->description;
             $values["date"] = date($request->date);
             
             $new = new Shore($values);
             $new->property_id = intval($id) ;
             $new->save();

             return $new;

        } catch (\Exception $th) {
            return $th->getMessage();
        }

    }
}

