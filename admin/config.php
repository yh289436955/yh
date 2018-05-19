<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 15:53
 */
//mysql主机名
define('DB_HOST','localhost');

//mysql数据库端口
define('DB_PORT',3306);

//mysql数据库用户名
define('DB_USER','root');

//mysql数据库密码
define('DB_PASS','123456');

//mysql数据库名称
define('DB_NAME','yh');

//创建数据库表时默认文字编码
define('DB_CHARSET','utf8');

//数据库表前缀
define('TABLE_PREFIX','dir_');

//是否保持链接
define('DB_PCONNECT',false);

//模板风格目录
define('THEME_DIR','template');

//是否启用缓存
define('CACHE_ON',false);

//缓存时间周期（单位为秒）
define('CACHE_LIFETIME',3600);
?>