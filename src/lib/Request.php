<?php
/**
 * 数据控制器
 * @author Kinsama
 * @version 2016-12-30
 */
class Request
{
    /**
     * 页面menu
     */
    public $current_menu = SYSTEM_DEFAULT_MENU;

    /**
     * 页面act
     */
    public $current_act = SYSTEM_DEFAULT_ACT;

    /**
     * 页面token
     */
    public $current_token = SYSTEM_DEFAULT_TOKEN;

    /**
     * 页面指向方式
     */
    private $_target_type = false;

    /**
     * 页面参数
     * @access private
     */
    private $_parameters;

    /**
     * 错误信息
     * @access private
     */
    private $_error = array();

    /**
     * 数据列
     * @access private
     */
    private $_attributes = array();

    /**
     * 初始化
     */
    public function __construct()
    {
        $this->_parameters = $_REQUEST;
        if (isset($this->_parameters["t"])){
            $this->_target_type = true;
            $this->current_token = $this->_parameters["t"];
            unset($this->_parameters["t"]);
        } elseif (isset($this->_parameters["menu"]) && isset($this->_parameters["act"])) {
            $this->current_menu = $this->_parameters["menu"];
            $this->current_act = $this->_parameters["act"];
            unset($this->_parameters["menu"]);
            unset($this->_parameters["act"]);
        }
    }

    /**
     * 获取页面指向方式
     */
    public function getTargetType()
    {
        return $this->_target_type;
    }

    /**
     * 根据参数名判断参数是否存在
     *
     * @param string $name 参数名
     * @return boolean
     */
    public function hasParameter($name)
    {
        return isset($this->_parameters[$name]);
    }

    /**
     * 根据参数名获取参数值
     *
     * @param string $name 参数名
     * @return mixed
     */
    public function getParameter($name)
    {
        if (!$this->hasParameter($name)) {
            return null;
        }
        return $this->_parameters[$name];
    }

    /**
     * 获取全部参数
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->_parameters;
    }

    /**
     * 判断错误是否存在
     * @param string $name 错误名
     * @return boolean
     */
    public function isError($name = null)
    {
        if ($name === null) {
            if (empty($this->_error)) {
                return false;
            }
        } else {
            if (!isset($this->_error[$name])) {
                return false;
            }
        }
        return true;
    }

    /**
     * 获取错误
     * @param string $name 错误名
     * @return array
     */
    public function getError($name = null)
    {
        if ($name === null) {
            return $this->_error;
        } else {
            if (isset($this->_error[$name])) {
                return $this->_error[$name];
            } else {
                return null;
            }
        }
    }

    /**
     * 设置错误
     * @param string $name 错误名
     * @param string $description 错误描述
     */
    public function setError($name, $desc)
    {
        $this->_error[$name] = $desc;
        return;
    }

    /**
     * 设置数据
     * @param string $name 数据名
     * @param mixed $value 数据值
     */
    public function setAttribute($name, $value)
    {
        $this->_attributes[$name] = $value;
        return;
    }

    /**
     * 批量设置数据
     * @param array $value 数据数组
     */
    public function setAttributes($values)
    {
        if (!is_array($value)) {
            return;
        }
        foreach ($values as $tmp_key => $tmp_value) {
            $this->_attributes[$tmp_key] = $tmp_value;
        }
        return;
    }

    /**
     * 判断数据是否存在
     * @param string $name 数据名
     * @return boolean
     */
    public function hasAttribute($name)
    {
        if (!isset($this->_attributes[$name])) {
            return false;
        }
        return true;
    }

    /**
     * 获取数据
     * @param string $name 数据名
     * @return mixed
     */
    public function getAttribute($name)
    {
        if (!$this->hasAttribute($name)) {
            return null;
        }
        return $this->_attributes[$name];
    }

    /**
     * 获取全部数据列
     * @return array
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * 获取本类实例化对象
     * @return object
     */
    public static function getInstance()
    {
        return new Request();
    }
}
?>