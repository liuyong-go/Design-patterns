<?php
/**
 * 外观（Facade）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-24
 * Time: 16:35
 * 外观（Facade）模式的定义：是一种通过为多个复杂的子系统提供一个一致的接口，
 * 而使这些子系统更加容易被访问的模式。该模式对外有一个统一接口，
 * 外部应用程序不用关心内部子系统的具体的细节，这样会大大降低应用程序的复杂度，提高了程序的可维护性。
 * 外观（Facade）模式是“迪米特法则”的典型应用，它有以下主要优点。
降低了子系统与客户端之间的耦合度，使得子系统的变化不会影响调用它的客户类。
对客户屏蔽了子系统组件，减少了客户处理的对象数目，并使得子系统使用起来更加容易。
降低了大型软件系统中的编译依赖性，简化了系统在不同平台之间的移植过程，因为编译一个子系统不会影响其他的子系统，也不会影响外观对象。
 *
 * 外观（Facade）模式的主要缺点如下。
不能很好地限制客户使用子系统类。
增加新的子系统可能需要修改外观类或客户端的源代码，违背了“开闭原则”。
 */

//子系统角色
class SubSys1{
    public function method1(){
        echo "子系统01的method1()被调用！\n";
    }
}

class SubSys2{
    public function method2(){
        echo "子系统02的method2()被调用！\n";
    }
}

//外观角色
class Facade{
    private $subsys01;
    private $subsys02;
    public function __construct()
    {
        $this->subsys01 = new SubSys1();
        $this->subsys02 = new SubSys2();
    }
    public function method(){
        $this->subsys01->method1();
        $this->subsys02->method2();
    }
}
$fa = new Facade();
$fa->method();