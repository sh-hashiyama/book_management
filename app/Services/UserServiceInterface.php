<?php

namespace App\Services;

interface UserServiceInterface
{
    /**
     * googleアカウントの認証情報からユーザー情報を取得するs
     *
     * @param object $gUser
     * @return void
     */
    public function getUserByGoogleAccount(object $gUser);
}
