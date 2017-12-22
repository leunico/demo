<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Api extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax())
            return jsonOutPut(1, '', Loader::model('Api')->where($this->groupCondition('interface'))->order('interface_order ASC')->field('interface_id,interface_url,interface_method,interface_name,interface_status,interface_order,update_time')->paginate(10));
        else
            abort(404, '请求错误！');
    }

    public function edit($id)
    {
        $data = Loader::model('Api')->find($id)->toArray();
        $data['interface_countH'] = count($data['interface_header']);
        $data['interface_countB'] = count($data['interface_body']);
        $data['interface_countR'] = count($data['interface_response']);
        $this->assign($data);
        return $this->fetch('edit');
    }

    public function create()
    {
        $this->assign([
            'project_id' => $this->request->get('pid', 0),
            'group_id' => $this->request->get('gid', 0),
            'interface_id' => 0,
            'interface_url' => '',
            'interface_name' => '',
            'interface_body_model' => 1,
            'interface_header' => [],
            'interface_countH' => 0,
            'interface_body' => [],
            'interface_countB' => 0,
            'interface_response' => [],
            'interface_countR' => 0,
            'interface_status' => ['id' => 1],
            'interface_method' => '',
            'interface_sucess_consult' => '',
            'interface_error_consult' => ''
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

        $field['interface_body_model'] = $data['body_mode'];
        $field['project_id'] = $data['project_id'];
        $field['group_id'] = isset($data['group_Child']) && !empty($data['group_Child']) ? $data['group_Child'] : $data['group_Parent'];
        $field['interface_status'] = isset($data['interface_status']) ? $data['interface_status'] : 0;
        $field['interface_name'] = $data['interface_name'];
        $field['interface_method'] = $data['interface_method'];
        $field['interface_url'] = $data['interface_url'];
        $field['interface_sucess_consult'] = $data['sucess_consult'];
        $field['interface_error_consult'] = $data['error_consult'];

        $field['interface_header'] = $field['interface_body'] = $field['interface_response'] = [];
        if(!empty($data['header_value'])){
            foreach($data['header_value'] as $k=>$v){
                if(empty($v)) continue;
                $field['interface_header'][] = [
                    'header_value'  => $v,
                    'header_key'    => isset($data['header_key'][$k]) ? $data['header_key'][$k] : '',
                    'header_remark' => isset($data['header_remark'][$k]) ? $data['header_remark'][$k] : ''
                ];
            }
        }

        if($data['body_mode'] != 3){
            foreach($data['body_name'] as $k=>$v){
                if(empty($v)) continue;
                $field['interface_body'][] = [
                    'body_name'   => $v,
                    'body_check'  => isset($data['body_check'][$k]) ? $data['body_check'][$k] : '',
                    'body_remark' => isset($data['body_remark'][$k]) ? $data['body_remark'][$k] : '',
                    'body_type'   => isset($data['body_type'][$k]) ? $data['body_type'][$k] : '',
                    'body_value'  => isset($data['body_value'][$k]) ? $data['body_value'][$k] : ''
                ];
            }
        }else{
            $field['interface_body'] = $data['body_raw'];
        }

        if(!empty($data['response_name'])){
            foreach($data['response_name'] as $k=>$v){
                if(empty($v)) continue;
                $field['interface_response'][] = [
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
        $this->assign('interface_id', $id);
        $this->assign('project_id', $this->request->get('pid', 0));
        return $this->fetch('reset');
    }

    public function group()
    {
        if(empty($this->request->post('interface_id', 0)) || empty($this->request->post('group_Parent', 0)))
            jsonOutPut(0, '参数错误', []);

        $field['group_id'] = !empty($this->request->post('group_Child', 0)) ? $this->request->post('group_Child') : $this->request->post('group_Parent');
        $group = Loader::model('Api')->get($this->request->post('interface_id'))->save($field);
        return $group ? jsonOutPut(1, '操作成功', $group) : jsonOutPut(0, '操作失败', []);
    }

    public function delete($id)
    {
        $delete = Loader::model('Api')->save(['group_id' => 0], ['interface_id' => $id]);
        return $delete ? jsonOutPut(1, '删除成功', $delete) : jsonOutPut(0, '删除失败', []);
    }

    public function order($id)
    {
        $order = Loader::model('Api')->save(['interface_order' => $this->request->put('order', 0)], ['interface_id' => $id]);
        return $order ? jsonOutPut(1, '操作成功', $order) : jsonOutPut(0, '操作失败', []);
    }

    public function destroy($id)
    {
        $delete = Loader::model('Api')->destroy($id);
        return $delete ? jsonOutPut(1, '删除成功', $delete) : jsonOutPut(0, '删除失败', $delete);
    }

    public function all_destroy($id)
    {
        $delete = Loader::model('Api')->where(['project_id' => $id, 'group_id' => 0])->destroy($id);
        return $delete ? jsonOutPut(1, '删除成功', $delete) : jsonOutPut(0, '删除失败', $delete);
    }
}