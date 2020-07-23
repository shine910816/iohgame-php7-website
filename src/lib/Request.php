<?php
namespace Ioh\Library;

use Ioh\Library\Attributes;

/**
 * 数据控制器
 * @author Kinsama
 * @version 2016-12-30
 */
class Request extends Attributes
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
     * 页面参数
     * @access private
     */
    private $_parameter;

    /**
     * 错误信息
     * @access private
     */
    private $_error = array();

    /**
     * 初始化
     */
    public function __construct()
    {
        $parameter = ($_SERVER['REQUEST_METHOD'] == 'POST') ? $_POST : $_GET;
        // TODO
        //if (isset($parameter['menu']) && isset($parameter['act'])) {
        //    $this->current_menu = $parameter['menu'];
        //    $this->current_act = $parameter['act'];
        //} elseif (isset($_GET['menu']) && isset($_GET['act'])) {
        //    $this->current_menu = $_GET['menu'];
        //    $this->current_act = $_GET['act'];
        //}
        $this->_parameter = $parameter;
    }

    /**
     * 根据参数名判断参数是否存在
     *
     * @param string $name 参数名
     * @return boolean
     */
    public function hasParameter($name)
    {
        return isset($this->_parameter[$name]);
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
        return $this->_parameter[$name];
    }

    /**
     * 获取全部参数
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->_parameter;
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
     * 获取本类实例化对象
     * @return object
     */
    public static function getInstance()
    {
        return new Request();
    }
}
?>