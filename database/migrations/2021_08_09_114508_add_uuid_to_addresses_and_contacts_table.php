<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddUuidToAddressesAndContactsTable
 */
class AddUuidToAddressesAndContactsTable extends Migration
{
    /**
     * Table names.
     *
     * @var string  $table_addresses  The addresses table.
     * @var string  $table_contacts   The contacts table.
     */
    protected string $table_addresses;
    protected string $table_contacts;

    /**
     * Create a new migration instance.
     */
    public function __construct()
    {
        $this->table_addresses = config('lecturize.addresses.table', 'addresses');
        $this->table_contacts = config('lecturize.contacts.table', 'contacts');
    }

    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table($this->table_addresses, function (Blueprint $table): void {
            $table->uuid('uuid')->nullable()->after('id');
        });

        Schema::table($this->table_contacts, function (Blueprint $table): void {
            $table->uuid('uuid')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::table($this->table_addresses, function (Blueprint $table): void {
            $table->dropColumn('uuid');
        });

        Schema::table($this->table_contacts, function (Blueprint $table): void {
            $table->dropColumn('uuid');
        });
    }
}
