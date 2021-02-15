<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = Article::create([
            'body' => 'some article 1'
        ]);
        $article2 = Article::create([
            'body' => 'some article 2'
        ]);
        $article3 = Article::create([
            'body' => 'some article 3'
        ]);

        
    }
}
