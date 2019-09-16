<?php

namespace App\Services;

interface BookServiceInterface
{
    /**
     * ユーザーの書籍を取得する
     *
     * @param integer $userId
     * @return \Illuminate\Support\Collection
     */
    public function search(int $userId);

    /**
     * 楽天ブックスapiによる書籍の検索
     *
     * @param string $keyword
     * @return json
     */
    public function searchForRakutenAPI(string $keyword);

    /**
     * 書籍の登録処理を行う
     *
     * @param array $data
     * @return bool
     */
    public function store(array $data);

    /**
     * 各ユーザーの書籍に付与する情報を更新する
     *
     * @param array $data
     * @param int $userId
     * @return bool
     */
    public function update(array $data, int $serId);

    /**
     * 既にユーザーが登録している書籍か確認する
     *
     * @param string $isbn
     * @param int $userId
     * @return array
     */
    public function isRegisteredBook(string $isbn, int $userId);
}
