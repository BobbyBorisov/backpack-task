<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function markAsFinished(Task $task) {

        $task->markAsFinished();
        return redirect()->route('crud.task.index');
    }
}
