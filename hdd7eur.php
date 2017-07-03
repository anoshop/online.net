<?php


//=========================================Config info====================================================
$offerid = "728";         // 728:  7欧1t ，   774: 7欧ssd
$title = "Online-7o1t";  //微信通知标题
$desp = "Online 7o1t";     //微信通知内容
$key = 'SCU6641T52d189fd61c651c03ba188a41a2280a558c';  //方糖的微信通知的key，自己登录“http://sc.ftqq.com”申请




//=========================================main selection====================================================
$cmd ="curl 'https://console.online.net/en/order/server_limited' -H 'Pragma: no-cache' -H 'Origin: https://www.online.net' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: en-US,en;q=0.8,zh-CN;q=0.6,zh;q=0.4,zh-TW;q=0.2,ja;q=0.2,fr;q=0.2' -H 'Upgrade-Insecure-Requests: 1' -H 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36' -H 'Content-Type: application/x-www-form-urlencoded' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Cache-Control: no-cache' -H 'Referer: https://www.online.net/en/summer-2017/sales' -H 'Cookie: PHPSESSID-1=s602745rfibh2929tf6jh5o251; SERVERID=web-dc2; _pk_ref.2.3d3d=%5B%22%22%2C%22%22%2C1498936258%2C%22https%3A%2F%2Fwww.online.net%2Fen%2Fsummer-2017%2Fsales%22%5D; _pk_id.2.3d3d=20af576204479f2c.1491289136.47.1498936272.1498936258.; _gat_onlineTracker=1; _ga=GA1.2.1668319752.1490860501; _gid=GA1.2.1443765524.1498924054' -H 'Connection: keep-alive' --data 'server_offer=$offerid' --compressed";


$data = shell_exec($cmd);
if ( strpos($data,"unavailable")) {
    echo "sold out";
    // sc_send ("没货",$desp,$key);
}
else
{

    echo "Yoho";
    sc_send ($title,$desp,$key);
}





//=========================================function ====================================================

function sc_send($text, $desp = '', $key ="") {
    $postdata = http_build_query(
    array('text' => $text, 'desp' => $desp));
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    $context = stream_context_create($opts);
    return $result = file_get_contents('http://sc.ftqq.com/'.$key.'.send', false, $context);
}




