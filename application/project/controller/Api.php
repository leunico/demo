<?php
namespace app\project\controller;

use app\project\common\BaseController;
use think\Loader;

class Api extends BaseController
{
    public function index()
    {
        if ($this->request->isAjax()){
            $items = Loader::model('Api')->where()->order('project_Id')->paginate(10)->toArray();
            return jsonOutPut(1, '', $items);
        }

//        abort(404, '请求错误！');
    }

    public function edit($id)
    {
        $data = Loader::model('Api')->find($id)->toArray();
        dump($data);die;
        $this->assign(Loader::model('Api')->find($id)->toArray());
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
            'interface_countH' => 1,
            'interface_Body' => [],
            'interface_countB' => 1,
            'interface_Response' => [],
            'interface_countR' => 1,
            'interface_Status' => 1,
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
        return jsonOutPut(1, '操作成功', $interface->save($field));
    }

    public function delete($id)
    {
        $delete = Loader::model('Api')->destroy($id);
        return $delete ? jsonOutPut(1, '删除成功', $delete) : jsonOutPut(0, '删除失败', $delete);
    }
}