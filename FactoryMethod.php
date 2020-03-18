<?php
/**
 * 工厂方法模式
 * User: liuyong
 * Date: 2020-03-17
 * Time: 16:44
 * 工厂方法（FactoryMethod）模式的定义：定义一个创建产品对象的工厂接口，将产品对象的实际创建工作推迟到具体子工厂类当中。
 * 这满足创建型模式中所要求的“创建与使用相分离”的特点。
 * 工厂方法模式的主要优点有：
用户只需要知道具体工厂的名称就可得到所要的产品，无须知道产品的具体创建过程；
在系统增加新的产品时只需要添加具体产品类和对应的具体工厂类，无须对原工厂进行任何修改，满足开闭原则；

其缺点是：每增加一个产品就要增加一个具体产品类和一个对应的具体工厂类，这增加了系统的复杂度。
 */

interface AbstractFactory
{
    public function newProduction();

}
interface Moblie{
    public function showName();
}
class huazi implements Moblie
{
    public function showName()
    {
        // TODO: Implement showName() method.
        echo "mate30";
    }
}
class xiaodou implements Moblie
{
    public function showName()
    {
        // TODO: Implement showName() method.
        echo "N90";
    }
}
class huaziFactory implements AbstractFactory
{
    public function newProduction()
    {
        // TODO: Implement newProduction() method.
        echo "华子工厂生产了新手机";
        $mobile = new huazi();
        $mobile->showName();
    }
}
class xiaodouFactory implements AbstractFactory
{
    public function newProduction()
    {
        // TODO: Implement newProduction() method.
        echo "小豆工厂生产了新手机";
        $mobile = new xiaodou();
        $mobile->showName();
    }
}
$huawei = new huaziFactory();
$xiaomi = new xiaodouFactory();

$huawei->newProduction();
echo "\n";
$xiaomi->newProduction();