<?php
namespace Coole;
//框架入口文件
//自动加载框架文件
class Coole{
	//命名空间映射
	protected $_maps = [];
	function __construct(){
		spl_autoload_register([$this,'autoload']);
	}
	
	//自动加载函数
	function autoload($className){
		//命名空间名拼接类名
		//得到命名空间名，根据命名空间名得到文件路径
		$pos = strrpos($className , '\\');
		$namespace = substr($className , 0 , $pos);
		$realClass = substr($className , $pos + 1 );
		//找到文件并引入
		$this -> mapLoad($namespace , $realClass);
		
	}
	//根据命名空间名得到目录路径，获取文件全路径
	protected function mapLoad($namespace , $realClass){
		if(array_key_exists($namespace , $this->_maps)){
			$namespace = $this->_maps[$namespace];
		}
		//处理路径
		$namespace = rtrim(str_replace('\\/' , '/' , $namespace),'/').'/';
		//拼接文件全路径
		$filePath = $namespace.$realClass.'.php';
		//引入文件
		if(file_exists($filePath)){
			include $filePath;
		}else{
			die('文件路径不存在:'.$filePath);
		}
	}
	//将命名空间 和路径映射到数组中
	function addMaps($namespace , $path){
		if(array_key_exists($namespace,$this->_maps)){
			die($namespace.'命名空间已经映射过');
		}
		//将命名空间和路径以键值对形式存放到数组中
		$this->_maps[$namespace] = $path;
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
$coole = new Coole();
$coole->addMaps('controller' , 'app/controller');