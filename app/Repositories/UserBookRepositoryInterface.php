<?php

namespace App\Repositories;

interface UserBookRepositoryInterface
{
    /**
     * ユーザーのもつ書籍情報を登録する
     *
     * @param array $data
     * @return bool
     */
    public function insert(array $data);

    /**
     * 各ユーザーが書籍に付与する情報を更新する
     * 
     * @param array $data
     * @param int $userId
     * @return bool
     */
    public function update(array $data, int $userId);

    /**
     * 主キーに合致するデータが存在するか確認する
     * 
     * @param string $isbn
     * @param int $userId
     * @return bool
     */
    public function existsByPrimaryKey(string $isbn, int $userId);
}
