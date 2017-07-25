<?php

/** 常量类，提供了遍历类中所有常量的方法 */
class CONST_CLASS
{
    /** 取出所有变量 */
    public static function getAllConstants()
    {
        $oClass = new ReflectionClass(get_called_class());
        $constants = $oClass->getConstants();
        return array_values($constants);
    }

    /** 取出指定变量的描述，继承时需要重写 */
    public static function getStr($pConst)
    {
        return $pConst;
    }

    /** 取出所有变量=>描述的字典 */
    public static function getAllStrsOfConstants()
    {
        $list = array();
        foreach (static::getAllConstants() as $pConst) {
            $list[$pConst] = static::getStr($pConst);
        }
        return $list;
    }
}



class STATUS_CONST extends CONST_CLASS
{
    const DISABLED                   = 0;
    const NORMAL                     = 1;
    const DRAFT                      = 2;
    const PENDING                    = 3;

    public static function getStr($pConst)
    {
        $valueList = array(
                 static::DISABLED              => '不存在'
                ,static::NORMAL                => '正常'
                ,static::DRAFT                 => '草稿'
                ,static::PENDING               => '待审'
            );

        return isset($valueList[$pConst])?$valueList[$pConst]:'';
    }
}
