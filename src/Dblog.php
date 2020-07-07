<?php

declare(strict_types=1);

namespace think\log\driver;

use think\App;
use think\contract\LogHandlerInterface;

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
            $this->config = array_merge($this->config, $config);
        }
    }

    public function save(array $log): bool {        
    }
    
    protected function write(array $message): bool
    {
    }

}
