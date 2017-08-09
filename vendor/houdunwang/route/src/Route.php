<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace houdunwang\route;

use houdunwang\route\build\Base;

/**
 * 路由处理类
 * Class Route
 *
 * @package hdphp\route
 */
class Route
{
    protected static $link;

    //更改缓存驱动
    protected function driver()
    {
        self::$link = new Base();

        return $this;
    }

    public function __call($method, $params)
    {
        if (is_null(self::$link)) {
            $this->driver();
        }

        return call_user_func_array([self::$link, $method], $params);
    }

    public static function single()
    {
        static $link;
        if (is_null($link)) {
            $link = new static();
        }

        return $link;
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([static::single(), $name], $arguments);
    }
}