<?php
namespace Ioh\Library;

class Attributes
{
    /**
     * ������
     * @access private
     */
    private $_attributes = array();

    /**
     * &#35774;�ֿ���
     * @param string $name ����̾
     * @param mixed $value ����&#20540;
     */
    public function setAttribute($name, $value)
    {
        $this->_attributes[$name] = $value;
        return;
    }

    /**
     * ����&#35774;�ֿ���
     * @param array $value ������&#32452;
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
     * Ƚ�ǿ�������¸��
     * @param string $name ����̾
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
     * &#33719;�����
     * @param string $name ����̾
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
     * &#33719;������������
     * @return array
     */
    public function getAttributes()
    {
        return $this->_attribute;
    }
}
?>