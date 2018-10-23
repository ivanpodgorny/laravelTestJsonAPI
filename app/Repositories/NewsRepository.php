<?php

namespace App\Repositories;

use App\News;
use Illuminate\Database\Eloquent\Collection;

class NewsRepository
{
    /** @var string Класс модели */
    protected $model = News::class;

    /**
     * Возвращает список новостей
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model::all();
    }

    /**
     * Добавляет новость
     *
     * @param array $input Атрибуты для вставки
     * @return News Добавленная новость
     */
    public function create(array $input): News
    {
        /** @var News $model */
        $model = new $this->model();
        $model->fill($input);
        $model->save();

        return $model;
    }

    /**
     * Возвращает новость по ID
     *
     * @param int $id ID новости
     * @return News
     */
    public function find(int $id): News
    {
        return $this->model::findOrFail($id);
    }

    /**
     * Обновляет новость
     *
     * @param int $id ID новости
     * @param array $input Атрибуты для обновления
     * @return News Обновленная новость
     */
    public function update(int $id, array $input): News
    {
        $model = $this->find($id);
        $model->fill($input);
        $model->save();

        return $model;
    }

    /**
     * Удаляет новость по ID
     *
     * @param int $id ID новости
     * @return bool True, если новость удалена
     * @throws \Exception
     */
    public function destroy(int $id): bool
    {
        return $this->find($id)->delete();
    }

}