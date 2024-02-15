<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait PermissionTrait
{
    protected $items = [];

    public function __construct()
    {
        $this->items = $this->prepareItems(config('abilities'));
    }

    protected function prepareItems($items)
    {
        $user = Auth::user();
        foreach ($items as $key => $item) {
            if (isset($item['ability']) && !$user->can($item['ability'])) {
                unset($items[$key]);
            }
        }
        return $items;
    }
}
