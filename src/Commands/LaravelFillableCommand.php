<?php

declare(strict_types=1);

namespace Leoyi\LaravelFillable\Commands;

use Doctrine\DBAL\Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class LaravelFillableCommand extends Command
{
    public $signature = 'fillable {table} {model?}';

    public $description = 'show tables columns and comment';

    public function handle(): int
    {
        $tableName = $this->argument('table');
        $model     = $this->argument('model');
        $manager   = DB::connection()->getDoctrineSchemaManager();
        try {
            $columns = $manager->listTableColumns($tableName);
            foreach ($columns as $key => $column) {
                if (in_array($key, config('fillable.except'))) {
                    continue;
                }
                $comment = $manager->listTableDetails($tableName)->getColumn($key)->getComment();
                $this->outPut(intval($model), $key, $comment);
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());

            return 1;
        }

        return 0;
    }

    /**
     * 格式化输出.
     *
     * @param int    $model   输出模式
     * @param string $key     key值
     * @param string $comment 注释
     *
     * @author leoyi 2022/2/23
     */
    public function outPut(int $model, string $key, string $comment): void
    {
        switch ($model) {
            case 1:
                $this->info("'" . $key . "'" . ' => ' . "'" . $comment . "',");
                break;
            case 2:
                $this->info("'" . $key . "'" . ' => ' . "'', // " . $comment . '');
                break;
            case 3:
                $this->info("'" . $key . "'" . ' => ' . "\$this->" . $key . ", // " . $comment . '');
                break;
            default:
                $this->info("'" . $key . "',");
        }
    }
}
