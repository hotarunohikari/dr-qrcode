<?php
/**
 * author : hotarunohikari
 */

namespace dr\qrcode;

use dr\file\DrFile;
use QRcode;
use think\Exception;

class DrQRcode
{

    /**
     * description : 二维码图片生成函数
     *
     * @param $content 图片中要存储的内容
     * @param $path 图片存放路径
     * @return string 图片存储的路径和名称
     * @throws Exception
     */
    static function png($content, $path) {
        // 引入phpqrcode类
        include_once './phpqrcode.php';
        // 路径生成
        $path = DrFile::drMkdirByDate($path);
        // 图片生成
        $filePath = $path . DrFile::drMakeName() . '.png';
        QRcode::png($content, $filePath);
        if (is_file($filePath)) {
            return "/" . $filePath;
        } else {
            throw new Exception("二维码生成失败");
        }

    }

}