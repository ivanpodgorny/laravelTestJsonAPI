<?php

namespace Tests\Feature;

use App\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/api/news');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $news = factory(News::class)->make()->toArray();
        $response = $this->postJson('/api/news', $news);
        $response->assertStatus(200);
        $this->assertDatabaseHas('news', $news);
    }

    public function testShow()
    {
        $news = factory(News::class)->create();
        $response = $this->get('/api/news/' . $news->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $news = factory(News::class)->create();
        $update = factory(News::class)->make()->toArray();
        $response = $this->putJson('/api/news/' . $news->id, $update);
        $response->assertStatus(200);
        $this->assertDatabaseHas('news', $update);
    }

    public function testDelete()
    {
        $news = factory(News::class)->create();
        $response = $this->delete('/api/news/' . $news->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('news', $news->toArray());
    }

    public function testNotFound()
    {
        $response = $this->get('/api/news/100000000');
        $response->assertStatus(404);
    }

    public function testValidation()
    {
        $response = $this->post('/api/news');
        $response->assertStatus(422);
    }

}
