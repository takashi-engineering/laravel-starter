<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // リクエストからTweetIDを取得
        $tweetId = (int) $request->route('tweetId');

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException();
        }

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
