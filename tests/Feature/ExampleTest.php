<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Should return rules instead returns validation error.
     * If you remove "extends FormRequest" from the AddressRequest.php this test will pass
     * If you extend "AbstractNestedDataRequest" instead you will have an infinite loop
     *
     * @return void
     */
    public function test_expected_rules()
    {
        $response = $this->post('/api/company', [
            "name" => 'test',
            "addresses" => [
                [
                    "street" => "street" ,
                    "city" => "bla"
                ]
            ]
        ]);

        $response->assertJson([
            "name"=> "required|string",
            "addresses"=> "array",
            "contacts"=> "array",
            "addresses.0"=> "array",
            "addresses.0.id"=> [
                "integer"
            ],
            "addresses.0.street"=> "nullable|string",
            "addresses.0.city"=> "required|string"
        ]);
    }
}
