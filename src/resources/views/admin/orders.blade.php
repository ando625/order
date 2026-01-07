@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{asset('css/orders.css')}}">
@endsection

@section('content')

<div class="admin-history-container">
    <h1 class="admin-title">注文履歴管理</h1>

    <div class="history-tabs">
        <a href="" class="tab-item active">日付別</a>
        <a href="" class="tab-item">月別</a>
    </div>

    <form action="" method="get" class="search-form">
        <div class="search-group">
            <label for="date" class="search-lavel">表示する日付を選択</label>
            <input type="date" name="date" id="date" value="" class="search-input">
            <button type="submit" class="search-button">台帳を更新</button>
        </div>
    </form>

    <div class="histroty-content">
        <div class="history-table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>注文日時</th>
                        <th>商品名</th>
                        <th>数量</th>
                        <th>合計金額</th>
                        <th>ステータス</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><!-- 2026/01/06 18:30 --></td>
                        <td><!-- 商品名 --></td>
                        <td><!-- 数量 --></td>
                        <td><!-- 金額 --></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="ledger-footer">
                        <td colspan="3" class="text-right">本日（選択日）の売上総計</td>
                        <td class="total-amount"></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection