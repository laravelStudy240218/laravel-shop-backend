<?php

namespace App\Dtos;

use Illuminate\Http\Request;

class UserCertDto
{
    private $id;
    private $password;
    private $token;

    public function __construct(Request $certRequestData)
    {
        $this->id = $certRequestData->id;
        $this->password = $certRequestData->password;
        $this->token = $certRequestData->token;
    }
}
