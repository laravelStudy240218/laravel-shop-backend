<?php

namespace App\Dtos;

use Illuminate\Http\Request;

class ClientSertDto
{
    private $ip;

    public function __construct(Request $request)
    {
        $this->ip = $request->ip();
    }

    public function getIp()
    {
        return $this->ip;
    }
}
