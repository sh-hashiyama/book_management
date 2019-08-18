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
     * ユーザーを新規登録する
     *
     * @param array $data
     * @return \stdClass
     */
    public function insert(array $data);
}
