<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class CountNewsView
{
    public function handle(Request $request, Closure $next)
    {
        $newsId = $request->route('id'); // Asumsikan ID berita diambil dari route parameter
        $ipAddress = $request->ip();
        $date = Carbon::now()->toDateString();
        $cacheKey = "news_viewed_{$newsId}_{$ipAddress}_{$date}";

        if ($newsId && !Cache::has($cacheKey)) {
            News::where('id', $newsId)->increment('views');
            Cache::put($cacheKey, true, 1440); // Cache selama 1 hari (1440 menit)
        }

        return $next($request);
    }
}
