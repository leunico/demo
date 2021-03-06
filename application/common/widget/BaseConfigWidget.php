<?php
namespace app\common\widget;

use think\Controller;
use think\Loader;

class BaseConfigWidget extends Controller
{
    public function icon($value = '', $type = 'webApplication')
    {
        $icon = (array)json_decode(Loader::model('Config')->where(['config_Name' => 'font_wesome', 'config_Group' => 'basic'])->value('config_Value'));
        if($type != 'all' && isset($icon[$type]))
            $icon = $icon[$type];

        $this->assign('value', $value);
        $this->assign('icon', $icon);
        return $this->fetch('common@widget/fontAwesome');
    }
}