# thinkphp5.1-weixinpay

thinkphp5.1 微信网站扫码支付

将目录下的weixin_pc_pay.php移到config目录，修改对应参数即可。

公共函数：
<pre>
/**
 * 微信扫码支付
 * @param  array $order 订单 必须包含支付所需要的参数 body(产品描述)、total_fee(订单金额)、out_trade_no(订单号)、product_id(产品id)
 */
function weixinpay($order){
    $order['trade_type']='NATIVE';
    $weixinpay = new mangdin\weixinpay\Weixinpay();
    return $weixinpay->pay($order);

}
</pre>

控制器调用支付代码
<pre>
/**
     * 微信PC 扫码支付
     * @param $orderid  订单ID
     */
    public function weixinpay($orderid){
        $order=array(
            'body'=>$subject['goods']['title'], //订单描述
            'total_fee'=>$price*100,  //订单金额
            'out_trade_no'=>$subject['sn'], //订单编号
            'product_id'=>$subject['goods']['id'] //商品ID，可不传
        );
        $url = weixinpay($order); //该URL地址即为扫码支付地址，将此地址转为二维码即可
    }
</pre>

回调控制器代码
<pre>
/**
     * notify_url接收页面
     */
    public function notify(){
        // 导入微信支付sdk
        $wxpay=new \mangdin\weixinpay\Weixinpay();
        $result=$wxpay->notify();
        if ($result) {
            // 验证成功 修改数据库的订单状态等 $result['out_trade_no']为订单号
        }
    }
</pre>
