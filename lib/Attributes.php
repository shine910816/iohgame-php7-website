<?php
namespace Ioh\Library;

class Attributes
{
    /**
     * 数据列
     * @access private
     */
    private $_attributes = array();

    /**
     * &#35774;置数据
     * @param string $name 数据名
     * @param mixed $value 数据&#20540;
     */
    public function setAttribute($name, $value)
    {
        $this->_attributes[$name] = $value;
        return;
    }

    /**
     * 批量&#35774;置数据
     * @param array $value 数据数&#32452;
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
     * &#33719;取数据
     * @param string $name 数据名
     * @return mixed
     */
    public function getAttribute($name)
    {
        if (!$this->hasAttribute($name)) {
            return null;
        }
        return $this->_attribute[$name];
    }

    /**
     * &#33719;取全部数据列
     * @return array
     */
    public function getAttributes()
    {
        return $this->_attribute;
    }
}
?>