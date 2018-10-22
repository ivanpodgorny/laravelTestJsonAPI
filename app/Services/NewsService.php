<?php

namespace App\Services;

use App\Http\Requests\News as NewsRequest;
use App\News;
use App\Repositories\NewsRepository;
use Illuminate\Database\Eloquent\Collection;

class NewsService
{
    /** @var NewsRepository Репозиторий */
    protected $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Возвращает список новостей
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->repository->all();
    }

    /**
     * Добавляет новость
     *
     * @param NewsRequest $input Атрибуты для вставки
     * @return News Добавленная новость
     */
    public function create(NewsRequest $input): News
    {
        $validated = $input->validated();
        return $this->repository->create($validated);
    }

    /**
     * Возвращает новость по ID
     *
     * @param int $id ID новости
     * @return News
     */
    public function find(int $id): News
    {
        return $this->repository->find($id);
    }

    /**
     * Обновляет новость
     *
     * @param int $id ID новости
     * @param NewsRequest $input Атрибуты для обновления
     * @return News Обновленная новость
     */
    public function update(int $id, NewsRequest $input): News
    {
        $validated = $input->validated();
        return $this->repository->update($id, $validated);
    }

    /**
     * Удаляет новость по ID
     *
     * @param int $id ID новости
     * @return bool True, если новость удалена
     */
    public function destroy(int $id): bool
    {
        return $this->repository->destroy($id);
    }

}