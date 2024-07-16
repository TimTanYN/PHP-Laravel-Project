<?php

namespace App\Observers;

use Illuminate\Support\Facades\Session;

class SelectedFoodsObserver
{
    public function saved($model)
    {
        Session::put('selectedFoods', $model);
    }

    public function deleted($model)
    {
        Session::forget('selectedFoods');
    }
}
