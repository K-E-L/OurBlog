<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use DB;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    public function testAUserCanCreateAPost()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        // assert: a post has been created
        $this->assertCount(1, Post::all());
    }
    
    public function testAUserCanViewTheirOwnPost()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        $posts = Post::with(['creator'])->orderBy('created_at', 'DESC')->paginate(10, ["*"], 'posts');
        $view = $this->view('dashboard', compact('posts'));

        // assert: a post has been created
        $view->assertSee('some post');
    }
    
    public function testAUserCanViewSomeoneElsesPost()
    {
        // user will try to view user2's post
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $this->actingAs($user2);

        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        $this->actingAs($user);

        $posts = Post::with(['creator'])->orderBy('created_at', 'DESC')->paginate(10, ["*"], 'posts');
        $view = $this->view('dashboard', compact('posts'));

        // assert: a post has been created
        $view->assertSee('some post');
    }
    
    public function testAUserCanDeleteTheirOwnPost()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);
        
        // assert: a post has been created
        $this->assertCount(1, Post::all());

        $post = $user->posts->first();

        $response = $this->post('/posts/' . $post->id .  '/destroy');

        // assert: a post has been destroyed
        $this->assertDeleted($post);
    }

    public function testAUserCannotDeleteSomeoneElsesPost()
    {
        // user will try to delete user2's post
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        
        $this->actingAs($user2);

        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        // assert: user2 created a post
        $this->assertCount(1, Post::all());

        $post = $user2->posts->first();

        $this->actingAs($user);

        $response = $this->post('/posts/' . $post->id .  '/destroy');

        // assert: user was unable to destroy the post
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'body' => $post->body,
        ]);
    }
    
    public function testAUserCanEditTheirOwnPost()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        // assert: a post has been created
        $this->assertCount(1, Post::all());

        $post = $user->posts->first();

        $response = $this->post('/posts/'. $post->id . '/edit', [
            'body' => 'some edited post'
        ]);

        // assert: the post still exists and has the edited body
        $this->assertCount(1, Post::all());
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'body' => 'some edited post',
        ]);
    }

    public function testAUserCannotEditSomeoneElsesPost()
    {
        // user will try to edit user2's post
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        
        $this->actingAs($user2);

        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        // assert: user2 created a post
        $this->assertCount(1, Post::all());

        $post = $user2->posts->first();

        $this->actingAs($user);

        $response = $this->post('/posts/'. $post->id . '/edit', [
            'body' => 'some edited post'
        ]);
        
        // assert: user was unable to edit the post
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'body' => $post->body,
        ]);
    }
    
}
