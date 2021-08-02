<?php

namespace App\Jobs\Middleware;

use Illuminate\Support\Facades\Redis;

class RateLimited
{
     /**
     * Process the queued job.
     *
     * @param  mixed  $job
     * @param  callable  $next
     * @return mixed
     */
    public function handle($job, $next)
    {
        Redis::throttle('processor')
            ->block(config('queue.connections.redis.throttle.block'))
            ->allow(config('queue.connections.redis.throttle.allow'))
            ->every(config('queue.connections.redis.throttle.every'))
            ->then(function () use ($job, $next) {
                    // Lock obtained...
                    $next($job);
                }, function () use ($job) {
                    // Could not obtain lock...
                    $job->release(config('queue.connections.redis.throttle.release'));
                });
    }
}
