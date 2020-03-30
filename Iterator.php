<?php
/**
 * 迭代器（Iterator）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-27
 * Time: 16:21
 * 迭代器（Iterator）模式的定义：提供一个对象来顺序访问聚合对象中的一系列数据，而不暴露聚合对象的内部表示。迭代器模式是一种对象行为型模式
 * 模式的结构
迭代器模式主要包含以下角色。
抽象聚合（Aggregate）角色：定义存储、添加、删除聚合对象以及创建迭代器对象的接口。
具体聚合（ConcreteAggregate）角色：实现抽象聚合类，返回一个具体迭代器的实例。
抽象迭代器（Iterator）角色：定义访问和遍历聚合元素的接口，通常包含 hasNext()、first()、next() 等方法。
具体迭代器（Concretelterator）角色：实现抽象迭代器接口中所定义的方法，完成对聚合对象的遍历，记录遍历的当前位置。
 */
//抽象迭代器
interface Iterators{
    public function first();
    public function next();
    public function hasNext();
}
//具体迭代器
class IteratorConcrete implements Iterators{
    private $arr_list = [];
    private $index = -1;
    public function __construct($arr_list)
    {
        $this->arr_list = $arr_list;
    }

    public function first()
    {
        return $this->arr_list[0];
        // TODO: Implement first() method.
    }
    public function next()
    {
        if($this->hasNext()){
            return $this->arr_list[++$this->index];
        }
        return null;
        // TODO: Implement next() method.
    }
    public function hasNext() : bool
    {
        if($this->index < count($this->arr_list) -1){
            return true;
        }else{
            return false;
        }
        // TODO: Implement hasNext() method.
    }
}
//抽象聚合
interface Aggregate{
    public function add($value);
    public function remove($value);
    public function getIterator();
}
//具体聚合
class AggregateConcrete implements Aggregate{
    private $value_list = [];
    public function add($value)
    {
        $this->value_list[] = $value;
        // TODO: Implement add() method.
    }
    public function remove($value)
    {
        $key = array_search($value,$this->value_list);
        if($key !== false){
            unset($this->value_list[$key]);
            $this->value_list = array_values($this->value_list);
        }
        // TODO: Implement remove() method.
    }
    public function getIterator()
    {
        return new IteratorConcrete($this->value_list);
        // TODO: Implement getIterator() method.
    }
}
$ag = new AggregateConcrete();
$ag->add("西红柿");
$ag->add("鸡蛋");
$ag->add("白菜");
$ag->add("西葫芦");
$ag->remove("白菜");
$it = $ag->getIterator();
while ($it->hasNext()){
    echo $it->next()."\n";
}
echo $it->first();