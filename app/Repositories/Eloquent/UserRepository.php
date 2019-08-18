<?php

namespace App\Repositories\Eloquent;

use App\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $table = 'users';

    /**
     * メールアドレスでユーザーを取得する
     *
     * @param string $email
     * @return \stdClass
     */
    public function getByEmail(string $email)
    {
        return User::where('email', $email)
                        ->first();
    }

    /**
     * ユーザーを新規登録する
     *
     * @param array $data
     * @return \stdClass
     */
    public function insert(array $data)
    {
        return User::create($data);
    }
}
