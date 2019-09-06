<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            ['title' => '基礎から学ぶvue.js', 'isbn' => '9784863542457', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2457/9784863542457.jpg?_ex=120x120', 'description' => ''],
            ['title' => 'PHPフレームワーク Laravel入門', 'isbn' => '9784798052588', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2588/9784798052588.jpg?_ex=120x120'],
            ['title' => 'Bootstrap 4 フロントエンド開発の教科書', 'isbn' => '9784297100209', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0209/9784297100209.jpg?_ex=120x120'],
            ['title' => '改訂新版JavaScript本格入門 ~モダンスタイルによる基礎から現場での応用まで', 'isbn' => '9784774184111', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/4111/9784774184111.jpg?_ex=120x120'],
            ['title' => 'jQuery最高の教科書', 'isbn' => '9784797372212', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/2212/9784797372212.jpg?_ex=120x120'],
            ['title' => 'PHPフレームワーク Laravel実践開発', 'isbn' => '9784798059075', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/9075/9784798059075.jpg?_ex=120x120'],
            ['title' => '基礎からしっかり学ぶC#の教科書', 'isbn' => '9784822298944', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/8944/9784822298944.jpg?_ex=120x120'],
            ['title' => 'ASP.NET MVC 5 実践プログラミング', 'isbn' => '9784798041797', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1797/9784798041797.jpg?_ex=120x120'],
            ['title' => 'C#プログラマーのための 基礎からわかるLINQマジック!', 'isbn' => '9784774180946', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/0946/9784774180946.jpg?_ex=120x120'],
            ['title' => 'いまどきのJSプログラマーのための Node.jsとReactアプリケーション開発テクニック', 'isbn' => '9784802611145', 'image_url' => 'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1145/9784802611145.jpg?_ex=120x120'],
        ]);
    }
}
