<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ZTest extends TestCase
{
    public function testRefreshSecondaryDatabase() {
        $this->artisan('migrate:refresh --path=/database/migrations/blog2/2021_02_14_224625_create_articles_table.php --database="mysql2"');
        $this->artisan('db:seed --class=ArticleSeeder --database="mysql2"');
        $this->assertTrue(true);
    }
    
    public function testAddingUsers() {
        $this->artisan('db:seed --class=UserSeeder');
        $this->assertTrue(true);
    }
}
