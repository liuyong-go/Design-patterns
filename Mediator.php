<?php
/**
 * 中介者（Mediator）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-27
 * Time: 15:25
 * 中介者（Mediator）模式的定义：定义一个中介对象来封装一系列对象之间的交互，
 * 使原有对象之间的耦合松散，且可以独立地改变它们之间的交互。中介者模式又叫调停模式，它是迪米特法则的典型应用。
 *
 * 中介者模式实现的关键是找出“中介者”，下面对它的结构和实现进行分析。
1. 模式的结构
中介者模式包含以下主要角色。
抽象中介者（Mediator）角色：它是中介者的接口，提供了同事对象注册与转发同事对象信息的抽象方法。
具体中介者（ConcreteMediator）角色：实现中介者接口，定义一个 List 来管理同事对象，协调各个同事角色之间的交互关系，因此它依赖于同事角色。
抽象同事类（Colleague）角色：定义同事类的接口，保存中介者对象，提供同事对象交互的抽象方法，实现所有相互影响的同事类的公共功能。
具体同事类（Concrete Colleague）角色：是抽象同事类的实现者，当需要与其他同事对象交互时，由中介者对象负责后续的交互。
 */

//抽象中介类

abstract class Mediator{
    public abstract function register(Colleague $colleague);
    public abstract function relay(Colleague $col); //转发
}
//具体中介类
class MediatorConcrete extends Mediator {
    private $collegue = [];
    public function register(Colleague $colleague)
    {
        if(array_search($colleague,$this->collegue) === false){
            $this->collegue[] = $colleague;
            $colleague->setMedium($this);
        }


        // TODO: Implement register() method.
    }
    public function relay(Colleague $col)
    {
        foreach($this->collegue as $val){
            if($val !== $col){
                $val->receive();
            }
        }

        // TODO: Implement relay() method.
    }
}



//抽象同事类
abstract class Colleague{
    protected $media;
    public function setMedium(Mediator $mediator){
        $this->media = $mediator;
    }
    public abstract function receive();
    public abstract function send();
}
class Colleague1Concrete extends Colleague{
    public function receive()
    {
        // TODO: Implement receive() method.
        echo "具体同事类1收到请求。\n";
    }
    public function send()
    {
        // TODO: Implement send() method.
        echo "具体同事类1发出请求。\n";
        $this->media->relay($this);
    }
}
class Colleague2Concrete extends Colleague{
    public function receive()
    {
        // TODO: Implement receive() method.
        echo "具体同事类2收到请求。\n";
    }
    public function send()
    {
        // TODO: Implement send() method.
        echo "具体同事类2发出请求。\n";
        $this->media->relay($this);
    }
}
$c1 = new Colleague1Concrete();
$c2 = new Colleague2Concrete();
$med = new MediatorConcrete();
$c1->setMedium($med);
$med->register($c1);
$c2->setMedium($med);
$med->register($c2);

$c1->send();