<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia, LogsActivity;

    protected $fillable = [

        'name',
        'slug',

        'description',
        'price',

        'category_id',

    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function getImageAttribute($value)
    {
        $modelName = get_class($this);
        $media = $this->getFirstMediaUrl($modelName);
        return $media;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->withPivot(['quantity', 'price', 'total'])
            ->withTimestamps();
    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(request()->fullUrl())
            ->setDescriptionForEvent(fn(string $eventName) => "Product Activity log for {$this->name} ({$eventName})")
            ->logOnly(['name', 'slug', 'price', 'category_id']);
    }


}
