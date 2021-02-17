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

        $this->artisan('db:seed --class=ArticleSeeder --database="mysql2"');

        $response = $this->get('/articles')->assertStatus(200);
    }

    public function testALoggedInUserCanViewArticles()
    {
        $this->actingAs(User::factory()->create());

        $this->artisan('db:seed --class=ArticleSeeder --database="mysql2"');

        $articles = DB::connection('mysql2')->select('select * from articles');
        $view = $this->view('articles', compact('articles'));

        // assert: can view the articles from other database
        $view->assertSee('Trump impeachment: What to expect from Senate trial');
        $view->assertSee('https://www.bbc.com/news/world-us-canada-55586677');
        $view->assertSee('Former US President Donald Trump is being put on trial by lawmakers for allegedly inciting a riot at the US Capitol.

Last month Mr Trump became the first president in US history to be charged with misconduct - or impeached - twice by the lower chamber of Congress.

Republicans and Democrats in the House of Representatives voted to pass an article of impeachment that accused Mr Trump of "incitement of insurrection".

The article alleged that Mr Trump had made false allegations of election fraud and encouraged his supporters to storm Congress on 6 January.

Now a trial is being held in the upper chamber of Congress, the Senate, which will decide whether to convict or clear Mr Trump of the charge.

This is an unprecedented moment for the US, which has never put an impeached president on trial after they have left office.

So, what can we expect?

How does the trial work?
The trial in the Senate is political, rather than criminal. A vote will be held at the end of the trial to determine whether Mr Trump is guilty of the charge.

A two-thirds majority of the 100-member Senate must back a guilty verdict to convict Mr Trump.

If Mr Trump is convicted, senators could also vote to bar him from ever holding public office again.


media captionHouse delivers impeachment charge against Donald Trump to the Senate
What happens when?
The trial opened on Tuesday with a four-hour debate on whether the proceedings were unconstitutional because Mr Trump is no longer president. A 56-44 majority then voted in favour of continuing, with six Republicans backing the measure.

Each side will then be given 16 hours in total to make their arguments, and this will be limited to eight hours in any one day.

There will be an option to request a debate and a vote on whether witnesses should be called.

Both Democrats and Republicans are said to favour a speedy trial, amid an ongoing effort to get President Joe Biden\'s Covid-19 relief plan approved.

It is thought a vote on a conviction could come as early as Monday if no witnesses are called.

What is the prosecution\'s case?
Democrats prosecuting the case opened the proceedings by showing a dramatic video montage of Mr Trump\'s 6 January speech and the deadly rioting by some of his supporters.

"That\'s a high crime and misdemeanour," Representative Jamie Raskin of Maryland - who is leading the case - said of the footage. "If that\'s not an impeachable offence, then there\'s no such thing."');
     }
    
}
