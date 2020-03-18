<?php
/**
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-18
 * Time: 23:15
 * 抽象工厂模式是工厂方法模式的升级版本，工厂方法模式只生产一个等级的产品，而抽象工厂模式可生产多个等级的产品。

使用抽象工厂模式一般要满足以下条件。
系统中有多个产品族，每个具体工厂创建同一族但属于不同等级结构的产品。
系统一次只可能消费其中某一族产品，即同族的产品一起使用。

抽象工厂模式除了具有工厂方法模式的优点外，其他主要优点如下。
可以在类的内部对产品族中相关联的多等级产品共同管理，而不必专门引入多个新的类来进行管理。
当增加一个新的产品族时不需要修改原代码，满足开闭原则。

其缺点是：当产品族中需要增加一个新的产品时，所有的工厂类都需要进行修改。
 */

interface InAbstractFactory
{
    public function production1();
    public function production2();
}

class factory implements InAbstractFactory {

   public function production1()
   {
       // TODO: Implement production1() method.
       $p1 = new Production1();
       $p1->showName();
   }

    public function production2()
    {
        $p2 = new Production2();
        $p2->showName();
        // TODO: Implement production2() method.
    }
}
interface InProduction{
    public function showName();
}

class Production1 implements InProduction {
    public function showName()
    {
        echo "产品1";
        // TODO: Implement showName() method.
    }
}
class Production2 implements InProduction {
    public function showName()
    {
        echo "产品2";
        // TODO: Implement showName() method.
    }
}
$fa = new factory();
$fa->production1();
echo "\n";
$fa->production2();