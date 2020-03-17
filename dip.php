<?php
/**
 * 依赖倒置原则（Dependence Inversion Principle，DIP）
 * User: liuyong
 * Date: 2020-03-16
 * Time: 15:51
 *
 *
依赖倒置原则的实现方法
依赖倒置原则的目的是通过要面向接口的编程来降低类间的耦合性，所以我们在实际编程中只要遵循以下4点，就能在项目中满足这个规则。
每个类尽量提供接口或抽象类，或者两者都具备。
变量的声明类型尽量是接口或者是抽象类。
任何类都不应该从具体类派生。
使用继承时尽量遵循里氏替换原则。
 */

interface Shop{
    public function sell($goods);
}

class BjShop implements Shop {

    public function sell($goods){
        echo  "北京商店出售".$goods;
    }
}
class TjShop implements Shop{
    public function sell($goods){
        echo "天津商店出售".$goods;
    }
}
class Customer{
    public function shopping(Shop $shop,$goods){
        $shop->sell($goods);
    }
}

$goods = '西红柿';
$cum = new Customer();
$cum->shopping(new BjShop(),$goods);
echo "\n";
$goods = '土鸡蛋';
$cum->shopping(new TjShop(),$goods);
