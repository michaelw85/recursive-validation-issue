<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddPropertiesToContactsTable
 */
class AddPropertiesToContactsTable extends Migration
{
    /**
     * Table names.
     *
     * @var string  $table  The main table name for this migration.
     */
    protected string $table;

    /**
     * Create a new migration instance.
     */
    public function __construct()
    {
        $this->table = config('lecturize.contacts.table', 'contacts');
    }

    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table($this->table, function (Blueprint $table): void {
            $table->string('extra')->nullable()->after('company');
            $table->text('properties')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::table($this->table, function (Blueprint $table): void {
            $table->dropColumn('properties');
            $table->dropColumn('extra');
        });
    }
}
