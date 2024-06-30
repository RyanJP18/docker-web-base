<?php

namespace App\Utility\EventSourcing;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EventSourcing\Projections\Projection as SpatieProjection;

class Projection extends SpatieProjection
{
    use HasUlids, SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function getKeyName()
    {
        return 'id';
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    protected $guarded = [];
}
