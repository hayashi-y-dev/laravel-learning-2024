@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- 在庫詳細カード -->
        <div class="card">
            <div class="card-header">
                <h5>在庫詳細</h5>
            </div>
            <div class="card-body">
                <!-- 在庫項目の詳細を表示 -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{ $stock->id }}</li>
                    <li class="list-group-item"><strong>商品名:</strong> {{ $stock->name }}</li>
                    <li class="list-group-item"><strong>種別:</strong> {{ $stock->category }}</li>
                    <li class="list-group-item"><strong>個数:</strong> {{ $stock->quantity }}</li>
                    <li class="list-group-item"><strong>メモ:</strong> {{ $stock->memo }}</li>
                </ul>

                <!-- 在庫更新画面へ遷移ボタン（後で実装予定） -->
                <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning">編集</a>
            </div>
        </div>

        <!-- 検索条件を保持して在庫一覧に戻るボタン -->
        <div class="mt-3">
            <form action="{{ route('stocks.index') }}" method="GET" style="display:inline;">
                @foreach ($searchParams as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <button type="submit" class="btn btn-secondary">戻る</button>
            </form>
        </div>
    </div>
@endsection
