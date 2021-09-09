<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CharifyCountriesTable extends Migration
{
    //phpcs:disable Generic.Files.LineLength.TooLong

    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table(Config::get('countries.table_name'), function ($table): void {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY country_code CHAR(3) NOT NULL DEFAULT ''");
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY iso_3166_2 CHAR(2) NOT NULL DEFAULT ''");
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY iso_3166_3 CHAR(3) NOT NULL DEFAULT ''");
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY region_code CHAR(3) NOT NULL DEFAULT ''");
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY sub_region_code CHAR(3) NOT NULL DEFAULT ''");
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::table(Config::get('countries.table_name'), function ($table): void {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY country_code VARCHAR(3) NOT NULL DEFAULT ''");
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY iso_3166_2 VARCHAR(2) NOT NULL DEFAULT ''");
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY iso_3166_3 VARCHAR(3) NOT NULL DEFAULT ''");
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY region_code VARCHAR(3) NOT NULL DEFAULT ''");
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . Config::get('countries.table_name') . " MODIFY sub_region_code VARCHAR(3) NOT NULL DEFAULT ''");
        });
    }
    //phpcs:enable Generic.Files.LineLength.TooLong
}
