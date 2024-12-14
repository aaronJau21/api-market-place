<?php

namespace App\Exceptions;

use Exception;

class UnAuthorizeException extends Exception
{
  protected $message;
  protected $code;

  public function __construct($message = 'UnAuthorize', $code = 401)
  {
    $this->message = $message;
    $this->code = $code;
    parent::__construct($message, $code);
  }

  public function render()
  {
    return response()->json([
      'message' => $this->message,
      'code' => $this->code,
    ], $this->code);
  }
}
