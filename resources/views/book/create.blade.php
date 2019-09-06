@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-5 text-center">
        <h2>書籍検索</h2>
        <p class="lead">ここでは書籍を検索することができます。</p>
    </div>
    <div class="alert alert-primary" role="alert" v-if="alertStatus === 'success'"><strong>登録に成功しました</strong></div>
    <div class="alert alert-danger" role="alert" v-else-if="alertStatus === 'error'"><strong>登録に失敗しました</strong></div>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-inline">
                <input name="keyword" type="text" class="form-control" v-model="keyword" placeholder="テキスト入力欄">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-primary" v-on:click="getBooks()">検索</button>
                </span>
            </div>
        </div>
        <div class="col-sm-4"><a class="btn btn-outline-secondary" href="{{ route('book') }}" role="button">書籍一覧へ</a></div>
    </div>
    <br>
    <div class="row mb-2" v-for="result in results" v-bind:key="result.Item.isbn">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <a href="#" data-toggle="modal" data-target="#modal1" v-on:click="showDetail(result.Item)">@{{ result.Item.title }}</a>
                    <div class="mb-1 text-muted">@{{ result.Item.salesDate }}</div>
                    <a href="#"></a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" v-bind:src="result.Item.mediumImageUrl" alt="Card image cap">
            </div>
        </div>
    </div>
    @include('components.modal', ['action' => 'register()', 'actionName' => '登録'])
</div>
@push('scripts')
<script src="{{ asset('js/book/create.js') }}" defer></script>
@endpush
@endsection