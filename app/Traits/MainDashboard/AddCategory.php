<?php

namespace App\Traits\MainDashboard;

trait AddCategory
{
    protected function makeAddCategory(): void
    {
        session()->put('addCategory', true);
    }

    protected function unsetAddCategory(): void
    {
        session()->forget('addCategory');
    }

    protected function canAddCategory(): bool
    {
        return session()->has('addCategory');
    }
}
