<?php

namespace App\Traits;

trait ButtonsActions
{
    public function getActions(string $section)
    {
        $buttons = [];
        switch ($section) {
            case 'tasks':
                $buttons = [
                   '<a data-method="DELETE" data-delete="'.route('delete').'" href="javascript:void(0)" onclick="deleteTask($(this),'.$this->id.')"><i class="fa fa-trash text-red-400"></i></a>',
                ];
                break;
        }
        return implode(" ", $buttons);
    }
}
