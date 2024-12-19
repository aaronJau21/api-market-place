<?php

namespace App\Exceptions;

use Exception;

class NotPermissionException extends Exception
{
  protected $message;
  protected $code;
  public function __construct($message = 'You do not have permission to access this resource.', $code = 403)
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
