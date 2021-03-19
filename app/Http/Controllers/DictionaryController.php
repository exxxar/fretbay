<?php

namespace App\Http\Controllers;


use App\Models\TypeOfObject;
use App\Models\TypeOfTransport;
use App\Vehicle;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function typeOfTransport()
    {
        return response()->json(TypeOfTransport::where("is_active", true)
            ->orderBy("position", "DESC")
            ->get()
        );
    }

    public function typeOfObject()
    {
        return response()->json(TypeOfObject::with(["category"])
            ->where("is_active", true)
            ->orderBy("position", "DESC")
            ->get()
        );
    }

    public function typeOfObjectByCategory($categoryId)
    {
        return response()->json(TypeOfObject::with(["category"])
            ->where("object_category_id", $categoryId)
            ->where("is_active", true)
            ->orderBy("position", "DESC")
            ->get()
        );
    }

    public function vehicles()
    {
        return response()->json(Vehicle::where("is_active", true)
            ->orderBy("position", "DESC")
            ->get()
        );
    }
}
