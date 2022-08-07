<?php
/**
 * Date: 2022/7/31
 * Time: 08:50
 * 源码获取=>纸飞机(Telegram):@laowu2021
 */

namespace app\api\controller;


include_once VENDOR_PATH . 'autoload.php';

class Trc10 extends Controller
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
            'contract_address' => 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',// USDT TRC20
            'decimals' => 6, /*精度*/
        ];
    }


    //http://www.xxx.cn/api/trc10/findbalance
    public function findbalance()
    {
        $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $signServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $explorer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $privateKey = "8fb5bcf216e7d30c2a*****5bac7e35958309224a8cdeeb40e1fa5e95b34222c";

        try {
            $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer, $signServer, $explorer, $privateKey);
        } catch (\IEXBase\TronAPI\Exception\TronException $e) {
            exit($e->getMessage());
        }
        $tron->setAddress('TGDsEr2cSRC98Zo9WnwNDik2Y5rdboPRvd');
        $getBalance = $tron->getBalance(null, true);

        $getTokenBalance = $tron->getTokenBalance('1002992', 'TGDsEr2cSRC98Zo9WnwNDik2Y5rdboPRvd');

        $getTokenByID = $tron->getTokenByID('1002992');
        $generateAddress = $tron->generateAddress();

        return json(compact('getBalance', 'getTokenBalance', 'getTokenByID', 'generateAddress'));
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

    /**
     * @return \think\response\Json
     * @throws \IEXBase\TronAPI\Exception\TronException
     * TRC10转账
     */
    //http://www.xxx.cn/api/trc10/send?amount=1&address=TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny&key=8fb5bcf216e7d30c2a14ecf****7e35958309224a8cdeeb40e1fa5e95b34111c
    public function send()
    {
        $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $signServer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);
        $explorer = new \IEXBase\TronAPI\Provider\HttpProvider($this->uri);

        $tokenid = $this->request->get("tokenid", '1002992');
        $privateKey = $this->request->get("key", '');
        $amount = $this->request->get("amount", 1);
        $address=$this->request->get("address", 'TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny');;
        $fromaddress=self::getAddressv($privateKey);

        try {
            $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer, $signServer, $explorer, $privateKey);
        } catch (\IEXBase\TronAPI\Exception\TronException $e) {
            exit($e->getMessage());
        }

        $sendToken = $tron->sendToken($address, $amount, $tokenid, $fromaddress->address);

        if (isset($sendToken['code'])) {
            /*失败*/
            return json(['code'=>0,'data'=>$sendToken,'msg'=>'转账失败','time'=>time()]);
        } else {
            if (isset($sendToken['result']) && $sendToken['result'] == true) {
                /*成功*/
                return json(['code'=>1,'data'=>$sendToken,'msg'=>'转账成功','time'=>time()]);
            } else {
                /*失败*/
                return json(['code'=>0,'data'=>$sendToken,'msg'=>'转账失败','time'=>time()]);
            }
        }

    }

    /*
    {
        "code": 0,
        "msg": "class org.tron.core.exception.ContractValidateException : assetBalance is not sufficient.",
        "data": null,
        "time": 1652023715
    }
    
    {
        "result":true,
        "txid":"11e08c92b5e6af00e41570498b405b5f8556c7105b71886909f9634b48a0c4b1",
        "visible":false,
        "txID":"11e08c92b5e6af00e41570498b405b5f8556c7105b71886909f9634b48a0c4b1",
        "raw_data":{
            "contract":[
                {
                    "parameter":{
                        "value":{
                            "amount":1,
                            "asset_name":"31303032393932",
                            "owner_address":"4144967f55976c06c4fb55b2e310843c25105ba78d",
                            "to_address":"41f5fbe5e8725957174014dca1dc4fed54e970a2f8"
                        },
                        "type_url":"type.googleapis.com/protocol.TransferAssetContract"
                    },
                    "type":"TransferAssetContract"
                }
            ],
            "ref_block_bytes":"ce25",
            "ref_block_hash":"44f2a920d4f0b0ca",
            "expiration":1652018178000,
            "timestamp":1652018121278
        },
        "raw_data_hex":"0a02ce25220844f2a920d4f0b0ca40d0cfd39f8a305a730802126f0a32747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e5472616e736665724173736574436f6e747261637412390a073130303239393212154144967f55976c06c4fb55b2e310843c25105ba78d1a1541f5fbe5e8725957174014dca1dc4fed54e970a2f8200170be94d09f8a30",
        "signature":[
            "8689b0c36ba04e08d09b1bfcb38d62cd39b2e2879f525677857ddb3fbf3362b7d3b87da37400df5d390e1e3342c934f59a046f0d2af374b55ad88dff3d4f2eee00"
        ]
    }
    */
}