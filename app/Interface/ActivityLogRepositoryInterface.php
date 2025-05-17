<?php

namespace App\Interfaces;

use App\Models\ActivityLog;

interface ActivityLogRepositoryInterface
{
    public function model();

    public function apiBuilder();

    public function getAll();

    public function getAllWithRelations(array $relations);

    public function getActivityLogs($perPage);

    public function findById($id);

    public function create(array $data): ActivityLog;

    public function update(array $data, ActivityLog $activityLog): ActivityLog;

    public function delete(ActivityLog $activityLog): void;

    public function getAllActivitiesPaginated($perPage);
}
