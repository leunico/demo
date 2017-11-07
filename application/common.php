<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

# 返回包装好的json数据
function jsonOutPut($status, $msg='', $data='', $page=1, $count=0)
{
    return json(['status' => $status, 'msg' => $msg, 'data' => $data, 'page' => $page, 'count' => $count]);
}