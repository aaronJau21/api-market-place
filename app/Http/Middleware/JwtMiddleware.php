<?php

namespace App\Http\Middleware;

use App\Exceptions\BadRequestException;
use App\Exceptions\NotFoundException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    try {
      JWTAuth::parseToken()->authenticate();
    } catch (\Exception $e) {
      if ($e instanceof TokenInvalidException) throw new BadRequestException('Token Invalido');
      if ($e instanceof TokenExpiredException) throw new BadRequestException('Token Expirado');
      throw  new NotFoundException('Tokenn no encontrado');
    }
    return $next($request);
  }
}
