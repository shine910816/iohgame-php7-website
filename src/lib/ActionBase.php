<?php
/**
 * Action基类
 */
abstract class ActionBase
{
    public function doMainExecute(Controller $controller, User $user, Request $request)
    {
        return VIEW_NONE;
    }

    public function doMainValidate(Controller $controller, User $user, Request $request)
    {
        return VIEW_NONE;
    }
}
?>