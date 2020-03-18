<?php
/**
 * 工厂方法模式
 * User: liuyong
 * Date: 2020-03-17
 * Time: 16:44
 */

interface AbstractFactory
{
    public function newProduction();

}
interface Moblie{
    public function showName();
}
class huawei implements Moblie
{
    public function showName()
    {
        // TODO: Implement showName() method.
        echo "mate30";
    }
}
class xiaomi implements Moblie
{
    public function showName()
    {
        // TODO: Implement showName() method.
        echo "N90";
    }
}
class huaweiFactory implements AbstractFactory
{
    public function newProduction()
    {
        // TODO: Implement newProduction() method.
        echo "华为工厂生产了新手机";
        $mobile = new huawei();
        $mobile->showName();
    }
}
class xiaomiFactory implements AbstractFactory
{
    public function newProduction()
    {
        // TODO: Implement newProduction() method.
        echo "小米工厂生产了新手机";
        $mobile = new xiaomi();
        $mobile->showName();
    }
}
$huawei = new huaweiFactory();
$xiaomi = new xiaomiFactory();

$huawei->newProduction();
echo "\n";
$xiaomi->newProduction();