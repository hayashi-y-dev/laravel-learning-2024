<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // 在庫一覧表示
    public function index(Request $request)
    {
        // $stocks = Stock::when($request->category, function($query) use ($request) {
        //     return $query->where('category', $request->category);
        // })->get();
        $stocks = Stock::when($request->category, function ($query) use ($request) {
            return $query->where('category', $request->category);
        })->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->name . '%');
        })->get();

        //★動的に取得したい
        $categories = ['回復', '弾', '調合素材', 'その他'];

        return view('stocks.index', compact('stocks', 'categories'));
    }

    // 在庫詳細表示
    public function show($id, Request $request)
    {
        // $stock = Stock::findOrFail($id, Request $request);
        // return view('stocks.show', compact('stock'));

        // IDを元に在庫情報を取得
        $stock = Stock::findOrFail($id);
        // 検索パラメータがあれば取得
        $searchParams = $request->only(['category', 'name']);
        return view('stocks.show', compact('stock', 'searchParams'));
    }

    // 在庫登録画面
    public function create()
    {
        //★動的に取得したい
        $categories = ['回復', '弾', '調合素材', 'その他'];
        return view('stocks.create', compact('categories'));
    }

    // 在庫登録処理
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer',
        ]);

        Stock::create($request->all());
        return redirect()->route('stocks.index');
    }

    // 在庫更新画面
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        //★動的に取得したい
        $categories = ['回復', '弾', '調合素材', 'その他'];
        return view('stocks.edit', compact('stock', 'categories'));
    }

    // 在庫更新処理
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update($request->all());
        return redirect()->route('stocks.index');
    }

    // 在庫削除
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect()->route('stocks.index');
    }
}

