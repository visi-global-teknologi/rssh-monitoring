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
            CREATE VIEW ping_server_view AS
            SELECT
                ps.id as id,
                ps.date_time as date_time,
                ps.device_id as device_id,
                ps.created_at as created_at,
                d.name as device_name,
                d.unique_code as device_unique_code,
                d.active_status as device_active_status,
                c.name as client_name
            FROM
                ping_servers as ps
            JOIN
                devices as d on ps.device_id = d.id
            JOIN
                clients as c on d.client_id = c.id
            ORDER BY
                ps.created_at desc
        SQL;
    }

    public function dropView()
    {
        return <<<'SQL'
            DROP VIEW IF EXISTS `ping_server_view`
        SQL;
    }
};
