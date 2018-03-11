<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Task extends Model
{
    use CrudTrait;

    protected $table = 'tasks';
    protected $guarded = [];
    protected $with = ['status'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function markAsFinished() {
        $newStatus = Status::where('name', 'Finished')->firstOrFail();
        $this->status()->associate($newStatus);
        $this->save();
    }
}
