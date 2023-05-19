<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
        return <<<SQL
            CREATE VIEW cron_log_view AS
            SELECT
                cl.id as id,
                cl.log as log,
                cl.is_error as is_error,
                cl.file_name as file_name,
                rc.id as rssh_connection_id,
                rc.server_port as rssh_connection_server_port,
                d.name as device_name,
                d.unique_code as device_unique_code,
                d.active_status as device_active_status,
                c.name as client_name
            FROM
                cron_logs as cl
            JOIN
                rssh_connections as rc on cl.rssh_connection_id = rc.id
            JOIN
                devices as d on rc.device_id = d.id
            JOIN
                clients as c on d.client_id = c.id
        SQL;
    }

    public function dropView()
    {
        return <<<SQL
            DROP VIEW IF EXISTS `cron_log_view`
        SQL;
    }
};
