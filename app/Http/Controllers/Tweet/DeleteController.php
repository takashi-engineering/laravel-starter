<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // リクエストからTweetIDを取得
        $tweetId = (int) $request->route('tweetId');
        // Tweetを取得
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        // Tweetを削除
        $tweet->delete();

        // Tweetの削除処理を１行で書くならこう
        // Tweet::destroy($tweetId);

        // Indexページにリダイレクト
        return redirect()
            ->route('tweet.index')
            ->with('feedback.success', "つぶやきを削除しました。");
    }
}
