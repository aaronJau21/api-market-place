<?php

namespace App\Exceptions;

use Exception;

class BadRequestException extends Exception
{
  protected $message;
  protected $code;

  public function __construct($message = 'Bad Request', $code = 400)
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
