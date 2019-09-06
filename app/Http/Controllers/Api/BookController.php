<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BookServiceInterface;
use App\Http\Requests\Api\BookRegisterRequest;
use App\Http\Requests\Api\BookUpdateRequest;
use Auth;

class BookController extends Controller
{
    /**
     * App\Services\BookServiceInterface
     */
    private $bookService;

    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * ユーザーの書籍一覧を取得する
     * 
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(
            $this->bookService->search(Auth::id())
        );
    }

    /**
     * キーワードから書籍のデータを検索する
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        return response($this->bookService->searchForRakutenAPI($request->keyword));
    }

    /**
     * ユーザーの持つ書籍を登録します
     *
     * @param App\Http\Requests\Api\BookRegsiterRequest $request
     * @return JsonResponse
     */
    public function store(BookRegisterRequest $request)
    {
        // 
        $result = $this->bookService->store($request->all());

        if ($result) {
            return response('success', 200);
        } else {
            return response('error', 500);
        }
    }

    /**
     * 各ユーザーの書籍に付与する情報を更新する
     * 
     * @param App\Http\Requests\Api\BookUpdateRequest $request
     * @return JsonResponse
     * 
     */
    public function update(BookUpdateRequest $request)
    {
        $result = $this->bookService->update($request->all(), Auth::id());

        if ($result) {
            return response('success', 200);
        } else {
            return response('error', 500);
        }
    }

    /**
     * 既にユーザーが登録している書籍か確認する
     * 
     * @param string $isbn
     * @return JsonResponse
     */
    public function isRegistered(string $isbn)
    {
        return response($this->bookService->isRegisteredBook($isbn, Auth::id()));
    }
}
