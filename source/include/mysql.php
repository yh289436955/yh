<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 16:16
 */

class MySQL
{
    var $db_link;
    var $db_host;
    var $db_port;
    var $db_user;
    var $db_pwd;
    var $db_name;
    var $db_charset;
    var $table_prefix;
    var $queries = 0;
    var $datadir;

    function __construct($db_host, $db_port, $db_user, $db_pwd, $db_name, $db_charset, $table_prefix, $is_pconnect)
    {
        $this->db_host = $db_host;
        $this->db_port = $db_port;
        $this->db_user = $db_user;
        $this->db_pwd = $db_pwd;
        $this->db_name = $db_name;
        $this->db_charset = $db_charset;
        $this->table_prefix = $table_prefix;

        //数据备份路径
        $this->datadir = ROOT_PATH.'data/dbbak/';

        if ($is_pconnect)
        {
            if (!$this->db_link = @mysql_pconnect($db_host.':'.$db_port,$db_user,$db_pwd))
            {
                $this->halt('Can not connect to MySQL server!');
            }
        }
        else
        {
            if (!$this->db_link = @mysql_connect($db_host.':'.$db_port,$db_user,$db_pwd))
            {
                $this->halt('Can not connect to MySQL server!');
            }
        }

        if ($this->version() > '4.1')
        {
            if ($db_charset)
            {
                mysql_query("SET character_set_connection=".$db_charset.", character_set_results=".$db_charset.", character_set_client=binary", $this->db_link);
            }

            if ($this->version() > '5.0.1')
            {
                mysql_query("SET sql_mode=''", $this->db_link);
            }
        }

        if ($db_name)
        {
            $this->select_db($db_name);
        }
    }

    //链接数据库
    function select_db($db_name)
    {
        return mysql_select_db($db_name,$this->db_link);
    }
    //获取数据库版本信息
    function version ()
    {
        return mysql_get_server_info($this->db_link);
    }
    //数据库停止（错误）
    function halt ($msg = '',$sql = '')
    {
        $error = mysql_error();
        $errorNo = mysql_errno();

        $str = '';
        if ($msg)
        {
            $str = "<b>TIPS:</b> $msg<br />";
        }
        if ($sql)
        {
            $str .= '<b>SQL:</b>'.htmlspecialchars($sql).'<br />';
        }
        $str .= '<b>Error:</b>'.$error.'<br />';
        $str .= '<b>Errno:</b>'.$errorNo.'<br />';
        exit($str);
    }
    //数据库表前缀
    function table ($table_name)
    {
        return $this->table_prefix.$table_name;
    }

    //执行一条SQL语句
    function query ($sql,$type = '',$cachetime = FALSE)
    {
        $func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ? 'mysql_unbuffered_query' : 'mysql_query';
        if (!($query = $func($sql,$this->db_link)) && $type != 'SILENT')
        {
            $this->halt('MySQL Query Error', $sql);
        }
        $this->queries++;
        return $query;
    }

    //查询数据库关联数组
    function fetch_array ($query,$result_type = MYSQL_ASSOC)
    {
        return mysql_fetch_array($query,$result_type);
    }
    //获取数据库关联数组的前面
    function fetch_first($sql)
    {
        return $this->fetch_array($this->query($sql));
    }
    //获取数据库关联数组的第一个
    function fetch_one($sql)
    {
        $query = $this->query($sql);
        return $this->fetch_array($query);
    }
    //获取数据库关联数组（所有）
    function fetch_all($sql, $id = '') {
        $arr = array();
        $query = $this->query($sql);
        while($data = $this->fetch_array($query)) {
            $id ? $arr[$data[$id]] = $data : $arr[] = $data;
        }
        return $arr;
    }
    //获取数据库关联数组的指定一行
    function fetch_row($query) {
        $query = mysql_fetch_row($query);
        return $query;
    }
    //该函数返回一个包含字段信息的对象。
    function fetch_fields($query) {
        return mysql_fetch_field($query);
    }
    //返回查询结果指定的值
    function result($query, $row) {
        $query = @mysql_result($query, $row);
        return $query;
    }
    //返回查询结果指定的值（第一个）
    function result_first($sql) {
        $query = $this->query($sql);
        return $this->result($query, 0);
    }
    //返回结果集中行的数目。此命令仅对 SELECT 语句有效
    function num_rows($query) {
        $query = mysql_num_rows($query);
        return $query;
    }
    //函数返回结果集中字段的数。
    function num_fields($query) {
        return mysql_num_fields($query);
    }
    //函数返回前一次 MySQL 操作所影响的记录行数。
    function affected_rows() {
        return mysql_affected_rows($this->db_link);
    }
    //错误
    function error() {
        return (($this->db_link) ? mysql_error($this->db_link) : mysql_error());
    }
    function errno() {
        return intval(($this->db_link) ? mysql_errno($this->db_link) : mysql_errno());
    }
    //释放结果内存。
    function free_result($query) {
        return mysql_free_result($query);
    }
    //返回上一步 INSERT 操作产生的 ID。
    function insert_id() {
        return ($id = mysql_insert_id($this->db_link)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
    }
    //组装SQL语句
    function implode_field_value($array, $glue = ',') {
        $sql = $comma = '';
        foreach ($array as $key => $val) {
            $sql .= $comma."`$key`='$val'";
            $comma = $glue;
        }
        return $sql;
    }
    //插入
    function insert($table, $data, $replace = false) {
        $sql = $this->implode_field_value($data);
        $cmd = $replace ? 'REPLACE INTO' : 'INSERT INTO';
        //$table = $this->table($table);
        return $this->query("$cmd $table SET $sql");
    }
    //更新
    function update($table, $data, $condition = '') {
        $sql = $this->implode_field_value($data);
        //$table = $this->table($table);
        $where = '';
        if (empty($condition)) {
            $where = '1';
        } elseif (is_array($condition)) {
            $where = $this->implode_field_value($condition, ' AND ');
        } else {
            $where = $condition;
        }
        return $this->query("UPDATE $table SET $sql WHERE $where");
    }
    //删除
    function delete($table, $condition = '', $limit = 0) {
        //$table = $this->table($table);
        if (empty($condition)) {
            $where = '1';
        } elseif (is_array($condition)) {
            $where = $this->implode_field_value($condition, ' AND ');
        } else {
            $where = $condition;
        }
        $sql = "DELETE FROM $table WHERE $where ".($limit ? "LIMIT $limit" : '');
        return $this->query($sql);
    }

    //获取总数
    function get_count($table, $condition = '') {
        //$table = $this->table($table);
        if (empty($condition)) {
            $where = '1';
        } elseif (is_array($condition)) {
            $where = $this->implode_field_value($condition, ' AND ');
        } else {
            $where = $condition;
        }
        $row = $this->fetch_first("SELECT COUNT(*) AS num FROM $table WHERE $where");
        return $row['num'];
    }
    //关闭数据库
    function close() {
        return mysql_close($this->db_link);
    }

}