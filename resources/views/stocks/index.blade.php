<!-- @extends('layouts.app') -->
<x-app-layout>
<div class="container mt-4">
    <div class="card">
        <!-- カードのヘッダー -->
        <div class="card-header">
            <h5>在庫一覧</h5>
        </div>
        <!-- カードのボディ！ -->
        <div class="card-body">
            <!-- 検索フォーム -->
            <!-- <a href="{{ route('stocks.create') }}" class="btn btn-primary mb-3">在庫登録</a> -->
            <form action="{{ route('stocks.index') }}" method="GET" class="mb-4">
                <div class="row g-3">
                    <!-- 商品名検索 -->
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="商品名を入力" value="{{ request('name') }}">
                    </div>
                    <!-- 種別検索 -->
                    <div class="col-md-4">
                        <select name="category" class="form-select">
                            <option value="">全て</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}" @if(request('category') == $category) selected @endif>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- 検索ボタン -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">検索</button>
                    </div>
                </div>
            </form>

            <!-- 検索結果テーブル -->
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>商品名</th>
                        <th>種別</th>
                        <th>個数</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stocks as $stock)
                        <tr>
                            <td>{{ $stock->name }}</td>
                            <td>{{ $stock->category }}</td>
                            <td>{{ $stock->quantity }}</td>
                            <td><a href="{{ route('stocks.show', ['id' => $stock->id] + request()->all()) }}" class="btn btn-sm btn-secondary">詳細</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">データが見つかりません。</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>
