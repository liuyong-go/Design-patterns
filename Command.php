<?php
/**
 * 命令（Command）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-26
 * Time: 15:30
 * 命令（Command）模式的定义如下：将一个请求封装为一个对象，使发出请求的责任和执行请求的责任分割开。
 * 这样两者之间通过命令对象进行沟通，这样方便将命令对象进行储存、传递、调用、增加与管理。
 *
 * 模式的结构
命令模式包含以下主要角色。
抽象命令类（Command）角色：声明执行命令的接口，拥有执行命令的抽象方法 execute()。
具体命令角色（Concrete    Command）角色：是抽象命令类的具体实现类，它拥有接收者对象，并通过调用接收者的功能来完成命令要执行的操作。
实现者/接收者（Receiver）角色：执行命令功能的相关操作，是具体命令对象业务的真正实现者。
调用者/请求者（Invoker）角色：是请求的发送者，它通常拥有很多的命令对象，并通过访问命令对象来执行相关请求，它不直接访问接收者。
 */

//抽象命令
interface Command{
    public function execute();
}
//具体命令
class ConcreteCommand implements Command{
    private $reciver;
    public function __construct(Receiver $receiver)
    {
        $this->reciver = $receiver;
    }

    public function execute()
    {
        $this->reciver->action();
        // TODO: Implement execute() method.
    }
}

//接收命令方
class Receiver{
    public function action(){
        echo "接收者的action()方法被调用...\n";
    }
}

//调用者
class Invoker{
    private $command;
    public function __construct(Command $command)
    {
        $this->command = $command;
    }
    public function call(){
        echo "调用者执行命令command...\n";
        $this->command->execute();
    }
}
$ink = new Invoker(new ConcreteCommand(new Receiver()));
$ink->call();