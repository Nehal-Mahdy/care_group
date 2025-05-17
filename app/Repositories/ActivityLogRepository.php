<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedSort;
class ActivityLogRepository
{
    protected $model;

    public function __construct(ActivityLog $activityLog)
    {
        $this->model = $activityLog;
    }

    public function model()
    {
        return $this->model::class;
    }

    public function apiBuilder(Request $request = null)
    {
        $queryBuilder = QueryBuilder::for($this->model::query())
            ->allowedFilters([
                AllowedFilter::exact('log_name'),
                AllowedFilter::exact('subject_type'),
                AllowedFilter::exact('subject_id'),
                AllowedFilter::exact('causer_type'),
                AllowedFilter::exact('causer_id'),
                AllowedFilter::exact('properties'),
                AllowedFilter::exact('created_at'),
                AllowedFilter::exact('updated_at'),
            ])
            ->allowedSorts(['id', 'description', 'created_at', 'updated_at'])
            ->allowedIncludes(['subject', 'causer']);

        if ($request && $request->has('date_from') && $request->date_from) {
            $queryBuilder->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request && $request->has('date_to') && $request->date_to) {
            $queryBuilder->whereDate('created_at', '<=', $request->date_to);
        }

        if ($request && $request->has('filter') && isset($request->filter['description'])) {
            $description = $request->filter['description'];
            $queryBuilder->where('description', '=', $description);
        }

        if ($request && $request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $queryBuilder->where(function ($query) use ($searchTerm) {
                $query->where('log_name', 'like', "%$searchTerm%")
                      ->orWhere('description', 'like', "%$searchTerm%")
                      ->orWhere('subject_type', 'like', "%$searchTerm%")
                      ->orWhere('properties', 'like', "%$searchTerm%")
                      ->orWhere('causer_type', 'like', "%$searchTerm%");
            });
        }

        return $queryBuilder;
    }





    public function all()
    {
        // Pass an empty request to the apiBuilder method
        return $this->apiBuilder(request())->get();
    }
    public function getActivityLogs(Request $request, $perPage)
    {
        return $this->apiBuilder($request)->paginate($perPage);
    }
}
