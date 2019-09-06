<?php

namespace App\Services;

use App\Repositories\BookRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserBookRepositoryInterface;
use DB;
use Auth;

class BookService implements BookServiceInterface
{
    /**
     * @var App\Repositories\BookRepositoryInterface
     */
    private $bookRepo;

    /**
     * @var App\Repositories\UserRepositoryInterface
     */
    private $userRepo;

    /**
     * @var App\Repositories\UserBookRepositoryInterface
     */
    private $userBookRepo;

    public function __construct(
        BookRepositoryInterface $bookRepo,
        UserRepositoryInterface $userRepo,
        UserBookRepositoryInterface $userBookRepo
    ) {
        $this->bookRepo = $bookRepo;
        $this->userRepo = $userRepo;
        $this->userBookRepo = $userBookRepo;
    }

    /**
     * ユーザーの書籍を取得する
     *
     * @param integer $userId
     * @return Illuminate\Support\Collection
     */
    public function search(int $userId)
    {
        return $this->userRepo->getBooksByUserId($userId);
    }

    /**
     * 楽天ブックスapiによる書籍の検索
     *
     * @param string $query
     * @return json
     */
    public function searchForRakutenAPI(string $query)
    {
        $url = config('app.rakuten_books_api_url') . '?applicationId=' . config('app.rakuten_books_api_key') . '&booksGenreId=001&hits=10&title=' . $query;
        // cURLセッションを初期化
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない
        $response = $response =  curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * 書籍の登録処理を行う
     *
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        DB::beginTransaction();
        try {
            // まだbookテーブルに該当の書籍が登録されていない場合は登録処理を行う
            if (!$this->bookRepo->existsByIsbn($data['isbn'])) {
                $saveBook = [
                    'title' => $data['title'],
                    'isbn' => str_replace('-', '', $data['isbn']),
                    'image_url' => $data['img'],
                ];

                $this->bookRepo->insert($saveBook);
            }

            $saveUserBook = [
                'user_id' => Auth::user()->id,
                'isbn' => str_replace('-', '', $data['isbn']),
                'type' => $data['type'],
                'memo' => $data['memo'],
            ];
            $this->userBookRepo->insert($saveUserBook);
            DB::commit();

            return true;
        } catch (\PDOException $e) {
            DB::rollBack();
            report($e);

            return false;
        }
    }

    /**
     * 各ユーザーの書籍に付与する情報を更新する
     * 
     * @param array $data
     * @param int $userId
     * @return bool
     */
    public function update(array $data, int $userId)
    {
        return $this->userBookRepo->update($data, $userId);
    }

    /**
     * 既にユーザーが登録している書籍か確認する
     * 
     * @param string $isbn
     * @param int $userId
     * @return array
     */
    public function isRegisteredBook(string $isbn, int $userId)
    {
        $isRegisterd = $this->userBookRepo->existsByPrimaryKey($isbn, $userId);

        return ['isRegistered' => $isRegisterd];
    }
}
