<?php
/**
 * 原型模式
 * 原型（Prototype）模式的定义如下：用一个已经创建的实例作为原型，通过复制该原型对象来创建一个和原型相同或相似的新对象
 * php 本身支持clone,可直接实现此模式
 *
 * User: liuyong
 * Date: 2020-03-17
 * Time: 16:02
 */

class Prototype
{
    private $combat = 100;

    public function set_combat($combat){
        $this->combat = $combat;
    }
    public function get_combat(){
        return $this->combat;
    }
    //当复制完成时，如果定义了 __clone() 方法，则新创建的对象（复制生成的对象）中的 __clone() 方法会被调用，可用于修改属性的值（如果有必要的话）。
    public function __clone(){
        $this->combat = 400;
    }
}

$obj1 = new Prototype();
$obj1->set_combat(200);
$obj2 = clone $obj1;
echo $obj2->get_combat()."\n";
$obj2->set_combat(300);
echo $obj1->get_combat()."\n";
echo $obj2->get_combat()."\n";