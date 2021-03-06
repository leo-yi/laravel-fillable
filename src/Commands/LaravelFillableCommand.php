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

    const MAPPING= [
        'string'  => ['datetime', 'year', 'date', 'time', 'timestamp', 'varchar', 'text', 'string', 'char', 'enum', 'tinytext', 'mediumtext', 'longtext', 'longblob', 'mediumblob', 'tinyblob', 'blob'],
        'int'     => ['bigint', 'int', 'integer', 'tinyint', 'smallint', 'mediumint', 'boolean'],
        'float'   => ['float', 'decimal', 'numeric', 'dec', 'fixed', 'double', 'real', 'double precision'],
        'boolean' => ['bit'],
    ];

    public function handle(): int
    {
        $tableName = $this->argument('table');
        $model = $this->argument('model');
        $manager = DB::connection()->getDoctrineSchemaManager();
        try {
            $columns = $manager->listTableColumns($tableName);
            foreach ($columns as $key => $column) {
                if (in_array($key, config('fillable.except', []))) {
                    continue;
                }
                $comment = $manager->listTableDetails($tableName)->getColumn($key)->getComment();
                if ($model == 5) {
                    $type = $manager->listTableDetails($tableName)->getColumn($key)->getType()->getName();
                    $this->outPut(intval($model), $key, strval($comment), $type);
                } else {
                    $this->outPut(intval($model), $key, strval($comment));
                }
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
     * @param int $model 输出模式
     * @param string $key key值
     * @param string $comment 注释
     *
     * @author leoyi 2022/2/23
     */
    public function outPut(int $model, string $key, string $comment, string $type = ''): void
    {
        switch ($model) {
            case 1:
                $this->info("'" . $key . "'" . ' => ' . "'" . $comment . "',");
                break;
            case 2:
                $this->info("'" . $key . "'" . ' => ' . "'', // " . $comment . '');
                break;
            case 3:
                $this->info("'" . $key . "'" . ' => ' . "\$this->" . $key . ",");
                break;
            case 4:
                $this->info("'" . $key . "'" . ' => ' . "\$this->" . $key . ", // " . $comment . '');
                break;
            case 5:
                //  * @property int $business_type
                $this->info('* @property ' . $this->parseType($type) . ' $' . $key . ' ' . $comment);
                break;
            default:
                $this->info("'" . $key . "',");
        }
    }

    /**
     * Convert database types to PHP data types
     * @param string $dataType
     * @return string|void
     */
    protected function parseType(string $dataType)
    {
        foreach (self::MAPPING as $phpType => $database) {
            if (in_array($dataType, $database)) {
                return $phpType;
            }
        }
    }
}
