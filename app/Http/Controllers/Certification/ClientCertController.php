<?php

namespace App\Http\Controllers\Certification;

use App\Dtos\ClientSertDto;
use App\Services\Certification\BlacklistIPService;
use Illuminate\Http\Request;

class ClientCertController
{
    private $blackListService;

    public function __construct()
    {
        $this->blackListService = new BlacklistIPService();
    }

    public function certification(Request $request)
    {
        $clientCertDto = new ClientSertDto($request);

        if($this->blackListService->isBlackListIp($clientCertDto->getIp())){
            abort('400','Bad Request');
        }


    }
}
