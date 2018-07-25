<?php
/**
 * Created by 合肥芒丁数据系统有限责任公司.
 * User: wangyang
 * Date: 2018/6/1
 * Time: 14:04
 */

return  [
    //支付宝即时到帐接口信息
    'APPID'=>'',
    'MCHID'=>'',
    'KEY'=>'',
    'APPSECRET'=>'',
    'Status'=>'1',
    'NOTIFY_URL'=>'http://'.$_SERVER['HTTP_HOST'].'/index/Weixinpay/notify/'  //回调地址，更改项目实际回调地址
];
