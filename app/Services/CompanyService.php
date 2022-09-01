<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class CompanyService
{
    public function getCompanyData($companyId): Response
    {
        $endPoint = config('companies.settings.baseUrl') . $companyId;

        return Http::withHeaders(['Authorization' => config('companies.settings.authorizationKey')])
            ->get($endPoint);
    }
}
