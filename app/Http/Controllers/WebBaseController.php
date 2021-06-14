<?php


namespace App\Http\Controllers;


class WebBaseController extends Controller
{
    public function added()
    {
        request()
            ->session()
            ->flash('warning', 'Добавлено!');
    }

    public function edited()
    {
        request()
            ->session()
            ->flash('success', 'Обновлено!');
    }

    public function deleted()
    {
        request()
            ->session()
            ->flash('warning', 'Удалено!');
    }

    public function error()
    {
        request()
            ->session()
            ->flash('danger', 'Ошибка!');
    }

}
