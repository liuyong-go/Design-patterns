<?php
/**
 * 享元（Flyweight）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-24
 * Time: 16:56
 * 享元（Flyweight）模式的定义：运用共享技术来有効地支持大量细粒度对象的复用。
 * 它通过共享已经存在的对象来大幅度减少需要创建的对象数量、避免大量相似类的开销，从而提高系统资源的利用率。
 *
 * 享元模式的主要优点是：相同对象只要保存一份，这降低了系统中对象的数量，从而降低了系统中细粒度对象给内存带来的压力。

其主要缺点是：
为了使对象可以共享，需要将一些不能共享的状态外部化，这将增加程序的复杂性。
读取享元模式的外部状态会使得运行时间稍微变长。
 *
 * 享元模式的主要角色有如下。
抽象享元角色（Flyweight）:是所有的具体享元类的基类，为具体享元规范需要实现的公共接口，非享元的外部状态以参数的形式通过方法传入。
具体享元（Concrete Flyweight）角色：实现抽象享元角色中所规定的接口。
非享元（Unsharable Flyweight)角色：是不可以共享的外部状态，它以参数的形式注入具体享元的相关方法中。
享元工厂（Flyweight Factory）角色：负责创建和管理享元角色。当客户对象请求一个享元对象时，
 * 享元工厂检査系统中是否存在符合要求的享元对象，如果存在则提供给客户；如果不存在的话，则创建一个新的享元对象。
 */

//非享员角色
class UnsharedConcreteFlyweight{
    private $info;
    public function __construct($info)
    {
        $this->info = $info;
    }

    public function getInfo()
    {
        return $this->info;
    }
    public function setInfo($info){
        $this->info = $info;
    }
}
//抽象享员角色
interface Flyweight{
    public function operation(UnsharedConcreteFlyweight $state);
}
//具体享员角色
class ConcreteFlyweight implements Flyweight
{
    private $key;
    public function __construct($key)
    {
        $this->key = $key;
    }

    public function operation(UnsharedConcreteFlyweight $state)
    {
        // TODO: Implement operation() method.
        echo "具体享员".$this->key."被调用\n";
        echo "非享员信息是".$state->getInfo()."\n";
    }
}
//享员工厂角色
class FlyweightFactory{
    private $flyweights = [];
    public function getFlyweight($key){
        if(isset($this->flyweights[$key])){
            echo "具体享员".$key." 被成功获取\n";
        }else{
            $fw = new ConcreteFlyweight($key);
            $this->flyweights[$key] = $fw;
            echo "具体享员".$key." 被创建\n";
        }
        return $this->flyweights[$key];
    }
}

$fwf = new FlyweightFactory();
$fw1 = $fwf->getFlyweight('a');
$fw2 = $fwf->getFlyweight('b');
$fw3 = $fwf->getFlyweight('a');
$fw4 = $fwf->getFlyweight('c');
$fw5 = $fwf->getFlyweight('a');
$fw1->operation(new UnsharedConcreteFlyweight("第一次调用a"));
$fw2->operation(new UnsharedConcreteFlyweight("第一次调用b"));
$fw3->operation(new UnsharedConcreteFlyweight("第二次调用a"));
$fw4->operation(new UnsharedConcreteFlyweight("第一次调用c"));
$fw5->operation(new UnsharedConcreteFlyweight("第三次调用a"));