<?php
/**
 * Date: 2022/7/31
 * Time: 08:50
 * 源码获取=>纸飞机(Telegram):@laowu2021
 */
namespace app\api\controller;


class Trc20 extends Controller
{
    protected $config;
    protected $uri;
    protected $privateKey;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->uri = 'https://api.trongrid.io'; /*API地址*/
        /*基础配置*/
        $this->config = [
            'contract_address' => 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',// USDT TRC20 合约地址，固定的不要轻易动
            'decimals' => 6, /*精度*/
        ];
    }


    /**
     * 生成地址
     * /api/trc20/generateAddress
     */
    public function generateAddress()
    {
        $tron = new \IEXBase\TronAPI\Tron();
        $generateAddress = $tron->generateAddress(); // or createAddress()
        $address = (array)($generateAddress)->getRawData();
        $retdata['privateKey'] = $address['private_key'];
        $retdata['address'] = $address['address_base58'];
        $retdata['hexAddress'] = $address['address_hex'];
        return json(['code' => 1, 'data' => $retdata]);
    }



    /**
     * 获取余额
     * $address 地址对象
     * /api/trc20/getAddressBalance?address=TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny
     */
    public function getAddressBalance()
    {
        $address = $this->request->param("address", "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny");
        $api = new \Tron\Api(new Client(['base_uri' => $this->uri]));
        $TRC20 = new \Tron\TRC20($api, $this->config);
        $hexAddress = $TRC20->tron->address2HexString($address);
        $getBalance = new Address($address, '', $hexAddress);
        $balance = $TRC20->balance($getBalance);
//        return $balance;
        return json(['code' => 1, 'data' => $balance]);
    }

    /**
     * @return \think\response\Json
     * 自由转账交易转账（离线签名）
     * $amount 转出金额，最小单位为1 精度为6
     * $toaddress  收U的钱包地址
     * $key  转U的钱包私钥
     * TRC-20 合约 ：https://cn.developers.tron.network/reference/trc-20-contracts （需要科学上网）
     * /api/trc20/transfer?key=41369219ae69fc11ecb5************************8402bdf4d6fe0a7fb6ca752b38b&toaddress=TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny&amount=1
     */
    public function transfer()
    {
        $toaddress = $this->request->param("toaddress", "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny");
        $key = $this->request->param("key", "");
        $amount = $this->request->param("amount", "1.000001");

        if (!$key) {
            return json(['code' => 0, 'data' => null, 'msg' => '私钥不能为空']);
        }

        $api = new \Tron\Api(new Client(['base_uri' => $this->uri]));

        $TRC20 = new \Tron\TRC20($api, $this->config);

        $from = self::getAddressv2($key);

        $hexAddress = $TRC20->tron->address2HexString($toaddress);

        $to = new Address($toaddress, '', $hexAddress);

        $ret = $TRC20->transfer($from, $to, $amount);

        return json(['code' => 1, 'data' => $ret]);
    }

    /**
     * 查询交易信息
     * txHash 为转账返回结果参数 txID
     * /api/trc20/transData?txID=40ad467bc5d727164988312e992ea3d7402743d82c4b26244f92ba4194302ce2
     */
    public function transData()
    {

        $txHash = $this->request->get("txID", "40ad467bc5d727164988312e992ea3d7402743d82c4b26244f92ba4194302ce2");

        $api = new \Tron\Api(new Client(['base_uri' => $this->uri]));

        $TRC20 = new \Tron\TRC20($api, $this->config);;

        $ret = $TRC20->transactionReceipt($txHash);

        return json(['code' => 1, 'data' => $ret]);

    }


    /**
     * 根据私钥获取地址
     * $privateKey 私 钥
     * /api/trc20/getAddress?privateKey=41369219ae69fc11ecb5************************8402bdf4d6fe0a7fb6ca752b38b
     */
    public function getAddress()
    {
        $privateKey = $this->request->get("privateKey", "41369219ae69fc11ecb5************************8402bdf4d6fe0a7fb6ca752b38b");
        $api = new \Tron\Api(new Client(['base_uri' => $this->uri]));
        $TRC20 = new \Tron\TRC20($api, $this->config);
        $privateKeyToAddress = $TRC20->privateKeyToAddress($privateKey);
        return json(['code' => 1, 'data' => $privateKeyToAddress]);
    }

    /**
     * 查看区块高度
     * /api/trc20/blockNumber
     */
    public function blockNumber(){
        $api = new \Tron\Api(new Client(['base_uri' => $this->uri]));
        $TRC20 = new \Tron\TRC20($api, $this->config);
        $block=$TRC20->blockNumber();
        return json(['code' => 1, 'data' => $block]);
    }

    /**
     * 根据区块链查询信息
     * /api/trc20/blockByNumber?blockID=123123123
     */
    public function blockByNumber(){

        $blockID = $this->request->get("blockID", "123123");

        $api = new \Tron\Api(new Client(['base_uri' => $this->uri]));

        $TRC20 = new \Tron\TRC20($api, $this->config);

        $block=$TRC20->blockByNumber($blockID);

        return json(['code' => 1, 'data' => $block]);
    }


    /**
     * 根据私钥获取地址
     * $privateKey 私 钥
     */
    private function getAddressv2($key)
    {
        $api = new \Tron\Api(new Client(['base_uri' => $this->uri]));
        $TRC20 = new \Tron\TRC20($api, $this->config);
        /*私钥地址*/
        $privateKeyToAddress = $TRC20->privateKeyToAddress($key);
        return $privateKeyToAddress;
    }


}
