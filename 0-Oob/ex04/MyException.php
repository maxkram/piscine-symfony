<?php
class MyException extends Exception {
    public function __construct($message = "Unauthorized HTML tag used.", $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
?>