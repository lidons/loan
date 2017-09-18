<?php
namespace Admin\Model;
use Think\Model;
class WxreplyModel extends Model {

    public function addnews($image){
        $data = I('post.');
        $data['image'] = $image;
        $data['weid'] = session('weid');
        $data['type'] = 'news';
        $news = M('wxreply')->add($data);
        return $news;
    }
    public function getlist($type){
        $list = M('wxreply')->where(array('weid',session('weid'),'type'=>$type))->select();
        return $list;
    }
    public function getkeywords(){
        $list = M('wxreply')->where(array('weid',session('weid')))->select();
        return $list;
    }
    public function addtext(){
        $data = I('post.');
        $data['weid'] = session('weid');
        $data['type'] = 'text';
        $news = M('wxreply')->add($data);
        return $news;
    }
    //检查关键字是否重复
    public function check($keywords){
        $res = M('wxreply')->where(array('weid'=>session('weid'),'keywords'=>$keywords))->find();
        return $res;
    }
    //设置关注回复
    public function addtosub($value){
        M('wxreply')->where(array('weid'=>session('weid')))->save(array('is_subscribe'=>0));
        $res = M('wxreply')->where(array('weid'=>session('weid'),'keywords'=>$value))->save(array('is_subscribe'=>1));
        return $res;

    }
    //查询关注回复
    public function subscribe_reply($weid){
        $res = M('wxreply')->where(array('weid'=>$weid,'is_subscribe'=>1))->find();
        return $res;

    }
    //微信对话框关键字匹配回复
    public function chat($weid,$key){
        $arr = M('wxreply')->where(array('weid'=>$weid,'keywords'=>$key))->find();
        return $arr;
    }
}