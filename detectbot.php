<?php
    require '/var/www/html/vendor/autoload.php';
    use Jaybizzle\CrawlerDetect\CrawlerDetect;
    $google_bot_ip_ranges = array(
        "2001:4860:4801:10::/64",
        "2001:4860:4801:11::/64",
        "2001:4860:4801:12::/64",
        "2001:4860:4801:13::/64",
        "2001:4860:4801:14::/64",
        "2001:4860:4801:15::/64",
        "2001:4860:4801:16::/64",
        "2001:4860:4801:17::/64",
        "2001:4860:4801:18::/64",
        "2001:4860:4801:19::/64",
        "2001:4860:4801:1a::/64",
        "2001:4860:4801:1b::/64",
        "2001:4860:4801:1c::/64",
        "2001:4860:4801:1d::/64",
        "2001:4860:4801:1e::/64",
        "2001:4860:4801:1f::/64",
        "2001:4860:4801:20::/64",
        "2001:4860:4801:21::/64",
        "2001:4860:4801:22::/64",
        "2001:4860:4801:23::/64",
        "2001:4860:4801:24::/64",
        "2001:4860:4801:25::/64",
        "2001:4860:4801:26::/64",
        "2001:4860:4801:27::/64",
        "2001:4860:4801:28::/64",
        "2001:4860:4801:29::/64",
        "2001:4860:4801:2::/64",
        "2001:4860:4801:2a::/64",
        "2001:4860:4801:2b::/64",
        "2001:4860:4801:2c::/64",
        "2001:4860:4801:2d::/64",
        "2001:4860:4801:2e::/64",
        "2001:4860:4801:2f::/64",
        "2001:4860:4801:31::/64",
        "2001:4860:4801:32::/64",
        "2001:4860:4801:33::/64",
        "2001:4860:4801:34::/64",
        "2001:4860:4801:35::/64",
        "2001:4860:4801:36::/64",
        "2001:4860:4801:37::/64",
        "2001:4860:4801:38::/64",
        "2001:4860:4801:39::/64",
        "2001:4860:4801:3a::/64",
        "2001:4860:4801:3b::/64",
        "2001:4860:4801:3c::/64",
        "2001:4860:4801:3d::/64",
        "2001:4860:4801:3e::/64",
        "2001:4860:4801:40::/64",
        "2001:4860:4801:41::/64",
        "2001:4860:4801:42::/64",
        "2001:4860:4801:43::/64",
        "2001:4860:4801:44::/64",
        "2001:4860:4801:45::/64",
        "2001:4860:4801:46::/64",
        "2001:4860:4801:47::/64",
        "2001:4860:4801:48::/64",
        "2001:4860:4801:49::/64",
        "2001:4860:4801:4a::/64",
        "2001:4860:4801:50::/64",
        "2001:4860:4801:51::/64",
        "2001:4860:4801:53::/64",
        "2001:4860:4801:54::/64",
        "2001:4860:4801:55::/64",
        "2001:4860:4801:60::/64",
        "2001:4860:4801:61::/64",
        "2001:4860:4801:62::/64",
        "2001:4860:4801:63::/64",
        "2001:4860:4801:64::/64",
        "2001:4860:4801:65::/64",
        "2001:4860:4801:66::/64",
        "2001:4860:4801:67::/64",
        "2001:4860:4801:68::/64",
        "2001:4860:4801:69::/64",
        "2001:4860:4801:6a::/64",
        "2001:4860:4801:6b::/64",
        "2001:4860:4801:6c::/64",
        "2001:4860:4801:6d::/64",
        "2001:4860:4801:6e::/64",
        "2001:4860:4801:6f::/64",
        "2001:4860:4801:70::/64",
        "2001:4860:4801:71::/64",
        "2001:4860:4801:72::/64",
        "2001:4860:4801:73::/64",
        "2001:4860:4801:74::/64",
        "2001:4860:4801:75::/64",
        "2001:4860:4801:76::/64",
        "2001:4860:4801:77::/64",
        "2001:4860:4801:78::/64",
        "2001:4860:4801:79::/64",
        "2001:4860:4801:80::/64",
        "2001:4860:4801:81::/64",
        "2001:4860:4801:82::/64",
        "2001:4860:4801:83::/64",
        "2001:4860:4801:84::/64",
        "2001:4860:4801:85::/64",
        "2001:4860:4801:86::/64",
        "2001:4860:4801:87::/64",
        "2001:4860:4801:88::/64",
        "2001:4860:4801:90::/64",
        "2001:4860:4801:91::/64",
        "2001:4860:4801:92::/64",
        "2001:4860:4801:93::/64",
        "2001:4860:4801:c::/64",
        "2001:4860:4801:f::/64",
        "192.178.5.0/27",
        "192.178.6.0/27",
        "34.100.182.96/28",
        "34.101.50.144/28",
        "34.118.254.0/28",
        "34.118.66.0/28",
        "34.126.178.96/28",
        "34.146.150.144/28",
        "34.147.110.144/28",
        "34.151.74.144/28",
        "34.152.50.64/28",
        "34.154.114.144/28",
        "34.155.98.32/28",
        "34.165.18.176/28",
        "34.175.160.64/28",
        "34.176.130.16/28",
        "34.22.85.0/27",
        "34.64.82.64/28",
        "34.65.242.112/28",
        "34.80.50.80/28",
        "34.88.194.0/28",
        "34.89.10.80/28",
        "34.89.198.80/28",
        "34.96.162.48/28",
        "35.247.243.240/28",
        "66.249.64.0/27",
        "66.249.64.128/27",
        "66.249.64.160/27",
        "66.249.64.224/27",
        "66.249.64.32/27",
        "66.249.64.64/27",
        "66.249.64.96/27",
        "66.249.65.0/27",
        "66.249.65.160/27",
        "66.249.65.192/27",
        "66.249.65.224/27",
        "66.249.65.32/27",
        "66.249.65.64/27",
        "66.249.65.96/27",
        "66.249.66.0/27",
        "66.249.66.160/27",
        "66.249.66.192/27",
        "66.249.66.32/27",
        "66.249.66.64/27",
        "66.249.66.96/27",
        "66.249.68.0/27",
        "66.249.68.32/27",
        "66.249.68.64/27",
        "66.249.69.0/27",
        "66.249.69.128/27",
        "66.249.69.160/27",
        "66.249.69.192/27",
        "66.249.69.224/27",
        "66.249.69.32/27",
        "66.249.69.64/27",
        "66.249.69.96/27",
        "66.249.70.0/27",
        "66.249.70.128/27",
        "66.249.70.160/27",
        "66.249.70.192/27",
        "66.249.70.224/27",
        "66.249.70.32/27",
        "66.249.70.64/27",
        "66.249.70.96/27",
        "66.249.71.0/27",
        "66.249.71.128/27",
        "66.249.71.160/27",
        "66.249.71.192/27",
        "66.249.71.224/27",
        "66.249.71.32/27",
        "66.249.71.64/27",
        "66.249.71.96/27",
        "66.249.72.0/27",
        "66.249.72.128/27",
        "66.249.72.160/27",
        "66.249.72.192/27",
        "66.249.72.224/27",
        "66.249.72.32/27",
        "66.249.72.64/27",
        "66.249.72.96/27",
        "66.249.73.0/27",
        "66.249.73.128/27",
        "66.249.73.160/27",
        "66.249.73.192/27",
        "66.249.73.224/27",
        "66.249.73.32/27",
        "66.249.73.64/27",
        "66.249.73.96/27",
        "66.249.74.0/27",
        "66.249.74.128/27",
        "66.249.74.32/27",
        "66.249.74.64/27",
        "66.249.74.96/27",
        "66.249.75.0/27",
        "66.249.75.128/27",
        "66.249.75.160/27",
        "66.249.75.192/27",
        "66.249.75.224/27",
        "66.249.75.32/27",
        "66.249.75.64/27",
        "66.249.75.96/27",
        "66.249.76.0/27",
        "66.249.76.128/27",
        "66.249.76.160/27",
        "66.249.76.192/27",
        "66.249.76.224/27",
        "66.249.76.32/27",
        "66.249.76.64/27",
        "66.249.76.96/27",
        "66.249.77.0/27",
        "66.249.77.128/27",
        "66.249.77.160/27",
        "66.249.77.192/27",
        "66.249.77.224/27",
        "66.249.77.32/27",
        "66.249.77.64/27",
        "66.249.77.96/27",
        "66.249.78.0/27",
        "66.249.78.32/27",
        "66.249.79.0/27",
        "66.249.79.128/27",
        "66.249.79.160/27",
        "66.249.79.192/27",
        "66.249.79.224/27",
        "66.249.79.32/27",
        "66.249.79.64/27",
        "66.249.79.96/27",
        "8.8.4.0/24",
        "8.8.8.0/24",
        "8.34.208.0/20",
        "8.35.192.0/20",
        "23.236.48.0/20",
        "23.251.128.0/19",
        "34.64.0.0/10",
        "34.128.0.0/10",
        "35.184.0.0/13",
        "35.192.0.0/14",
        "35.196.0.0/15",
        "35.198.0.0/16",
        "35.199.0.0/17",
        "35.199.128.0/18",
        "35.200.0.0/13",
        "35.208.0.0/12",
        "35.224.0.0/12",
        "35.240.0.0/13",
        "64.15.112.0/20",
        "64.233.160.0/19",
        "66.102.0.0/20",
        "66.249.64.0/19",
        "70.32.128.0/19",
        "72.14.192.0/18",
        "74.114.24.0/21",
        "74.125.0.0/16",
        "104.154.0.0/15",
        "104.196.0.0/14",
        "104.237.160.0/19",
        "107.167.160.0/19",
        "107.178.192.0/18",
        "108.59.80.0/20",
        "108.170.192.0/18",
        "108.177.0.0/17",
        "130.211.0.0/16",
        "136.112.0.0/12",
        "142.250.0.0/15",
        "146.148.0.0/17",
        "162.216.148.0/22",
        "162.222.176.0/21",
        "172.110.32.0/21",
        "172.217.0.0/16",
        "172.253.0.0/16",
        "173.194.0.0/16",
        "173.255.112.0/20",
        "192.158.28.0/22",
        "192.178.0.0/15",
        "193.186.4.0/24",
        "199.36.154.0/23",
        "199.36.156.0/24",
        "199.192.112.0/22",
        "199.223.232.0/21",
        "207.223.160.0/20",
        "208.65.152.0/22",
        "208.68.108.0/22",
        "208.81.188.0/22",
        "208.117.224.0/19",
        "209.85.128.0/17",
        "216.58.192.0/19",
        "216.73.80.0/20",
        "216.239.32.0/19",
        "2001:4860::/32",
        "2404:6800::/32",
        "2404:f340::/32",
        "2600:1900::/28",
        "2606:73c0::/32",
        "2607:f8b0::/32",
        "2620:11a:a000::/40",
        "2620:120:e000::/40",
        "2800:3f0::/32",
        "2a00:1450::/32",
        "2c0f:fb50::/32"
    );

    function checkBotIP() {
        $client_ip = $_SERVER['REMOTE_ADDR'];
        if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $client_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        if(in_array($client_ip, $GLOBALS['google_bot_ip_ranges'])) return true;
        return false;
    }

    function isBot() {
        $CrawlerDetect = new CrawlerDetect();
        if($CrawlerDetect->isCrawler()) {
            return true;
        } elseif(checkBotIP()) {
            return true;
        }
        return false;
    }
?>

