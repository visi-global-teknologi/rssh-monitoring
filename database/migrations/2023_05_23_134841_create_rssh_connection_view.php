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
            CREATE VIEW rssh_connection_view AS
            SELECT
                rc.id as id,
                rc.server_port as server_port,
                rc.updated_at as updated_at,
                d.name as device_name,
                d.unique_code as device_unique_code,
                d.active_status as device_active_status,
                cs.name as connection_status_name,
                c.name as client_name
            FROM
                rssh_connections as rc
            JOIN
                devices as d on rc.device_id = d.id
            JOIN
                connection_statuses as cs on rc.connection_status_id = cs.id
            JOIN
                clients as c on d.client_id = c.id
        SQL;
    }

    public function dropView()
    {
        return <<<'SQL'
            DROP VIEW IF EXISTS `rssh_connection_view`
        SQL;
    }
};
