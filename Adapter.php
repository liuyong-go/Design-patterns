<?php
/**
 * 适配者模式
 * User: liuyong
 * Date: 2020-03-19
 * Time: 23:41
 * 适配器模式（Adapter）的定义如下：将一个类的接口转换成客户希望的另外一个接口，使得原本由于接口不兼容而不能一起工作的那些类能一起工作。
 * 适配器模式分为类结构型模式和对象结构型模式两种，前者类之间的耦合度比后者高，且要求程序员了解现有组件库中的相关组件的内部结构，所以应用相对较少些。
 * 适配器模式（Adapter）包含以下主要角色。
目标（Target）接口：当前系统业务所期待的接口，它可以是抽象类或接口。
适配者（Adaptee）类：它是被访问和适配的现存组件库中的组件接口。
适配器（Adapter）类：它是一个转换器，通过继承或引用适配者的对象，把适配者接口转换成目标接口，让客户按目标接口的格式访问适配者。
 */
//目标接口
interface Target{
    public function request();
}
//适配者
class Adaptee{
    public function specialRequest(){
        echo "适配者中的业务代码被调用";
    }
}

//适配器
class Adapter extends Adaptee implements Target{
    //转换方法适配器
    public function request()
    {
        //调用适配者方法
        $this->specialRequest();
    }

}
