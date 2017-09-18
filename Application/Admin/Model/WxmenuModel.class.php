<?php
namespace Admin\Model;
use Think\Model;
class WxmenuModel extends Model {
    public function addmenu($data){
        if(I("post.editid")){
            $menu = M ('wxmenu')->where(array('id'=>I("post.editid")))->save ($data);
            $res['code']=200;
            $res['mes'] = '菜单修改成功';
            return $res;
        }

        if($data['pid']==0){

            $menunum = M('wxmenu')->where(array('weid'=>$data['weid'],'pid'=>0))->count();
            if($menunum >=3){
                $res['code']=201;
                $res['mes'] = '一级菜单个数不能超过3个';
                return $res;
            }
        }else{
            $submenunum = M('wxmenu')->where(array('pid'=>$data['pid']))->count();
            if($submenunum >=5){
                $res['code']=201;
                $res['mes'] = '二级菜单个数不能超过5个';
                return $res;
            }
        }

        $menu = M ('wxmenu')->add ($data);


        if($menu){
            $res['code']=200;
            $res['mes'] = '菜单创建成功';
            return $res;
        }else{
            $res['code']=201;
            $res['mes'] = '菜单创建失败';
        }

    }

}