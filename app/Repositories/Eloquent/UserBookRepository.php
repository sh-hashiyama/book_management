<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserBookRepositoryInterface;
use App\Models\UserBook;

class UserBookRepository implements UserBookRepositoryInterface
{
    protected $table = 'user_book';

    /**
     * ユーザーのもつ書籍情報を登録する
     *
     * @param array $data
     * @return bool
     */
    public function insert(array $data)
    {
        return UserBook::create($data);
    }

    /**
     * 各ユーザーが書籍に付与する情報を更新する
     * 
     * @param array $data
     * @param int $userId
     * @return bool
     */
    public function update(array $data, int $userId)
    {
        $userBook = UserBook::where('isbn', $data['isbn'])
            ->where('user_id', $userId)
            ->update([
                'type' => $data['type'],
                'memo' => $data['memo'],
            ]);

        return $userBook;
    }

    /**
     * 主キーに合致するデータが存在するか確認する
     * 
     * @param string $isbn
     * @param int $userId
     * @return bool
     */
    public function existsByPrimaryKey(string $isbn, int $userId)
    {
        return UserBook::where('isbn', $isbn)
            ->where('user_id', $userId)
            ->exists();
    }
}
