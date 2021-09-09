<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Company;
use Czim\NestedModelUpdater\Requests\AbstractNestedDataRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    // Add "extends AbstractNestedDataRequest" instead of "FormRequest" and this will result in an infinite loop

    // protected function getNestedModelClass(): string
    // {
    //     return Company::class;
    // }

    // protected function isCreating(): bool
    // {
    //     // As an example, the difference between creating and updating here is
    //     // simulated as that of the difference between using a POST and PUT method.

    //     return request()->getMethod() != 'PUT' && request()->getMethod() != 'PATCH';
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'street' => 'nullable|string',
            'city' => 'required|string',
        ];
    }
}
