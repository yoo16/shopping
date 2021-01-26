<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Illuminate\Foundation\Http\FormRequest;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get();
        $data = ['items' => $items];
        return view('admin.item.index', $data);
    }

    public function create()
    {
        return view('admin.item.create');
    }

    public function add(ItemRequest $request)
    {
        //リクエストデータの取得
        $posts = $request->all();

        //items テーブルにデータを保存
        Item::create($posts);
        return redirect()->route('admin.item.index');
    }

    public function edit($id)
    {
        $item = Item::find($id);
        $data = ['item' => $item];
        return view('admin.item.edit', $data);
    }

    public function update(ItemRequest $request)
    {
        $posts = $request->all();

        Item::find($request->id)->update($posts);
        return redirect()->route('admin.item.edit', ['id' => $request->id]);
    }

    public function destroy(Request $request)
    {
        return redirect()->route('admin.item.index');
    }
}
