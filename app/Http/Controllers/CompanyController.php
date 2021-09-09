<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Company;
use Czim\NestedModelUpdater\NestedValidator;

class CompanyController
{
    public function store(): array
    {
        $validator = new NestedValidator(Company::class);

        return $validator->validationRules([
            "name" => "test",
            "addresses" => [
                [
                    "street" => "abc",
                    "city" => "bla"
                ]
            ]
        ]);
    }
}
