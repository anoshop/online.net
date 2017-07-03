




#English Desc

7eur plan  monitor  of the special deal of online summer-2017

Modify your info  in the .php file and put them onto the server .

after then, settup crontab jobs:

Crontab: 

```
* * * * * php  /root/hdd7eur.php
* * * * * php  /root/ssd7eur.php
````


#中文描述  -监控7欧特价套餐


修改两个php文件中国的配置信息
然后设置crontab的任务。

```
crontab -e
* * * * * php  /root/hdd7eur.php
* * * * * php  /root/ssd7eur.php

```
