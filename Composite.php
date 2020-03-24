<?php
/**
 * 组合（Composite）模式
 * Created by PhpStorm.
 * User: liuyong
 * Date: 2020-03-24
 * Time: 17:45
 * 组合（Composite）模式的定义：有时又叫作部分-整体模式，它是一种将对象组合成树状的层次结构的模式，
 * 用来表示“部分-整体”的关系，使用户对单个对象和组合对象具有一致的访问性。
组合模式的主要优点有：
组合模式使得客户端代码可以一致地处理单个对象和组合对象，无须关心自己处理的是单个对象，还是组合对象，这简化了客户端代码；
更容易在组合体内加入新的对象，客户端不会因为加入了新的对象而更改源代码，满足“开闭原则”；

其主要缺点是：
设计较复杂，客户端需要花更多时间理清类之间的层次关系；
不容易限制容器中的构件；
不容易用继承的方法来增加构件的新功能；
 *
 * 组合模式包含以下主要角色。
抽象构件（Component）角色：它的主要作用是为树叶构件和树枝构件声明公共接口
 * ，并实现它们的默认行为。在透明式的组合模式中抽象构件还声明访问和管理子类的接口；
 * 在安全式的组合模式中不声明访问和管理子类的接口，管理工作由树枝构件完成。
树叶构件（Leaf）角色：是组合中的叶节点对象，它没有子节点，用于实现抽象构件角色中 声明的公共接口。
树枝构件（Composite）角色：是组合中的分支节点对象，它有子节点。它实现了抽象构件角色中声明的接口，
 * 它的主要作用是存储和管理子部件，通常包含 Add()、Remove()、GetChild() 等方法。
 */
//抽象构件
interface Article{
    public function calculation();  //计算
    public function show();  //显示
}

//树叶构件 商品
class Goods implements Article{
    private $_no;
    private $_name;
    private $_quantity;
    private $_unitPrice;
    public function __construct($no,$name,$quantity,$price)
    {
        $this->_no = $no;
        $this->_name = $name;
        $this->_quantity = $quantity;
        $this->_unitPrice = $price;
    }

    public function calculation()
    {
        // TODO: Implement calculation() method.
        return $this->_quantity * $this->_unitPrice;
    }
    public function show()
    {
        // TODO: Implement show() method.
        echo "购买商品编号:".$this->_no.",名称:".$this->_name.",数量:".$this->_quantity.",单价:".$this->_unitPrice."\n";
    }
}
//树枝构件： 袋子
class Bags implements Article{
    private $_name;
    private $_no;
    private $_bags = [];
    public function __construct($no,$name)
    {
        $this->_name = $name;
        $this->_no = $no;
    }
    public function add($no,Article $c){
        $this->_bags[$no] = $c;
    }
    public function remove($no){
        unset($this->_bags[$no]);
    }


    public function calculation()
    {
        $total = 0;
        foreach($this->_bags as $val){
            $total += $val->calculation();
        }
        return $total;
        // TODO: Implement calculation() method.
    }
    public function show()
    {
        foreach($this->_bags as $val){
            $val->show();
        }
        // TODO: Implement show() method.
    }
}

$smallbag1 = new Bags("BS1","小袋子1号");
$smallbag2 = new Bags("BS2","小袋子2号");
$midbag = new Bags("BM1","中袋子");
$bigBag = new Bags("BB1","大袋子");

$good = new Goods("g1","白菜",1,5);
$smallbag1->add("g1",$good);
$good = new Goods("g2","花菜",3,3.5);
$smallbag1->add("g2",$good);
$good = new Goods("g3","鸡蛋",12,0.5);
$smallbag2->add("g3",$good);
$midbag->add("BS1",$smallbag1);
$bigBag->add("BS2",$smallbag2);
$bigBag->add("BM1",$midbag);
$bigBag->show();
$total = $bigBag->calculation();
echo "总价：".$total;