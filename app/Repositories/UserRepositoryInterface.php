<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    /**
     * メールアドレスでユーザーを取得する
     *
     * @param string $email
     * @return \stdClass
     */
    public function getByEmail(string $email);

    /**
     * ユーザーIDから書籍に関するデータを取得する
     *
     * @param integer $userId
     * @return \Illuminate\Support\Collection
     */
    public function getBooksByUserId(int $userId);


    /**
     * ユーザーを新規登録する
     *
     * @param array $data
     * @return \stdClass
     */
    public function insert(array $data);
}
