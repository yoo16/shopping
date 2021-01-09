<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('admin.item.index');
    }
    
    public function create()
    {
        return view('admin.item.create');
    }

    public function add()
    {
        //return redirect('admin/item/');
        return redirect()->route('admin.item.index');
    }

    public function edit(Request $request)
    {
        $data = ['id' => $request->id];
        return view('admin.item.edit', $data);
    }

    public function update(Request $request)
    {
        return redirect()->route('admin.item.edit', ['id' => $request->id]);
    }

    public function destroy(Request $request)
    {
        return redirect()->route('admin.item.index');
    }

}
