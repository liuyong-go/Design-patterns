<?php
/**
 * 观察者（Observer）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-26
 * Time: 16:51
 * 观察者（Observer）模式的定义：指多个对象间存在一对多的依赖关系，当一个对象的状态发生改变时，
 * 所有依赖于它的对象都得到通知并被自动更新。这种模式有时又称作发布-订阅模式、模型-视图模式，它是对象行为型模式。
观察者模式的主要角色如下。
抽象主题（Subject）角色：也叫抽象目标类，它提供了一个用于保存观察者对象的聚集类和增加、删除观察者对象的方法，以及通知所有观察者的抽象方法。
具体主题（Concrete    Subject）角色：也叫具体目标类，它实现抽象目标中的通知方法，当具体主题的内部状态发生改变时，通知所有注册过的观察者对象。
抽象观察者（Observer）角色：它是一个抽象类或接口，它包含了一个更新自己的抽象方法，当接到具体主题的更改通知时被调用。
具体观察者（Concrete Observer）角色：实现抽象观察者中定义的抽象方法，以便在得到目标的更改通知时更新自身的状态。
 */

//抽象观察者
interface Observer{
    public function response();
}

//具体观察者
class ConcreteObserver1 implements Observer{
    public function response()
    {
        // TODO: Implement response() method.
        echo "具体观察者1作出反应！\n";
    }
}
class ConcreteObserver2 implements Observer{
    public function response()
    {
        // TODO: Implement response() method.
        echo "具体观察者2作出反应！\n";
    }
}
abstract class Subject{
    protected $observes;
    public function add(Observer $obs){
        $this->observes[] = $obs;
    }
    public function remove(Observer $obs){
        $key = array_search($obs,$this->observes,true);
        if($key !== false){
            unset($this->observes[$key]);
        }
    }
    public abstract function notifyObserver();
}

class ConcreteSubject extends Subject{
    public function notifyObserver()
    {
        echo "具体目标发生变更\n";
        foreach ($this->observes as $val){
            $val->response();
        }
        // TODO: Implement notifyObserver() method.
    }
}
$os1 = new ConcreteObserver1();
$os2 = new ConcreteObserver2();
$os11 = new ConcreteObserver1();
$sb = new ConcreteSubject();
$sb->add($os1);
$sb->add($os2);
$sb->remove($os11);
$sb->notifyObserver();