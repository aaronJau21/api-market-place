<?php

namespace App\Exceptions;

use Exception;

class InternalServerExcepion extends Exception
{
  protected $message;
  protected $code;
  public function __construct($message = 'Internal Server Error', $code = 500)
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
