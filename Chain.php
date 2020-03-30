<?php
/**
 * 责任链（Chain of Responsibility）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-26
 * Time: 16:05
 * 责任链（Chain of Responsibility）模式的定义：为了避免请求发送者与多个请求处理者耦合在一起，
 * 将所有请求的处理者通过前一对象记住其下一个对象的引用而连成一条链；当有请求发生时，
 * 可将请求沿着这条链传递，直到有对象处理它为止。
 *责任链模式也叫职责链模式。
 *
 * 职责链模式主要包含以下角色。
抽象处理者（Handler）角色：定义一个处理请求的接口，包含抽象处理方法和一个后继连接。
具体处理者（Concrete Handler）角色：实现抽象处理者的处理方法，判断能否处理本次请求，如果可以处理请求则处理，否则将该请求转给它的后继者。
客户类（Client）角色：创建处理链，并向链头的具体处理者对象提交请求，它不关心处理细节和请求的传递过程。
 */

//抽象处理者
abstract class Handler{
    private $next;
    public function setNext(Handler $next){
        $this->next = $next;
    }
    public function  getNext(){
        return $this->next;
    }
    public abstract function handleRequest($request );
}
//具体处理者
class ConcreteHandler1 extends Handler{
    public function handleRequest($request)
    {
        // TODO: Implement handleRequest() method.
        if($request == 'one'){
            echo "具体处理者1负责处理该请求！\n";
        }else{
            if($this->getNext() != null){
                $this->getNext()->handleRequest($request);
            }else{
                echo "没有人处理该请求\n";
            }
        }

    }
}

class ConcreteHandler2 extends Handler{
    public function handleRequest($request)
    {
        // TODO: Implement handleRequest() method.
        if($request == 'two'){
            echo "具体处理者2负责处理该请求！\n";
        }else{
            if($this->getNext() != null){
                $this->getNext()->handleRequest($request);
            }else{
                echo "没有人处理该请求\n";
            }
        }
    }
}

$hd1 = new ConcreteHandler1();
$hd2 = new ConcreteHandler2();

$hd2->setNext($hd1);
$hd2->handleRequest('one');