<?php

namespace Leoyi\LaravelFillable\Commands;

use Doctrine\DBAL\Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class LaravelFillableCommand extends Command
{
    public $signature = 'fillable {table} {comments?}';

    public $description = 'show tables columns and comment';

    public function handle(): int
    {
        $tableName = $this->argument('table');
        $comments = $this->argument('comments');
        $manager = DB::connection()->getDoctrineSchemaManager();
        try {
            $columns = $manager->listTableColumns($tableName);
            foreach ($columns as $key => $column) {
                if(in_array($key, config('fillable.except'))){
                    continue;
                }
                $comment = $manager->listTableDetails($tableName)->getColumn($key)->getComment();
                if ($comments) {
                    $this->info("'" . $key . "'" . " => " . "'" . $comment . "',");
                } else {
                    $this->info("'" . $key . "',");
                }
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
            return 1;
        }
        return 0;
    }
}
