<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement($this->dropView());
    }

    public function createView()
    {
        return <<<'SQL'
            CREATE VIEW device_view AS
            SELECT
                d.id as id,
                d.name as name,
                d.unique_code as unique_code,
                d.description as description,
                d.active_status as active_status,
                d.created_at as created_at,
                c.name as client_name
            FROM
                devices as d
            JOIN
                clients as c on d.client_id = c.id
        SQL;
    }

    public function dropView()
    {
        return <<<'SQL'
            DROP VIEW IF EXISTS `device_view`
        SQL;
    }
};
