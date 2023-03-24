<?php

declare(strict_types=1);

namespace App\Mail\Model;

use App\Services\UserService;

class AdminModel
{
    public array $report;

    public function __construct(
        private UserService $userService
    ){
        $this->setReport();
    }

    private function setReport():void
    {
        $this->report = $this->userService->getUsersByCountry();
    }

}
