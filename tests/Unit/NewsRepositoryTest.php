<?php

namespace Tests\Unit;

use App\News;
use App\Repositories\NewsRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @var NewsRepository Репозиторий */
    protected $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = $this->app->make(NewsRepository::class);
    }

    public function testAll()
    {
        factory(News::class, 3)->create();
        $this->assertCount(3, $this->repository->all()->toArray());
    }

    public function testCreate()
    {
        $news = factory(News::class)->make()->toArray();
        $this->repository->create($news);
        $this->assertDatabaseHas('news', $news);
    }

    public function testFind()
    {
        $news = factory(News::class)->create();
        $found = $this->repository->find($news->id);
        $this->assertEquals($news->toArray(), $found->toArray());
    }

    public function testUpdate()
    {
        $news = factory(News::class)->create();
        $update = factory(News::class)->make()->toArray();
        $this->repository->update($news->id, $update);
        $this->assertDatabaseHas('news', $update);
    }

    public function testDestroy()
    {
        $news = factory(News::class)->create();
        $this->repository->destroy($news->id);
        $this->assertDatabaseMissing('news', $news->toArray());
    }

}
