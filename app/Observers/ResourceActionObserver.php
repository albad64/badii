<?php

namespace App\Observers;

use App\Notifications\DataChangeEmailNotification;
use App\Resource;
use Illuminate\Support\Facades\Notification;

class ResourceActionObserver
{
    public function created(Resource $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Resource'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
