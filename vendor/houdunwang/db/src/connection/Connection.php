<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.hdphp.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace houdunwang\db\connection;

use houdunwang\config\Config;
use PDO;
use Closure;
use Exception;

trait Connection
{
    //数据库连接配置
    protected $config;

    //本次查询影响的条数
    protected $affectedRow;

    //查询语句日志
    protected static $queryLogs = [];

    /**
     * 获取连接
     *
     * @param bool $type true写入 false 读
     *
     * @return mixed
     */
    public function link($type = true)
    {
       
        static $links = [];
        $engine = ($type ? 'write' : 'read');
        $mulConfig    = Config::get('database.'.$engine);
         
        $this->config = $mulConfig[array_rand($mulConfig)];
        $cacheName = serialize($this->config);
        
       // echo $this->getDns();
        //echo "aa";
        
        
        $this->config['user'] = rtrim($this->config['user'],"\r");
        $this->config['password'] = rtrim($this->config['password'],"\r");
        //die;
        
        if ( ! isset($links[$cacheName])) {
            
           
            
            $links[$cacheName] = new PDO(
                $this->getDns(), $this->config['user'], $this->config['password'],
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]
            );
            
            
            
            $links[$cacheName]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        
        return $links[$cacheName];
    }

    /**
     * 没有结果集的查询
     *
     * @param       $sql
     * @param array $params
     *
     * @return bool
     * @throws \Exception
     */
    public function execute($sql, array $params = [])
    {
        //准备sql
        $sth = $this->link(true)->prepare($sql);
        //绑定参数
        $params = $this->setParamsSort($params);
        foreach ((array)$params as $key => $value) {
            $sth->bindParam(
                $key,
                $params[$key],
                is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR
            );
        }
        try {
            //执行查询
            $sth->execute();
            $this->affectedRow = $sth->rowCount();
            //记录查询日志
            self::$queryLogs[] = $sql.var_export($params, true);

            return true;
        } catch (Exception $e) {
            $error = $sth->errorInfo();
            throw new Exception(
                $sql." ;BindParams:".var_export($params, true).implode(
                    ';',
                    $error
                )
            );
        }
    }

    /**
     * 当绑定的参数以零开始编号时,设置为以壹开始编号
     * 这样才可以使用预准备
     *
     * @param array $params
     *
     * @return array
     */
    protected function setParamsSort(array $params)
    {
        if (is_numeric(key($params)) && key($params) == 0) {
            $tmp = [];
            foreach ($params as $key => $value) {
                $tmp[$key + 1] = $value;
            }
            $params = $tmp;
        }

        return $params;
    }

    /**
     * 有返回结果的查询
     *
     * @param       $sql
     * @param array $params
     *
     * @return bool
     * @throws \Exception
     */
    public function query($sql, array $params = [])
    {
        //准备sql
        $sth = $this->link(false)->prepare($sql);
        //设置保存数据
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        //绑定参数
        $params = $this->setParamsSort($params);
        foreach ((array)$params as $key => $value) {
            $sth->bindParam(
                $key,
                $params[$key],
                is_numeric($params[$key]) ? PDO::PARAM_INT : PDO::PARAM_STR
            );
        }
        try {
            //执行查询
            $sth->execute();
            $this->affectedRow = $sth->rowCount();
            //记录日志
            self::$queryLogs[] = $sql.var_export($params, true);

            return $sth->fetchAll() ?: [];
        } catch (Exception $e) {
            $error = $sth->errorInfo();
            throw new Exception(
                $sql." ;BindParams:".var_export($params, true).implode(
                    ';',
                    $error
                )
            );
        }
    }

    /**
     * 获取受影响条数
     *
     * @return number
     */
    public function getAffectedRow()
    {
        return $this->affectedRow;
    }

    /**
     * 执行事务处理
     *
     * @param \Closure $closure
     *
     * @return $this
     */
    public function transaction(Closure $closure)
    {
        try {
            $this->beginTransaction();
            //执行事务
            $closure();
            $this->commit();
        } catch (Exception $e) {
            //回滚事务
            $this->rollback();
        }

        return $this;
    }

    /**
     * 开启一个事务
     *
     * @return $this
     */
    public function beginTransaction()
    {
        $this->link()->beginTransaction();

        return $this;
    }

    /**
     * 开启事务
     *
     * @return $this
     */
    public function rollback()
    {
        $this->link()->rollback();

        return $this;
    }

    /**
     * 开启事务
     *
     * @return $this
     */
    public function commit()
    {
        $this->link()->commit();

        return $this;
    }

    /**
     * 获取自增主键
     *
     * @return mixed
     */
    public function getInsertId()
    {
        return intval($this->link()->lastInsertId());
    }

    /**
     * 获得查询SQL语句
     *
     * @return array
     */
    public function getQueryLog()
    {
        return self::$queryLogs;
    }
}