<?php
/**
 * 建造者（Builder）模式
 * User: liuyong
 * Date: 2020-03-18
 * Time: 23:39
 *
 * 建造者（Builder）模式的定义：指将一个复杂对象的构造与它的表示分离，使同样的构建过程可以创建不同的表示，这样的设计模式被称为建造者模式。它是将一个复杂的对象分解为多个简单的对象，然后一步一步构建而成。它将变与不变相分离，即产品的组成部分是不变的，但每一部分是可以灵活选择的。

该模式的主要优点如下：
各个具体的建造者相互独立，有利于系统的扩展。
客户端不必知道产品内部组成的细节，便于控制细节风险。

其缺点如下：
产品的组成部分必须相同，这限制了其使用范围。
如果产品的内部变化复杂，该模式会增加很多的建造者类。
 *
 * 模式的结构与实现
建造者（Builder）模式由产品、抽象建造者、具体建造者、指挥者等 4 个要素构成，现在我们来分析其基本结构和实现方法。
1. 模式的结构
建造者（Builder）模式的主要角色如下。
产品角色（Product）：它是包含多个组成部件的复杂对象，由具体建造者来创建其各个滅部件。
抽象建造者（Builder）：它是一个包含创建产品各个子部件的抽象方法的接口，通常还包含一个返回复杂产品的方法 getResult()。
具体建造者(Concrete Builder）：实现 Builder 接口，完成复杂产品的各个部件的具体创建方法。
指挥者（Director）：它调用建造者对象中的部件构造与装配方法完成复杂对象的创建，在指挥者中不涉及具体产品的信息。
以电脑组装为例
 */

//产品角色
class Computer{
    private $cpu;
    private $hard_disk;
    private $memory;
    public function setCpu($cpu){
        $this->cpu = $cpu;
    }
    public function setHardDisk($hard_disk){
        $this->hard_disk = $hard_disk;
    }
    public function setMemory($memory){
        $this->memory = $memory;
    }
}
//抽象构建者
abstract class ComputerBuilder{
    public function __construct()
    {
        $this->computer = new Computer();
    }

    abstract function buildCpu();
    abstract function buildDisk();
    abstract function buildMemory();
    public function getInfo(){
        return $this->computer;
    }
}
//具体构建者
class macBuilder extends ComputerBuilder{
    public function buildCpu()
    {
        $this->computer->setCpu("Inter Core i7");
        // TODO: Implement buildCpu() method.
    }
    public function buildDisk()
    {
        $this->computer->setHardDisk("HD 256");
        // TODO: Implement buildDisk() method.
    }
    public function buildMemory()
    {
        $this->computer->setMemory("8 GB 2133 MHz LPDDR3");
        // TODO: Implement buildMemory() method.
    }
}
//具体构建者
class xiaomiBuilder extends ComputerBuilder{
    public function buildCpu()
    {
        $this->computer->setCpu("Inter Core i5");
        // TODO: Implement buildCpu() method.
    }
    public function buildDisk()
    {
        $this->computer->setHardDisk("HD 512");
        // TODO: Implement buildDisk() method.
    }
    public function buildMemory()
    {
        $this->computer->setMemory("16 GB 2133 MHz LPDDR3");
        // TODO: Implement buildMemory() method.
    }
}
//指挥者
class Director{
    private $builder;
    public function __construct(ComputerBuilder $builder)
    {
        $this->builder = $builder;
    }
    public function computerBuild(){
        $this->builder->buildMemory();
        $this->builder->buildDisk();
        $this->builder->buildCpu();
        return $this->builder->getInfo();
    }
}
$di = new Director(new macBuilder());

$info = $di->computerBuild();
var_dump($info);
$di = new Director(new xiaomiBuilder());

$info = $di->computerBuild();
var_dump($info);