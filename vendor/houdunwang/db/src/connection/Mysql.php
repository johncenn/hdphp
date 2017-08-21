<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdphp.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace houdunwang\db\connection;

class Mysql implements DbInterface
{
    use Connection;

    /**
     * PDO连接
     *
     * @return string
     */
    public function getDns()
    {
        $host = $this->config['host'];
        $h = rtrim($host,"\r");
        $this->config['database'] = rtrim($this->config['database']);
        
        
        return $dns = 'mysql:host='.$h.';dbname='.$this->config['database'];
            
    }
}