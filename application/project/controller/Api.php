<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Api extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax())
            return jsonOutPut(1, '', Loader::model('Api')->where($this->apiCondition())->order('interface_Order ASC')->field('interface_Id,interface_Url,interface_Method,interface_Name,interface_Status,interface_Order,update_time')->paginate(10));
        else
            abort(404, '请求错误！');
    }

    public function edit($id)
    {
        $data = Loader::model('Api')->find($id)->toArray();
        $data['interface_countH'] = count($data['interface_Header']);
        $data['interface_countB'] = count($data['interface_Body']);
        $data['interface_countR'] = count($data['interface_Response']);
        $this->assign($data);
        return $this->fetch('edit');
    }

    public function create()
    {
        $this->assign([
            'project_Id' => $this->request->get('pid', 0),
            'group_Id' => $this->request->get('gid', 0),
            'interface_Id' => 0,
            'interface_Url' => '',
            'interface_Name' => '',
            'interface_BodyModel' => 1,
            'interface_Header' => [],
            'interface_countH' => 0,
            'interface_Body' => [],
            'interface_countB' => 0,
            'interface_Response' => [],
            'interface_countR' => 0,
            'interface_Status' => ['id' => 1],
            'interface_Method' => '',
            'interface_SucessConsult' => '',
            'interface_ErrorConsult' => ''
        ]);
        return $this->fetch('edit');
    }

    public function update()
    {
        return $this->save();
    }

    public function save()
    {
        $data = $this->request->param();
        $validate = Loader::validate('Api');
        if(!$validate->check($data))
            return jsonOutPut(0, $validate->getError(), '');

        $field['interface_BodyModel'] = $data['body_mode'];
        $field['project_Id'] = $data['project_Id'];
        $field['group_Id'] = isset($data['group_Child']) && !empty($data['group_Child']) ? $data['group_Child'] : $data['group_Parent'];
        $field['interface_Status'] = isset($data['interface_Status']) ? $data['interface_Status'] : 0;
        $field['interface_Name'] = $data['interface_Name'];
        $field['interface_Method'] = $data['interface_Method'];
        $field['interface_Url'] = $data['interface_Url'];
        $field['interface_SucessConsult'] = $data['sucess_consult'];
        $field['interface_ErrorConsult'] = $data['error_consult'];

        $field['interface_Header'] = $field['interface_Body'] = $field['interface_Response'] = [];
        if(!empty($data['header_value'])){
            foreach($data['header_value'] as $k=>$v){
                if(empty($v)) continue;
                $field['interface_Header'][] = [
                    'header_value'  => $v,
                    'header_key'    => isset($data['header_key'][$k]) ? $data['header_key'][$k] : '',
                    'header_remark' => isset($data['header_remark'][$k]) ? $data['header_remark'][$k] : ''
                ];
            }
        }

        if($data['body_mode'] != 3){
            foreach($data['body_name'] as $k=>$v){
                if(empty($v)) continue;
                $field['interface_Body'][] = [
                    'body_name'   => $v,
                    'body_check'  => isset($data['body_check'][$k]) ? $data['body_check'][$k] : '',
                    'body_remark' => isset($data['body_remark'][$k]) ? $data['body_remark'][$k] : '',
                    'body_type'   => isset($data['body_type'][$k]) ? $data['body_type'][$k] : '',
                    'body_value'  => isset($data['body_value'][$k]) ? $data['body_value'][$k] : ''
                ];
            }
        }else{
            $field['interface_Body'] = $data['body_raw'];
        }

        if(!empty($data['response_name'])){
            foreach($data['response_name'] as $k=>$v){
                if(empty($v)) continue;
                $field['interface_Response'][] = [
                    'response_name'   => $v,
                    'response_check'  => isset($data['response_check'][$k]) ? $data['response_check'][$k] : '',
                    'response_remark' => isset($data['response_remark'][$k]) ? $data['response_remark'][$k] : '',
                    'response_value'  => isset($data['response_value'][$k]) ? $data['response_value'][$k] : '',
                    'response_type'   => isset($data['response_type'][$k]) ? $data['response_type'][$k] : ''
                ];
            }
        }
        $interface = isset($data['id']) ? Loader::model('Api')->get($data['id']) : Loader::model('Api');
        return jsonOutPut(1, '操作成功', $interface->save($field)); // 不做状态判断！
    }

    public function reset($id)
    {
        $this->assign('interface_Id', $id);
        $this->assign('project_Id', $this->request->get('pid', 0));
        return $this->fetch('reset');
    }

    public function group()
    {
        if(empty($this->request->post('interface_Id', 0)) || empty($this->request->post('group_Parent', 0)))
            jsonOutPut(0, '参数错误', []);

        $field['group_Id'] = !empty($this->request->post('group_Child', 0)) ? $this->request->post('group_Child') : $this->request->post('group_Parent');
        $group = Loader::model('Api')->get($this->request->post('interface_Id'))->save($field);
        return $group ? jsonOutPut(1, '操作成功', $group) : jsonOutPut(0, '操作失败', []);
    }

    public function delete($id)
    {
        $delete = Loader::model('Api')->save(['group_Id' => 0], ['interface_Id' => $id]);
        return $delete ? jsonOutPut(1, '删除成功', $delete) : jsonOutPut(0, '删除失败', []);
    }

    public function order($id)
    {
        $order = Loader::model('Api')->save(['interface_Order' => $this->request->put('order', 0)], ['interface_Id' => $id]);
        return $order ? jsonOutPut(1, '操作成功', $order) : jsonOutPut(0, '操作失败', []);
    }

    public function destroy($id)
    {
        $delete = Loader::model('Api')->destroy($id);
        return $delete ? jsonOutPut(1, '删除成功', $delete) : jsonOutPut(0, '删除失败', $delete);
    }

    public function all_destroy($id)
    {
        $delete = Loader::model('Api')->where(['project_Id' => $id, 'group_Id' => 0])->destroy($id);
        return $delete ? jsonOutPut(1, '删除成功', $delete) : jsonOutPut(0, '删除失败', $delete);
    }
}