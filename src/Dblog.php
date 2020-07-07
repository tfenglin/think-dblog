<?php

declare(strict_types=1);

namespace think\log\driver;

use think\App;
use think\contract\LogHandlerInterface;
use think\facade\Db;
use app\models\system\Runlog;

class Dblog implements LogHandlerInterface {

    protected $app;

    /**
     * 架构函数
     * @access public
     * @param  App   $app  应用对象
     * @param  array $config 缓存参数
     */
    public function __construct(App $app, array $config = []) {
        $this->app = $app;

        if (!empty($config)) {
            //$this->config = array_merge($this->config, $config);
        }
    }

    public function save(array $log): bool {
        $data = [];
        foreach ($log as $type => $logs) {
            foreach ($logs as $val) {
                $data[] = [
                    'uri' => request()->baseUrl(),
                    'ip' => request()->ip(),
                    'message' => $val,
                    'level' => $type,
                ];
            }
        }
        $logModel = new Runlog;
        $logModel->saveAll($data);
        return true;
    }

    protected function write(array $message): bool {
        
    }

}
