<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    protected $table = 'books';

    /**
     * 書籍の登録を行う
     *
     * @param array $data
     * @return integer
     */
    public function insert(array $data)
    {
        return Book::create($data);
    }

    /**
     * isbnに合致する書籍の検索を行う
     *
     * @param string $isbn
     * @return bool
     */
    public function existsByIsbn(string $isbn)
    {
        return Book::where('isbn', $isbn)->exists();
    }
}
