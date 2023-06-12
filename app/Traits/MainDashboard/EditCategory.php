<?php

namespace App\Traits\MainDashboard;

trait EditCategory
{
    protected function makeEditableCategory(): void
    {
        session()->put('editCategory', true);
    }

    protected function unsetEditableCategory(): void
    {
        session()->forget('editCategory');
    }

    protected function canEditCategory(): bool
    {
        return session()->has('editCategory');
    }
}
