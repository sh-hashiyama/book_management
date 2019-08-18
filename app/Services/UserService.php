<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * googleアカウントの認証情報からユーザー情報を取得する
     *
     * @param object $gUser
     * @return \stdClass
     */
    public function getUserByGoogleAccount(object $gUser)
    {
        $user = $this->userRepo->getByEmail($gUser->email);

        if (empty($user)) {
            $user = $this->createUserByGoogle($gUser);
        }

        return $user;
    }

    /**
     * googleアカウントに合致するユーザーが存在しないとき新規登録する
     *
     * @param object $gUser
     * @return \stdClass
     */
    private function createUserByGoogle(object $gUser)
    {
        $user = [
            'name'     => $gUser->name,
            'email'    => $gUser->email,
            'password' => \Hash::make(uniqid()),
        ];

        return $this->userRepo->insert($user);
    }
}
