<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function find(Request $reauest)
    {
        $item = Item::find($reauest->id);
        return response()->json($item);
    }

    public function get()
    {
        $items = Item::limit(10)->orderBy('code')->get();
        return response()->json($items);
    }
}
