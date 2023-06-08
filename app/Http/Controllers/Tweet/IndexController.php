<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

/**
 * シングルアクションコントローラー
 */
class IndexController extends Controller
{
    /**
     * invokeメソッド
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request, Factory $factory)
    {
        // return view('tweet.index', ['name' => 'laravel']);
        // return View::make('tweet.index', ['name' => 'Laravel']);
        return $factory->make('tweet.index', ['name' => 'laravel']);
    }
}
