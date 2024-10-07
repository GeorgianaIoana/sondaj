<?php


namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function view(User $user, Task $task)
    {
        return true;
    }

    public function update(User $user, Task $task)
    {
        return $user->role === 'admin' || $user->id === $task->user_id;
    }

    public function delete(User $user, Task $task)
    {
        return $user->role === 'admin';
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }
}
