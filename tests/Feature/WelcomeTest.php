<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use DB;

class WelcomeTest extends TestCase
{
    use RefreshDatabase;
    
    public function testGuestUsersDoNotHaveAccessToHomeOrArticlesRoute()
    {
        $response = $this->get('/')->assertRedirect('/login');
        $response = $this->get('/articles')->assertRedirect('/login');
    }

    public function testLoggedInUsersHaveAccessToHomeRoute()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/')->assertStatus(200);
    }

    public function testLoggedInUsersHaveAccessToArticlesRoute()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/articles')->assertStatus(200);
    }

    public function testALoggedInUserCanViewArticles()
    {
        $this->actingAs(User::factory()->create());

        $this->artisan('db:seed --class=ArticleSeeder --database="mysql2"');

        $articles = DB::connection('mysql2')->select('select * from articles');
        $view = $this->view('articles', compact('articles'));

        // assert: can view the articles from other database
        $view->assertSee('some article 1');
        $view->assertSee('some article 2');
        $view->assertSee('some article 3');
     }
    
}
