<?php
namespace Coole;
class Start{
	//保存自动加载对象
	static public $auto;
	//启动
	static public function init(){
		self::$auto = new Coole();
	}
	//路由方法
	static function router(){
        //从url中获取要执行的控制器中的方法
        $m = empty($_GET['m']) ? 'index' : $_GET['m'];
        $a = empty($_GET['a']) ? 'index' : $_GET['a'];
        //设置参数默认值
        $_GET['m'] = $m;
        $_GET['a'] = $a;
        //将index处理
        $m = ucfirst(strtolower($m));
        //拼接带有命名空间的类名
        $controller = 'controller\\'.$m.'Controller';
        //dump($controller);
        //创建对象并执行对应方法
        $obj = new $controller();
        call_user_func([$obj, $a]);
	}
}

Start::init();