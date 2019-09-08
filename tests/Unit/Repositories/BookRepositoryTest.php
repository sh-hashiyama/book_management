<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use App\Repositories\Eloquent\BookRepository AS BookRepo;

class BookRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $bookRepo;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->bookRepo = new BookRepo();
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:refresh');
        parent::tearDown();
    }

    /**
     * 既に登録ずみの書籍の場合,trueを返す
     *
     * @return void
     */
    public function test_success_existsByIsbn_登録されている場合はtrueを返す()
    {
        $result = $this->bookRepo->existsByIsbn('9784863542457');
        $this->assertTrue($result);
    }

    /**
     * isbnが空の場合falseを返す
     *
     * @return void
     */
    public function test_failed_existsByIsbn_isbnが空の場合はfalseを返す()
    {
        $result = $this->bookRepo->existsByIsbn('');
        $this->assertFalse($result);
    }

    /**
     * i登録されていない場合はfalseを返す
     *
     * @return void
     */
    public function test_failed_existsByIsbn_登録されていない場合はfalseを返す()
    {
        $result = $this->bookRepo->existsByIsbn('0000000000000');
        $this->assertFalse($result);
    }
}
