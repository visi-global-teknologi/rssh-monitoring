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
            CREATE VIEW rssh_log_view AS
            SELECT
                rl.id as id,
                rl.log as log,
                rl.is_error as is_error,
                rl.created_at as created_at,
                rc.id as rssh_connection_id,
                rc.server_port as rssh_connection_server_port,
                d.name as device_name,
                d.unique_code as device_unique_code,
                d.active_status as device_active_status,
                c.name as client_name
            FROM
                rssh_logs as rl
            JOIN
                rssh_connections as rc on rl.rssh_connection_id = rc.id
            JOIN
                devices as d on rc.device_id = d.id
            JOIN
                clients as c on d.client_id = c.id
            ORDER BY
                created_at desc
        SQL;
    }

    public function dropView()
    {
        return <<<'SQL'
            DROP VIEW IF EXISTS `rssh_log_view`
        SQL;
    }
};
