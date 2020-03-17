<?php
/**
 * 单例模式
 *
 * 单例模式是设计模式中最简单的模式之一。
 * 通常，普通类的构造函数是公有的，外部类可以通过“new 构造函数()”来生成多个实例。
 * 但是，如果将类的构造函数设为私有的，外部类就无法调用该构造函数，也就无法生成多个实例。
 * 这时该类自身必须定义一个静态私有实例，并向外提供一个静态的公有函数用于创建或获取该静态私有实例
 *
 * 单例模式有 3 个特点：
单例类只有一个实例对象；
该单例对象必须由单例类自行创建；
单例类对外提供一个访问该单例的全局访问点；
 *
 * 在计算机系统中，还有 Windows 的回收站、操作系统中的文件系统、多线程中的线程池、显卡的驱动程序对象、
 * 打印机的后台处理服务、应用程序的日志对象、数据库的连接池、
 * 网站的计数器、Web 应用的配置对象、应用程序中的对话框、系统中的缓存等常常被设计成单例。
 * User: liuyong
 * Date: 2020-03-16
 * Time: 21:54
 *
 */
class TraceLog
{
    static private $_instance;
    private $_trace_data = [];
    private $_start_record = 0;

    //防止使用new直接创建对象
    private function __construct(){

    }

    //防止使用clone克隆对象
    private function __clone(){}

    static public function getInstance()
    {
        //判断$instance是否是Singleton的对象，不是则创建
        if (!self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * 开启trace
     */
    public function startTrace(){
        self::$_instance->_start_record = 1;
    }

    /**
     * 关闭trace
     */
    public function endTrace(){
        self::$_instance->_start_record = 0;
    }

    /**
     * 添加trace 日志
     * @param $key
     * @param $value
     * @return bool
     */
    public function addTrace($key,$value)
    {
        if(self::$_instance->_start_record == 1){
            self::$_instance->_trace_data[$key][] = $value;
        }
        return true;
    }

    /**
     * 获取trace 信息
     * @param string $key
     * @return mixed
     */
    public function getTrace($key = ''){
        if($key){
            return self::$_instance->_trace_data[$key];
        }else{
            return self::$_instance->_trace_data;
        }
    }

    /**
     * 打印结果
     * @param string $key
     */
    public function dumpTrace($key =''){
        header('content-type:application/json;charset=utf-8');
        $trace_data = $this->getTrace($key);
        echo json_encode($trace_data);
        self::$_instance->_trace_data = [];
        exit;
    }

}