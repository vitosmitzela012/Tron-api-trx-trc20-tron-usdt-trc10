<?php
/**
 * Date: 2022/7/31
 * Time: 08:50
 * 源码获取=>纸飞机(Telegram):@laowu2021
 */

namespace app\api\controller;

class Tool extends Controller
{

    /**
     * @return \think\response\Json
     * 助记词转私钥
     * POST
     */
    public function mnemonic2trx(){
        $mnemonic=$this->request->param("mnemonic",'');
        if (!$mnemonic){
            return json(['code' => 0, 'msg' => '助记词不能为空', 'data' => '']);
        }
        $mnemonic='card ******* cliff **** proud junk ****** fine riot defy test *****';
//        return json(self::totrx($mnemonic));
        return json(['code' => 1, 'msg' => '转换成功', 'data' => self::totrx($mnemonic)]);
    }

    /**
     * 传入助记词获取转换后的TRX信息
     * @param string $mnemonic 助记词
     * @return array
     */
    protected function totrx($mnemonic)
    {
        if (empty($mnemonic)) {
            return [];
        }
//        require_once 'tron_utils.php';
        $seedGenerator = new Bip39SeedGenerator();
        // 通过助记词生成种子，传入可选加密串'hello'
        $seed = $seedGenerator->getSeed($mnemonic);
        $hdFactory = new HierarchicalKeyFactory();
        $master = $hdFactory->fromEntropy($seed);

        $util = new Util();
        // 设置路径account 195是波场的路径
        $hardened = $master->derivePath("44'/195'/0'/0/0");
        //私钥
        $privateKey = $hardened->getPrivateKey()->getHex();
        //地址结果
        $res = $util->publicKeyToAddress($util->privateKeyToPublicKey($hardened->getPrivateKey()->getHex()));
        //替换$address开头两位为0x
        $address_hx = substr_replace($res, '41', 0, 2);
        //得出address_58地址
        $address_58 = hexString2Base58check($address_hx);
        $data = [
            'trx' => $address_58,
            'trx_key' => $privateKey,
        ];
        return $data;
    }

}