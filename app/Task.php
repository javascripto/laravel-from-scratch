<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public static function incompleted()
    {
        return static::where('completed', 0)->get();
    }

    public function scopeCompleted($query, $value) // ($query, $val) -> Task::completed('yesterday')
    {
        return $query->where('completed', $value);
    }
}
