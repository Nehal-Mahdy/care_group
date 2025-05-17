<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;


class ActivityLog extends Model
{
    use LogsActivity;

    protected $table = 'activity_log';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(request()->fullUrl()) 
            ->setDescriptionForEvent(fn (string $eventName) => "Activity on the page: " . request()->fullUrl() . " ({$eventName})")
            ->logOnlyDirty();
    }

    public function getCauserIdAttribute($value)
    {
        return request()->ip();
    }
}
