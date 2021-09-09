<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddUserIdToAddressesTable
 */
class AddUserIdToAddressesTable extends Migration
{
    /**
     * Table names.
     *
     * @var string  $table        The main table name for this migration.
     * @var string  $table_users  The users table.
     */
    protected string $table;
    protected string $table_users;

    /**
     * Create a new migration instance.
     */
    public function __construct()
    {
        $this->table = config('lecturize.addresses.table', 'addresses');
        $this->table_users = config('lecturize.tables.users.main', 'users');
    }

    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table($this->table, function (Blueprint $table): void {
            $table->bigInteger('user_id')->nullable()->unsigned()->index()->after('addressable_id');
            $table->foreign('user_id')
                ->references('id')
                ->on($this->table_users);
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::table($this->table, function (Blueprint $table): void {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
