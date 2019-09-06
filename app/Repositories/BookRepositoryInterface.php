<?php

namespace App\Repositories;

interface BookRepositoryInterface
{
    /**
     * 書籍の登録を行う
     *
     * @param array $data
     * @return bool
     */
    public function insert(array $data);

    /**
     * isbnに合致する書籍の検索を行う
     *
     * @param string $isbn
     * @return bool
     */
    public function existsByIsbn(string $isbn);
}
