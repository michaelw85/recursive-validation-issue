<?php

declare(strict_types=1);

namespace App\Models;

use Czim\NestedModelUpdater\Traits\NestedUpdatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lecturize\Addresses\Traits\HasAddresses;
use Lecturize\Addresses\Traits\HasContacts;

class Company extends Model
{
    use HasFactory, HasAddresses, HasContacts, NestedUpdatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    protected $fillable = [
        'name',
    ];
}
