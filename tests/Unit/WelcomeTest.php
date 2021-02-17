<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use DB;

class PostTest extends TestCase
{
    use RefreshDatabase;
    
    public function testAUserCannotCreateAnEmptyPost()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/posts/create', [
            'body' => ''
        ]);

        // assert: a post has not been created
        $this->assertCount(0, $user->posts);
    }

    public function testAUserCannotCreateAnEditedEmptyPost()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        // assert: a post has been created
        $this->assertCount(1, $user->posts);

        $post = $user->posts->last();

        $response = $this->post('/posts/'. $post->id . '/edit', [
            'body' => ''
        ]);

        // assert: the post still exists and has the edited body
        $this->assertCount(1, $user->posts);
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'body' => 'some post',
        ]);
    }

    public function testAUserCanSeeTheirOwnPostDeleteButton()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);
        
        $posts = Post::with(['creator'])->orderBy('created_at', 'DESC')->paginate(10, ["*"], 'posts');
        $view = $this->view('dashboard', compact('posts'));
        
        // assert: user can see the delete button
        $view->assertSee('Delete');
    }

    public function testAUserCannotSeeSomeoneElsesPostDeleteButton()
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $this->actingAs($user2);
        
        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        $this->actingAs($user);
        
        $posts = Post::with(['creator'])->orderBy('created_at', 'DESC')->paginate(10, ["*"], 'posts');
        $view = $this->view('dashboard', compact('posts'));
        
        // assert: user can see the delete button
        $view->assertDontSee('Delete');
    }
    
    public function testAUserCanSeeTheirOwnPostEditButton()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);
        
        $posts = Post::with(['creator'])->orderBy('created_at', 'DESC')->paginate(10, ["*"], 'posts');
        $view = $this->view('dashboard', compact('posts'));
        
        // assert: user can see the delete button
        $view->assertSee('Edit');
    }

    public function testAUserCannotSeeSomeoneElsesPostEditButton()
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $this->actingAs($user2);
        
        $response = $this->post('/posts/create', [
            'body' => 'some post'
        ]);

        $this->actingAs($user);
        
        $posts = Post::with(['creator'])->orderBy('created_at', 'DESC')->paginate(10, ["*"], 'posts');
        $view = $this->view('dashboard', compact('posts'));
        
        // assert: user can see the delete button
        $view->assertDontSee('Edit');
    }
    
    
    
    
}
