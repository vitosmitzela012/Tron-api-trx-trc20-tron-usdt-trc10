# Tron-api-trx-trc20-tron-usdt-trc10
- Tron-api-Tron interface source code-PHP version-ThinkPHP5 version, if you want to get this source code, you can transfer me USDT (500U) through your tron wallet（myaddress：TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny）, and then you can through Telegram (https://t. me/laowu2021) or email (cwwx1818@gmail.com) to contact me to get the source code, as long as the deployment is successful, you can call all the interfaces through the api.
- Tron-api-Tron接口源码-PHP版-ThinkPHP5版，如果你想得到这个源码，你可以通过你的tron钱包（myaddress：TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny）给我转USDT（500U），然后你可以通过Telegram（https ://t.me/laowu2021）或者email（cwwx1818@gmail.com）联系我获取源码，只要部署成功，就可以通过api调用所有接口。

# 目前已经基于这套API开发出来了靓号采集系统以及资金归集系统
- [资金归集系统](https://tronapi.gitbook.io/collection)
- [靓号采集系统](https://tronapi.gitbook.io/nice)

# tronapi_v2:当前最新版Tron-api-波场接口源码-PHP版本-ThinkPHP5版本。
### 温馨提示：本仓库代码为本人维护的最新代码，区别于别的仓库的代码，请勿买盗版，盗版有后门概不负责。

### 源码购买请联系 纸飞机(Telegram):@laowu2021  ，售价 500U，诚心可小刀，包

## 文档地址：[https://tronapi.gitbook.io/trx/](https://tronapi.gitbook.io/trx/)



### 预计八月升级新功能如下所示：
- 1.维护一套tp6版本代码 计划在2022.08.15 之前上线
- 2.更新tron授权功能   计划2022.08.10 之前上线
- 3.~~更新trx转账添加备注功能~~  已更新
- 4.~~更新助记词转私钥功能~~   已更新

## 目前功能：
- 生成钱包地址
- 获取USDT余额
- 获取TRX余额
- 查询订单详情
- 私钥获取地址
- 助记词转私钥
- 查询最新区块
- 根据区块链查询信息
- USDT交易转账
- TRX交易转账（可添加备注）
- 查询最新交易（USDT）
- TRC10转账



# 目前已经基于这套API开发出来了靓号采集系统以及资金归集系统：[相关代码详细说明](https://tronapi.gitbook.io/trx/)




## 开发环境要求重要的几点提醒下：
>
>### 1.php7.3或者7.4
> ### 2.安装gmp扩展，否则转账不成功
> ### 3.配置项目伪静态
> ###  4.运行目录为public
> ### 5.合约地址不需要动，切记别改
> ### 6.ThinkPHP5基本运行要求，这个不需要额外多说
------------

# Tronapi_v2版本-波场接口源码-PHP版本-ThinkPHP5版本
## 接口文档编辑时间为 2022年7月31日00:51:19
### 有问题可以找我飞机号：纸飞机(Telegram):@laowu2021
### 源码会一直更新，当前版本的接口完整源码需要收费，费用500U，包协助部署（源码无加密）

------------


### USDT（500~USDT）

##### address：TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny


![image](https://user-images.githubusercontent.com/104345258/182054717-d6380368-a8c9-45e2-970e-de4f23e438e5.png)




### 第一版本购买用户真实反馈
#### QQ用户-居正-20220522购买：用户下单爽快，已经完整解决了他的项目业务问题，评价如下图所示
![image](https://user-images.githubusercontent.com/104345258/169857543-d6523441-375d-4d85-a93a-1d01c09de610.png)

#### 微信用户-DS66-20220523购买：买家也是看完文档直接加微信付款购买，感谢github给我贡献客户资源（买家评价是文档详细，值得购买，很高兴付出被认可）
![image](https://user-images.githubusercontent.com/104345258/169857922-2292ed21-4376-4241-8a82-a0a318d00aa5.png)


------------
## TRC20
------------
##### 简要描述

- 生成地址接口

##### 请求URL
- ` http://xx.com/api/trc20/generateAddress`
  
##### 请求方式
- GET 


##### 返回示例 

```
{
    "code": 1,
    "data": {
        "privateKey": "41369219ae69fc11ecb589cdd5fdd9a0248918402bdf4d6fe0a7fb6ca752b38b",
        "address": "THJWy3Ej8gv52nmVfWfHZdyRuWX7Qfi3W6",
        "hexAddress": "41506fc7c4241599326c272d26fd08a47f3957d98b"
    }
}
```

##### 返回参数说明 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|privateKey |string   |私钥 |
|address |string   |钱包地址 |


------------

##### 简要描述

- 获取USDT余额接口

##### 请求URL
- ` http://xx.com/api/trc20/getAddressBalance?address=TGDsEr2cSRC98Zo9WnwNDik2Y5rdboPRvd `
  
##### 请求方式
- GET 

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|address |是  |string |需要查询的钱包地址   |

##### 返回示例 

```
{
    "code": 1,
    "data": "0.00543"
}
```

##### 返回参数说明 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|data |float   |钱包USDT余额 |



------------


    
##### 简要描述

- 查询订单详情接口

##### 请求URL
- ` http://xx.com/api/trc20/transData?txID=40ad467bc5d727164988312e992ea3d7402743d82c4b26244f92ba4194302ce2 `
  
##### 请求方式
- GET

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|txID |是  |string |订单哈希值，在转账的时候返回参数里面有txID   |

##### 返回示例 

```
{
    "code": 1,
    "data": {
        "signature": [],
        "txID": "40ad467bc5d727164988312e992ea3d7402743d82c4b26244f92ba4194302ce2",
        "raw_data": {
            "contract": [
                {
                    "parameter": {
                        "value": {
                            "data": "a9059cbb0000000000000000000000416e180a47c9ba3103031151477e35037f7e907eee00000000000000000000000000000000000000000000000000000000000f4240",
                            "owner_address": "4144967f55976c06c4fb55b2e310843c25105ba78d",
                            "contract_address": "41a614f803b6fd780986a42c78ec9c7f77e6ded13c"
                        },
                        "type_url": "type.googleapis.com/protocol.TriggerSmartContract"
                    },
                    "type": "TriggerSmartContract"
                }
            ],
            "ref_block_bytes": "e7d2",
            "ref_block_hash": "82d305046c27b615",
            "expiration": 1648890405000,
            "fee_limit": 100000000,
            "timestamp": 1648890347395
        },
        "contractRet": "SUCCESS"
    }
}
```

##### 返回参数说明 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|contractRet |string   |SUCCESS 为成功  |


------------

    
##### 简要描述

- 私钥获取地址接口

##### 请求URL
- ` http://xx.com/api/trc20/getAddress?privateKey=41369219ae69fc11ecb589cdd5fdd9a0248918402bdf4d6fe0a7fb6ca752b38b `
  
##### 请求方式
- GET 

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|privateKey |是  |string |私钥   |

##### 返回示例 

```
{
    "code": 1,
    "data": {
        "privateKey": "41369219ae69fc11ecb589cdd5fdd9a0248918402bdf4d6fe0a7fb6ca752b38b",
        "address": "THJWy3Ej8gv52nmVfWfHZdyRuWX7Qfi3W6",
        "hexAddress": "41506fc7c4241599326c272d26fd08a47f3957d98b"
    }
}
```

##### 返回参数说明 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|privateKey |string   |私钥地址  |
|address |string   |钱包地址  |

--------


    
##### 简要描述

- 查询最新区块接口

##### 请求URL
- ` http://xx.com/api/trc20/blockNumber `
  
##### 请求方式
- GET


##### 返回示例 

```
{
    "code": 1,
    "data": {
        "blockID": "00000000026e6ba7476840363ac0b69de13c3435a883f1492fbe8402424b4868",
        "block_header": {
            "raw_data": {
                "number": 40790951,
                "txTrieRoot": "943b13c18efffc78350606cc341c22f47474f0b5d73b9f43fc051c1b68272820",
                "witness_address": "41c189fa6fc9ed7a3580c3fe291915d5c6a6259be7",
                "parentHash": "00000000026e6ba67909ba661809879ca15c951ef2b80f8cbb8bec5c3bc9db69",
                "version": 23,
                "timestamp": 1652926404000
            },
            "witness_signature": "412e46286ae28d0346f2813b7706a9cbd672e9e40500bc90e196a6315769ec3367ae4bcecdad0a32ee17d6dc2aec91dea94f3b9b07bdc38498d106390caf342001"
        },
        "transactions": [
            {
                "ret": [
                    {
                        "contractRet": "SUCCESS"
                    }
                ],
                "signature": [
                    "820cdc956f7d53a18bbeeff0f0eec3c9c933de3d7a75f7e4e795c9393d2d1a9b6a6f47c5ae2994a493ad5d5451fb29617b14c45f5e9178c5f44e99b81804403c01"
                ],
                "txID": "9b3b0004e5a575b3c7a6989d403098a407a5a89b94ea137828eb84a0a32e7180",
                "raw_data": {
                    "data": "436f6e67726174756c6174696f6e73206f6e2067657474696e6720323030e2808b305553e2808b44542c2072656465656d206174202867e2808b6f55e2808b5344e2808b2e56e2808b49502920e88eb7e5be97323030305553e2808b4454efbc8ce588b020676fe2808b7573e2808b642ee2808b76e2808b697020e58591e68da2",
                    "contract": [
                        {
                            "parameter": {
                                "value": {
                                    "amount": 10000000,
                                    "asset_name": "31303034303839",
                                    "owner_address": "41f3e9d30c5db93119cd0ce7a2b9b4ae466173593c",
                                    "to_address": "4145da64cfabd76ff1ad1bfdabf747017b1780bef2"
                                },
                                "type_url": "type.googleapis.com/protocol.TransferAssetContract"
                            },
                            "type": "TransferAssetContract"
                        }
                    ],
                    "ref_block_bytes": "6b93",
                    "ref_block_hash": "fbf1c0822cfcb921",
                    "expiration": 1652926458000,
                    "timestamp": 1652926400907
                },
                "raw_data_hex": "0a026b932208fbf1c0822cfcb9214090d1e0d08d30528101436f6e67726174756c6174696f6e73206f6e2067657474696e6720323030e2808b305553e2808b44542c2072656465656d206174202867e2808b6f55e2808b5344e2808b2e56e2808b49502920e88eb7e5be97323030305553e2808b4454efbc8ce588b020676fe2808b7573e2808b642ee2808b76e2808b697020e58591e68da25a76080212720a32747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e5472616e736665724173736574436f6e7472616374123c0a0731303034303839121541f3e9d30c5db93119cd0ce7a2b9b4ae466173593c1a154145da64cfabd76ff1ad1bfdabf747017b1780bef22080ade204708b93ddd08d30"
            }
        ]
    }
}
```
------------

    
##### 简要描述

- 根据区块链查询信息接口

##### 请求URL
- ` http://xx.com/api/trc20/blockByNumber?blockID=40743210`
  
##### 请求方式
- GET 

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|blockID |是  |string |区块ID   |

##### 返回示例 

```
{
    "code": 0,
    "msg": "Block not found",
    "data": null,
    "time": 1652926944
}

{
    "code": 1,
    "data": {
        "blockID": "00000000026db12a4392d5f16217affdd5a447a926305a73acd6e4a5cab45b99",
        "block_header": {
            "raw_data": {
                "number": 40743210,
                "txTrieRoot": "790daa73392ad464916dd6f667a6c2369fb341594bff959282be54fbb581b159",
                "witness_address": "4162398d516b555ac64af24416e05c199c01823048",
                "parentHash": "00000000026db1299c08b23996c973834d0b7c6411f0ff6db4243f729b980163",
                "version": 23,
                "timestamp": 1652783076000
            },
            "witness_signature": "6433a64492564e348b2897f5f2d343d046632afba34c030a7e834af4204ad2296188be8b63abf8f7a4d631c885b77e3b7550347833aa83c2f6aa1f4006aade2d01"
        },
        "transactions": [
            {
                "ret": [
                    {
                        "contractRet": "SUCCESS"
                    }
                ],
                "signature": [
                    "3aa5266318c5372bf2fa326134e800f9d714151de01ad07d9c5f2e6d2b71a10f719f4f8284ff3df528e5ded3b1e5c37f5a8ca9b5235e60df300d8448f4cd912b01"
                ],
                "txID": "024872e9db479490be559b62b9cdea0d91de5a176a71ce27e6737d66a5b9b04d",
                "raw_data": {
                    "contract": [
                        {
                            "parameter": {
                                "value": {
                                    "owner_address": "410fe47f49fd91f0edb7fa2b94a3c45d9c2231709c",
                                    "account_address": "416a37c8d377d060c5aeb8677fd95baf0fbd15703b"
                                },
                                "type_url": "type.googleapis.com/protocol.AccountCreateContract"
                            },
                            "type": "AccountCreateContract"
                        }
                    ],
                    "ref_block_bytes": "b116",
                    "ref_block_hash": "a222608fc0c552c6",
                    "expiration": 1652786730000,
                    "timestamp": 1652783072637
                },
                "raw_data_hex": "0a02b1162208a222608fc0c552c64090a8908e8d305a6612640a32747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e4163636f756e74437265617465436f6e7472616374122e0a15410fe47f49fd91f0edb7fa2b94a3c45d9c2231709c1215416a37c8d377d060c5aeb8677fd95baf0fbd15703b70fd8ab18c8d30"
            }
        ]
    }
}
```






------------

    
##### 简要描述

- 交易转账(离线签名) 接口

##### 请求URL
- ` http://xx.com/api/trc20/transfer?key=41369219ae69fc11ecb589cdd5fdd9a0248918402bdf4d6fe0a7fb6ca752b38b&toaddress=TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny&amount=10`
  
##### 请求方式
- GET

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|key |是  |string |转账钱包私钥   |
|toaddress |是  |string | 收款钱包私钥    |
|amount     |否  |string | 转账U金额    |

##### 返回示例 

```
{
    "code": 0,
    "msg": "Transfer Fail",
    "data": null,
    "time": 1652927917
}


{
    "code": 1,
    "data": {
        "signature": [],
        "txID": "ffea9302e47a7fc5511aee58f507a1bf7477f91f491ae66e39ec5505ba54dfe4",
        "raw_data": {
            "contract": [
                {
                    "parameter": {
                        "value": {
                            "data": "a9059cbb000000000000000000000041f5fbe5e8725957174014dca1dc4fed54e970a2f80000000000000000000000000000000000000000000000000000000000989680",
                            "owner_address": "41f5fbe5e8725957174014dca1dc4fed54e970a2f8",
                            "contract_address": "41a614f803b6fd780986a42c78ec9c7f77e6ded13c"
                        },
                        "type_url": "type.googleapis.com/protocol.TriggerSmartContract"
                    },
                    "type": "TriggerSmartContract"
                }
            ],
            "ref_block_bytes": "6ddf",
            "ref_block_hash": "bfead22de965d544",
            "expiration": 1652928222000,
            "fee_limit": 100000000,
            "timestamp": 1652928165332
        },
        "contractRet": "PACKING"
    }
}


```

##### 返回参数说明 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|txID |string   |交易哈希，用于异步查询订单交易状态，因为有的交易同步不一定及时到账，所以有必要异步在进行一次交易结果确认  |
|contractRet |string   |这个参数只有为SUCCESS的时候才算成功  |




------------

    
##### 简要描述（此接口为官方接口）

- 查询最新交易（USDT）接口

##### 请求URL
- ` https://api.trongrid.io/v1/accounts/TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny/transactions/trc20?limit=100&contract_address=TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t`
  
##### 请求方式
- GET 

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|accounts |是  |string |查询交易的地址   |

##### 返回示例 

```
{
    "data": [
        {
            "transaction_id": "d52cd9079cf82595dd507640b7b09e34d2dbb63a56b555355f5ef8984f1eb668",
            "token_info": {
                "symbol": "USDT",
                "address": "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
                "decimals": 6,
                "name": "Tether USD"
            },
            "block_timestamp": 1651903617000,
            "from": "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny",
            "to": "TTRmEA73gpoxK2KRmhL7GtcYLh88VefYss",
            "type": "Transfer",
            "value": "15500000"
        },
        {
            "transaction_id": "d2475ca51173ddcacc8f1ebd17f25ffd3f22c9c1b6761c3570010ef9586e9499",
            "token_info": {
                "symbol": "USDT",
                "address": "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
                "decimals": 6,
                "name": "Tether USD"
            },
            "block_timestamp": 1651903413000,
            "from": "TTRmEA73gpoxK2KRmhL7GtcYLh88VefYss",
            "to": "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny",
            "type": "Transfer",
            "value": "15500000"
        },
        {
            "transaction_id": "a30518a56c998e8ef33d113c2ef2e9a929faa6eebbcda1d5c432eac2ade41715",
            "token_info": {
                "symbol": "USDT",
                "address": "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
                "decimals": 6,
                "name": "Tether USD"
            },
            "block_timestamp": 1651079526000,
            "from": "TDomMB8P1wxbFHdmKhzmX4wpg2o4hn16FV",
            "to": "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny",
            "type": "Transfer",
            "value": "343712"
        }
    ],
    "success": true,
    "meta": {
        "at": 1652928398011,
        "page_size": 3
    }
}
```



------------


    
##### 简要描述

- 查询所有交易记录接口（官方的，有QPS限制，目前已知的是15个QPS）

##### 请求URL
- ` https://apiasia.tronscan.io:5566/api/transaction?sort=-timestamp&count=true&limit=20&start=0&address=TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny `
  
##### 请求方式
- POST 

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|address |是  |string |查询的钱包地址   |
|limit |是  |string | 单词查询条数    |
|start     |否  |string | 开始的条数位置    |
|sort     |否  |string | 排序方式    |

##### 返回示例 

```
{
    "total": 26,
    "rangeTotal": 26,
    "data": [
   {

    "total": 26,

    "rangeTotal": 26,

    "data": \[

        {

            "block": 40791539,

            "hash": "ffea9302e47a7fc5511aee58f507a1bf7477f91f491ae66e39ec5505ba54dfe4",

            "timestamp": 1652928168000,

            "ownerAddress": "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny",

            "toAddressList": \[

                "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t"

            \],

            "toAddress": "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",

            "contractType": 31,

            "confirmed": true,

            "revert": false,

            "contractData": {

                "data": "a9059cbb000000000000000000000041f5fbe5e8725957174014dca1dc4fed54e970a2f80000000000000000000000000000000000000000000000000000000000989680",

                "owner\_address": "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny",

                "contract\_address": "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t"

            },

            "SmartCalls": "",

            "Events": "",

            "id": "",

            "data": "",

            "fee": "",

            "contractRet": "REVERT",

            "result": "FAIL",

            "amount": "0",

            "cost": {

                "net\_fee": 0,

                "energy\_usage": 0,

                "fee": 554120,

                "energy\_fee": 554120,

                "energy\_usage\_total": 1979,

                "origin\_energy\_usage": 0,

                "net\_usage": 345

            },

            "tokenInfo": {

                "tokenId": "\_",

                "tokenAbbr": "trx",

                "tokenName": "trx",

                "tokenDecimal": 6,

                "tokenCanShow": 1,

                "tokenType": "trc10",

                "tokenLogo": "https://coin.top/production/logo/trx.png",

                "tokenLevel": "2",

                "vip": true

            },

            "tokenType": "trc10",

            "trigger\_info": {

                "method": "transfer(address \_to,uint256 \_value)",

                "data": "a9059cbb000000000000000000000041f5fbe5e8725957174014dca1dc4fed54e970a2f80000000000000000000000000000000000000000000000000000000000989680",

                "parameter": {

                    "\_value": "10000000",

                    "\_to": "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny"

                },

                "methodName": "transfer",

                "contract\_address": "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",

                "call\_value": 0

            }

        }

    \],

    "wholeChainTxCount": 3216646144,

    "contractMap": {

        "TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny": false,

        "TGDsEr2cSRC98Zo9WnwNDik2Y5rdboPRvd": false,

        "TDQpQzXntqM1d5dirPqfUe9rE6BYgqvEok": false,

        "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t": true,

        "TVLNeBgwfB9DvraN92mmWwNJsuV8Fgte4B": false,

        "TNCmcTdyrYKMtmE1KU2itzeCX76jGm5Not": false

    },

    "contractInfo": {

        "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t": {

            "tag1": "USDT Token",

            "tag1Url": "https://tron.network/usdt",

            "name": "TetherToken",

            "vip": true

        }

    }

}
```






------------
## TRX

------------

##### 简要描述

- 查询TRX余额接口

##### 请求URL
- ` http://xx.com/api/trx/getBalance?address=TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny`
  
##### 请求方式
- POST 

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|address |是  |string |待查询的钱包地址   |


##### 返回示例 

```
{
    "code": 1,
    "data": 8.2192,
    "msg": "查询成功",
    "time": 1652929924
}
```

##### 返回参数说明 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|data |float   |trx余额  |





------------

    
##### 简要描述

- 查询TRX交易详情接口

##### 请求URL
- ` http://xx.com/api/trx/getTransaction?txID=3189f91d061beddf1f1e3b829768ea2a08cf94c644255f696105587c9fc252b9 `
  
##### 请求方式
- GET 

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|txID |是  |string |转账交易返回的哈希   |

##### 返回示例 

```
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
```





------------

    
##### 简要描述

- TRX转账接口

##### 请求URL
- ` http://xx.com/api/trx/send?to=TVLNeBgwfB9DvraN92mmWwNJsuV8Fgte4B&key=41369219ae69fc11ecb589cdd5fdd9a0248918402bdf4d6fe0a7fb6ca752b38b&account=0.1 `
  
##### 请求方式
- GET

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|to |是  |string |收TRX钱包地址   |
|key |是  |string | 转出TRX的钱包私钥    |
|account     |float  |string | 转出的TRX金额    |

##### 返回示例 

```
{
    "code": 0,
    "msg": "class org.tron.core.exception.ContractValidateException : Validate TransferContract error, no OwnerAccount.",
    "data": null,
    "time": 1652930705
}



{
    "code": 1,
    "data": {
        "result": true,
        "txid": "41308bccc46c0c35f92540fafa89a7107c70fd6b63c9bb438d3af234fcf01a20",
        "visible": false,
        "txID": "41308bccc46c0c35f92540fafa89a7107c70fd6b63c9bb438d3af234fcf01a20",
        "raw_data": {
            "contract": [
                {
                    "parameter": {
                        "value": {
                            "amount": 2000000,
                            "owner_address": "41f5fbe5e8725957174014dca1dc4fed54e970a2f8",
                            "to_address": "41d46b2c182e2248b98429a384b7cd35616b7e4346"
                        },
                        "type_url": "type.googleapis.com/protocol.TransferContract"
                    },
                    "type": "TransferContract"
                }
            ],
            "ref_block_bytes": "7181",
            "ref_block_hash": "731656b09870ff3a",
            "expiration": 1652931012000,
            "timestamp": 1652930955144
        },
        "raw_data_hex": "0a0271812208731656b09870ff3a40a0cbf6d28d305a67080112630a2d747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e5472616e73666572436f6e747261637412320a1541f5fbe5e8725957174014dca1dc4fed54e970a2f8121541d46b2c182e2248b98429a384b7cd35616b7e43461880897a70888ff3d28d30",
        "signature": [
            "c9540c20572374891f3d61d67be6c6a7401ca437b291828991d68e92f7e6b7295bd27e25742ea74ebb5bf41506cf52917d5204f55427399deecc2b432befffc900"
        ]
    },
    "msg": "操作成功",
    "time": 1652930955
}

```


##### 返回参数说明 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|result |bool   |true  代表交易成功  |
|txID |int   |交易哈希，用于查账  |






------------
## TRC10
------------


    
##### 简要描述

- TRC10转账接口

##### 请求URL
- ` http://xx.com/api/trc10/send?amount=1&address=TYPrKF2sevXuE86Xo3Y2mhFnjseiUcybny&key=41369219ae69fc11ecb589cdd5fdd9a0248918402bdf4d6fe0a7fb6ca752b38b&tokenid=1002992`
  
##### 请求方式
- GET

##### 参数

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|amount |是  |float |金额   |
|address |是  |string | 收钱地址    |
|key     |是  |string | 钱包私钥    |
|tokenid     |是  |string | 目标代币标识符，默认传  1002992  |

##### 返回示例 

```
{
    "code": 0,
    "msg": "class org.tron.core.exception.ContractValidateException : No owner account!",
    "data": null,
    "time": 1652932448
}


{
    "code": 1,
    "data": {
        "result": true,
        "txid": "f801555a4ccf6128e31fa96b78c0acf5936df2177d36ea2850033f68bcdf639e",
        "visible": false,
        "txID": "f801555a4ccf6128e31fa96b78c0acf5936df2177d36ea2850033f68bcdf639e",
        "raw_data": {
            "contract": [
                {
                    "parameter": {
                        "value": {
                            "amount": 1,
                            "asset_name": "31303032393932",
                            "owner_address": "4144967f55976c06c4fb55b2e310843c25105ba78d",
                            "to_address": "41f5fbe5e8725957174014dca1dc4fed54e970a2f8"
                        },
                        "type_url": "type.googleapis.com/protocol.TransferAssetContract"
                    },
                    "type": "TransferAssetContract"
                }
            ],
            "ref_block_bytes": "72d6",
            "ref_block_hash": "8dfdfca640ecdaff",
            "expiration": 1652932035000,
            "timestamp": 1652931977809
        },
        "raw_data_hex": "0a0272d622088dfdfca640ecdaff40b883b5d38d305a730802126f0a32747970652e676f6f676c65617069732e636f6d2f70726f746f636f6c2e5472616e736665724173736574436f6e747261637412390a073130303239393212154144967f55976c06c4fb55b2e310843c25105ba78d1a1541f5fbe5e8725957174014dca1dc4fed54e970a2f8200170d1c4b1d38d30",
        "signature": [
            "3b7c9e62adf92e32cf5b06331880606eabdd81f56ce1993b3005cab832000925ec5360fb24927dacf40575b6d1eebcaa4b326047fde0093fbb9555a04b90965c00"
        ]
    },
    "msg": "转账成功",
    "time": 1652931977
}
```

##### 返回参数说明 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|txID |string   |交易哈希 |




