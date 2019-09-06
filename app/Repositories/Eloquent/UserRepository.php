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
     * ユーザーIDから書籍に関するデータを取得する
     *
     * @param integer $userId
     * @return \Illuminate\Support\Collection
     */
    public function getBooksByUserId(int $userId)
    {
        return User::find($userId)->books;
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
