<?php

namespace Otrigg\Formmailer\Http\Middleware;
use App\Http\Middleware;
use Otrigg\Formmailer\Services\FormService;

use Closure;

class CheckForm
{   

    protected $service;

    public function __construct(FormService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   

        if(!$this->service->validateRequest($request)) {

            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
            
        }

        return $next($request);
    }
}
