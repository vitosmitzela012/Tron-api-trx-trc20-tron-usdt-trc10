<?php
/**
 * Date: 2022/7/31
 * Time: 08:50
 * 源码获取=>纸飞机(Telegram):@laowu2021
 */

namespace app\api\controller;


class Trx extends Controller
{
    protected $config;
    protected $uri;
    use TronAwareTrait;

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
     * @return \think\response\Json
     * @throws \IEXBase\TronAPI\Exception\TronException
     * 查询余额
     * /api/trx/getBalance?address=TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny
     */
    public function getBalance()
    {
        $address = $this->request->get('address');
        $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $signServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $explorer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer, $signServer, $explorer);
        //Balance  查询TRX余额
        $Balance = $tron->getBalance($address, true);
        return json(['code'=>1,'data'=>$Balance,'msg'=>'查询成功','time'=>time()]);
    }


    /**
     * @param $to 接收trx的账户地址
     * @param $key 接收trx的账户私钥 可以修改去掉这个参数，因为你可以不查接收账号的TRX余额，查一下是为了防止多转手续费，看个人自己
     * @return false
     * @throws \IEXBase\TronAPI\Exception\TronException
     * 注意：到账是有延迟的，所以不能立即执行转账操作，可以写个脚本三分钟后再去处理转账操作，对应的订单加一个trx转账发起时间，这样就能监控哪些订单时间足够可以进行下一步U的转账
     * /api/trx/send?to=TVLNeBgwfB9DvraN92mmWwNJsuV8Fgte4B&key=edf7b330332cad58ddcbc04**********766e5103b4e52c&account=0.1
     */
    public function send()
    {
        $to = $this->request->get('to');
        $account = (float)$this->request->get('account');
        $key = $this->request->get('key');
        $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $signServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $explorer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer, $signServer, $explorer,$key);
        //Balance  查询TRX余额
        $fromaddress=self::getAddressv($key);
        $ret=$tron->sendTrx($to, $account, null, $fromaddress->address);
        return json(['code'=>1,'data'=>$ret,'msg'=>'操作成功','time'=>time()]);
        //{"result":true,"txid":"72aafccbb9ba4595a3c2d5ec8fd292f6121cde1c424895148b74145dda8574fa","visible":false,"txID":"72aafccbb9ba4595a3c2d5ec8fd292f6121cde1c424895148b74145dda8574fa","raw_data":{"contract":[{"parameter":{"value":{"amount":1000000,"owner_address":"41bfb14932a54572576b7afce2362aaa61b73fe52c","to_address":"41ad9f1cae0fdef98446b7aae9502ff3626c96732d"},"type_url":"type.googleapis.com\/protocol.TransferContract"},"type":"TransferContract"}],"ref_block_bytes":"69bb","ref_block_hash":"2ac135d43ba624e8","expiration":1649777049000,"timestamp":1649776992092},"raw_data_hex":"0a0269bb22082ac135d43ba624e840a8fbfff281305a67080112630a2d747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e5472616e73666572436f6e747261637412320a1541bfb14932a54572576b7afce2362aaa61b73fe52c121541ad9f1cae0fdef98446b7aae9502ff3626c96732d18c0843d70dcbefcf28130","signature":["51810c5ee788ed5572f3fedb20630e0a04c8debfbaa7a9ed2c5e3185ce5f8a5f40999dc58557d0ae0e1a60a20e5d9774f51337bfdf03623d88e2d8ca5613eaf201"]}
    }


    /**
     * @param $to 接收trx的账户地址
     * @param $key 接收trx的账户私钥 可以修改去掉这个参数，因为你可以不查接收账号的TRX余额，查一下是为了防止多转手续费，看个人自己
     * @return false
     * @throws \IEXBase\TronAPI\Exception\TronException
     * 注意：到账是有延迟的，所以不能立即执行转账操作，可以写个脚本三分钟后再去处理转账操作，对应的订单加一个trx转账发起时间，这样就能监控哪些订单时间足够可以进行下一步U的转账
     * /api/trx/send?to=TVLNeBgwfB9DvraN92mmWwNJsuV8Fgte4B&key=edf7b330332cad58ddcbc04**********766e5103b4e52c&account=0.1
     */
    public function sendv2()
    {
        $to = $this->request->get('to');
        $account = (float)$this->request->get('account');
        $key = $this->request->get('key');
        $message = $this->request->get('message',null);
//        $message='8787878787878787878787';
        if ($message){
            $message=strToUtf8($message);
        }

//        return json($message);
        $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $signServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $explorer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer, $signServer, $explorer,$key);
        //Balance  查询TRX余额
        $fromaddress=self::getAddressv($key);

        $ret=$tron->sendTrxMessage($to, $account, $message, $fromaddress->address);
        return json(['code'=>1,'data'=>$ret,'msg'=>'操作成功','time'=>time()]);
        //{"result":true,"txid":"72aafccbb9ba4595a3c2d5ec8fd292f6121cde1c424895148b74145dda8574fa","visible":false,"txID":"72aafccbb9ba4595a3c2d5ec8fd292f6121cde1c424895148b74145dda8574fa","raw_data":{"contract":[{"parameter":{"value":{"amount":1000000,"owner_address":"41bfb14932a54572576b7afce2362aaa61b73fe52c","to_address":"41ad9f1cae0fdef98446b7aae9502ff3626c96732d"},"type_url":"type.googleapis.com\/protocol.TransferContract"},"type":"TransferContract"}],"ref_block_bytes":"69bb","ref_block_hash":"2ac135d43ba624e8","expiration":1649777049000,"timestamp":1649776992092},"raw_data_hex":"0a0269bb22082ac135d43ba624e840a8fbfff281305a67080112630a2d747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e5472616e73666572436f6e747261637412320a1541bfb14932a54572576b7afce2362aaa61b73fe52c121541ad9f1cae0fdef98446b7aae9502ff3626c96732d18c0843d70dcbefcf28130","signature":["51810c5ee788ed5572f3fedb20630e0a04c8debfbaa7a9ed2c5e3185ce5f8a5f40999dc58557d0ae0e1a60a20e5d9774f51337bfdf03623d88e2d8ca5613eaf201"]}
    }

    /**
     * 根据私钥获取地址
     * $privateKey 私 钥
     */
    private function getAddressv($key)
    {
        $api = new \Tron\Api(new Client(['base_uri' => $this->uri]));
        $TRC20 = new \Tron\TRC20($api, $this->config);
        /*私钥地址*/
        $privateKeyToAddress = $TRC20->privateKeyToAddress($key);
        return $privateKeyToAddress;
    }

    /*转账失败*/
    /*
    {
        "code": 0,
        "msg": "class org.tron.core.exception.ContractValidateException : Validate TransferContract error, balance is not sufficient.",
        "data": null,
        "time": 1652664933
    }

    */


    /*转账成功*/
    /*{
        "code": 1,
        "data": {
        "result": true,
        "txid": "3189f91d061beddf1f1e3b829768ea2a08cf94c644255f696105587c9fc252b9",
        "visible": false,
        "txID": "3189f91d061beddf1f1e3b829768ea2a08cf94c644255f696105587c9fc252b9",
        "raw_data": {
        "contract": [
        {
        "parameter": {
        "value": {
        "amount": 1100000,
        "owner_address": "41f5fbe5e8725957174014dca1dc4fed54e970a2f8",
        "to_address": "41d46b2c182e2248b98429a384b7cd35616b7e4346"
        },
        "type_url": "type.googleapis.com/protocol.TransferContract"
                            },
                            "type": "TransferContract"
                        }
                    ],
                    "ref_block_bytes": "1723",
                    "ref_block_hash": "f87ff939116fc43e",
                    "expiration": 1652664645000,
                    "timestamp": 1652664587529
                },
                "raw_data_hex": "0a0217232208f87ff939116fc43e4088ebf4d38c305a67080112630a2d747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e5472616e73666572436f6e747261637412320a1541f5fbe5e8725957174014dca1dc4fed54e970a2f8121541d46b2c182e2248b98429a384b7cd35616b7e434618e091437089aaf1d38c30",
                "signature": [
            "c7ead724b1d1cad63ed11f2fc86c62e9c1740022fe332ca7fc716819a13f9a377a64ef7c15629b17622dde77f22a35aa5ee22a669f37cc5e4b985eacfcc38b3d00"
        ]
        },
        "msg": "查询成功",
        "time": 1652664587
    }
    */


    /**
     * @return \think\response\Json
     * @throws \IEXBase\TronAPI\Exception\TronException
     * 查询订单
     * http://trx.thinkgin.cn/api/trx/getTransaction?txID=3189f91d061beddf1f1e3b829768ea2a08cf94c644255f696105587c9fc252b9
     */
    public function getTransaction(){
        $txID = $this->request->get('txID');
        $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $signServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $explorer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer, $signServer, $explorer);
        $ret=$tron->getTransaction($txID);
        return json(['code'=>1,'data'=>$ret,'msg'=>'查询成功','time'=>time()]);
    }
    /*
    {
        "code": 1,
        "data": {
            "ret": [
                {
                    "contractRet": "SUCCESS"
                }
            ],
            "signature": [
                "c7ead724b1d1cad63ed11f2fc86c62e9c1740022fe332ca7fc716819a13f9a377a64ef7c15629b17622dde77f22a35aa5ee22a669f37cc5e4b985eacfcc38b3d00"
            ],
            "txID": "3189f91d061beddf1f1e3b829768ea2a08cf94c644255f696105587c9fc252b9",
            "raw_data": {
                "contract": [
                    {
                        "parameter": {
                            "value": {
                                "amount": 1100000,
                                "owner_address": "41f5fbe5e8725957174014dca1dc4fed54e970a2f8",
                                "to_address": "41d46b2c182e2248b98429a384b7cd35616b7e4346"
                            },
                            "type_url": "type.googleapis.com/protocol.TransferContract"
                        },
                        "type": "TransferContract"
                    }
                ],
                "ref_block_bytes": "1723",
                "ref_block_hash": "f87ff939116fc43e",
                "expiration": 1652664645000,
                "timestamp": 1652664587529
            },
            "raw_data_hex": "0a0217232208f87ff939116fc43e4088ebf4d38c305a67080112630a2d747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e5472616e73666572436f6e747261637412320a1541f5fbe5e8725957174014dca1dc4fed54e970a2f8121541d46b2c182e2248b98429a384b7cd35616b7e434618e091437089aaf1d38c30"
        },
        "msg": "查询成功",
        "time": 1652665591
    }
    */
}