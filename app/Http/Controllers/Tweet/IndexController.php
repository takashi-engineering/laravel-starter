<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
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
    public function __invoke(Request $request, Factory $factory, TweetService $tweetService)
    {
        // $tweet = Tweet::all();

        /**
         * インスタンスの生成は行なっていないが、ControllerがTweetのEloquentモデルに依存している状態
         */
        // $tweet = Tweet::orderBy('created_at', 'DESC')->get();

        /**
         * TweetServiceのインスタンスを作成
         * これでTweetServiceに依存している状態になった。
         */
        // $tweetService = new TweetService();
        // つぶやきの一覧を取得
        $tweet = $tweetService->getTweet();

        // dd($tweet);
        // return view('tweet.index', ['name' => 'laravel']);
        // return View::make('tweet.index', ['name' => 'Laravel']);
        return $factory->make('tweet.index', ['tweets' => $tweet]);
    }
}
