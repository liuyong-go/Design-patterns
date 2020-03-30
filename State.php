<?php
/**
 * 状态（State）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-26
 * Time: 16:35
 * 状态（State）模式的定义：对有状态的对象，把复杂的“判断逻辑”提取到不同的状态对象中，允许状态对象在其内部状态发生改变时改变其行为。
 *
 *  模式的结构
状态模式包含以下主要角色。
环境（Context）角色：也称为上下文，它定义了客户感兴趣的接口，维护一个当前状态，并将与状态相关的操作委托给当前状态对象来处理。
抽象状态（State）角色：定义一个接口，用以封装环境对象中的特定状态所对应的行为。
具体状态（Concrete    State）角色：实现抽象状态所对应的行为。
 */

//环境类
class StateContext{
    private $state;
    public function __construct()
    {
        $this->state = new ConcreteStateA();
    }
    public function setState(State $state){
        $this->state = $state;
    }
    public function getState(){
        return $this->state;
    }
    public function Handel(){
        $this->state->Handle($this);
    }
}

//抽象状态类
abstract class State{

    public abstract function Handle(StateContext $context);
}

class ConcreteStateA extends State{

    public function Handle(StateContext $context)
    {
        // TODO: Implement Handler() method.
        echo "当前状态是 A.\n";
        $context->setState(new ConcreteStateB());
    }
}
class ConcreteStateB extends State{

    public function Handle(StateContext $context)
    {
        // TODO: Implement Handler() method.
        echo "当前状态是 B.\n";
        $context->setState(new ConcreteStateA());
    }
}
$cox = new StateContext();
$cox->Handel();
$cox->Handel();