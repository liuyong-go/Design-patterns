<?php
/**
 * 策略（Strategy）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-26
 * Time: 15:09
 * 策略（Strategy）模式的定义：该模式定义了一系列算法，并将每个算法封装起来，使它们可以相互替换，
 * 且算法的变化不会影响使用算法的客户。策略模式属于对象行为模式，它通过对算法进行封装，把使用算法的责任和算法的实现分割开来，
 * 并委派给不同的对象对这些算法进行管理。
 * 策略模式是准备一组算法，并将这组算法封装到一系列的策略类里面，作为一个抽象策略类的子类。
 * 策略模式的重心不是如何实现算法，而是如何组织这些算法，从而让程序结构更加灵活，具有更好的维护性和扩展性，现在我们来分析其基本结构和实现方法。
策略模式的主要角色如下。
抽象策略（Strategy）类：定义了一个公共接口，各种不同的算法以不同的方式实现这个接口，环境角色使用这个接口调用不同的算法，一般使用接口或抽象类实现。
具体策略（Concrete Strategy）类：实现了抽象策略定义的接口，提供具体的算法实现。
环境（Context）类：持有一个策略类的引用，最终给客户端调用。
 */
//抽象策略类
interface Strategy{
    public function strategyMethod(); // 策略方法
}

//具体策略类
class StrategyA implements Strategy{
    public function strategyMethod()
    {
        // TODO: Implement strategyMethod() method.
        echo "具体策略A的策略方法被访问！\n";
    }
}
class StrategyB implements Strategy{
    public function strategyMethod()
    {
        // TODO: Implement strategyMethod() method.
        echo "具体策略B的策略方法被访问！\n";
    }
}

//环境类
class Context{
    private $strategy;
    public function getStrategy(){
        return $this->strategy;
    }
    public function setStrategy(Strategy $strategy_instance){
        $this->strategy = $strategy_instance;
    }
    public function strategyMethod(){
        $this->strategy->strategyMethod();
    }
}

$ct = new Context();
$ct->setStrategy(new StrategyB());
$ct->strategyMethod();