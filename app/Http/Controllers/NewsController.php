<?php

namespace App\Http\Controllers;

use App\Http\Requests\News;
use App\Services\NewsService;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    /**
     * @var NewsService Сервис
     */
    protected $news;

    public function __construct(NewsService $news)
    {
        $this->news = $news;
    }

    /**
     * Возвращает список новостей
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->news->all()->toArray());
    }

    /**
     * Добавляет новость
     *
     * @param News $request
     * @return JsonResponse
     */
    public function store(News $request): JsonResponse
    {
        $inserted = $this->news->create($request);
        return response()->json($inserted->toArray());
    }

    /**
     * Возвращает новость по ID
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->news->find($id)->toArray());
    }

    /**
     * Обновляет новость
     *
     * @param News $request
     * @param  int $id
     * @return JsonResponse
     */
    public function update(News $request, int $id): JsonResponse
    {
        $updated = $this->news->update($id, $request);
        return response()->json($updated->toArray());
    }

    /**
     * Удаляет новость по ID
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json([
            'deleted' => $this->news->destroy($id),
        ]);
    }
}
