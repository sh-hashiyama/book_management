@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="form-group">
            <a href="{{ route('book.create') }}" class="btn btn-primary">書籍登録へ</a>
        </div>
        <img src="/img/loading.gif" alt="loading" v-if="loading">
        <div class="row">
            <div class="col-sm-2" v-for="book in books">
                <div class="card mb-4 shadow-sm h-100">
                    <img v-bind:src="book.image_url" class="card-img-top" v-bind:alt="book.title">
                    <div class="card-body">
                        <a class="card-link" href="#" data-toggle="modal" data-target="#modal1" v-on:click="showDetail(book)">@{{ book.title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.modal', ['action' => 'update()', 'actionName' => '更新'])
@push('scripts')
<script src="{{ asset('js/book/index.js') }}" defer></script>
@endpush
@endsection
