<?php

namespace App\Http\Controllers;

use App\Repositories\ActivityLogRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Enum\Permissions;
use App\Models\Active;

class ActivityLogController extends Controller
{
    protected $activityLogRepository;

    public function __construct(ActivityLogRepository $activityLogRepository)
    {
        $this->activityLogRepository = $activityLogRepository;
    }

    public function index(Request $request)
    {
        $this->authorize(Permissions::ACTIVITY_LOG_LIST);


        $activities = $this->activityLogRepository->all();
        return view('activitylog.index', compact('activities'));
    }

}
