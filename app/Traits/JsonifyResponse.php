<?php

namespace App\Traits;

use Exception;

trait JsonifyResponse
{
    public function sendSuccess($msg = "Action was successfull")
    {
        $this->emit('toast', 'success', 'Success Notfication', "$msg ✅");
    }

    public function sendError($msg = "Action was failed")
    {
        $this->emit('toast', 'error', 'Error Occured', "$msg ❌");
    }

    public function sendException(Exception $e)
    {
        $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->getMessage() . ' ❌');
    }
}
