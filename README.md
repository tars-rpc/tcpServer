# tcpServer

## 前言
* PHP的框架有一些，但像[tars](https://github.com/TarsCloud)这样提供各个语言的实现版本，提供部署界面的还是不多的，而且效率上，根据官方压测，性能比grpc还好
* 所以在对其使用上做个简单的参考，便于大家更好的使用[tarsphp](https://github.com/TarsPHP)

### 环境要求
* PHP 7.2+

## 框架的使用
### 准备阶段
* 在`tars`目录中声明一个tars文件
* 运行tars转php的脚本：

```shell
cd scripts
chmod u+x tars2php.sh
./tars2php.sh
```


## 参考资料
* tarsphp官方文档 https://tarsphp.gitbook.io/doc/
* tarsphp的仓库 https://github.com/TarsPHP/TarsPHP
