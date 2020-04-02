<?php

return [
    'alipay' => [
        // 支付宝分配的 APPID
        'app_id' => env('ALI_APP_ID', '2019071565833607'),

        // 支付宝异步通知地址
        'notify_url' => '',

        // 支付成功后同步通知地址
        'return_url' => '',

        // 阿里公共密钥，验证签名时使用
        'ali_public_key' => env('ALI_PUBLIC_KEY', 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgn/zv3299Dt2Hgo8eSTymNhaRfdr+bk0TjJP7cOWXK1hbdj8s19IeuAA+PaiSgo3ftBcT81lD9E/2VcZRjOlW6eVD/p5pY8bpR7r8VGY7CKXpLJrsx/iRPhpiSCOfEfViX58aopsYZN4O27K7gGUgR3Y16gWXAnxzmPQaOwHBtgNI7olagpz/hqEMNf1hNubAC66RD7VnHuf2/3mki5f9BY95/+UIx5NwUuLVnWV8AkU6kj7Kx18w94EZuQKStAqFPDOfL/aNDK8z27qdgipw8t+yM2MsgBdPm9Qw7a4lrOFonBI9DZardk2lprlMDP36BMgP8WkACnG1qn8O4oESwIDAQAB'),

        // 自己的私钥，签名时使用
        'private_key' => env('ALI_PRIVATE_KEY', 'MIIEpgIBAAKCAQEA0NpyPxthFEwOGekGjwDo86cJiXI3SJI8sKvhHTsTUThxPXoC2Un0NjMGN9SxQYwKKcUcjb7ZF5qHLFBykrJ9pyVcMe/jFW928jw9EgpeOIK30Vgf8XNDfE5Vi0bk6suSAUejUJBnfIN5MKn3t++KV/jueG62bHtNx/bDUx4ENWUvSIpeIywHq4o5168S0J+p9gxyIqZ97vAnuHM7Mhtxib0mUJNhoWyOA3dBJHeLpAMt70Z4i3Ue6RQsqhevjL64ox5tfSnnKyz2rHqFVScRwMIYNTZx/Bfzg+9fsuDhKEuKI78fiq548LOZ7C2FsSkDo4wt31RaOlVv4SF8ZVg3iwIDAQABAoIBAQCdcnD6Piu7X3Kp+dAl8murc1tvMJmYrhXuokS9ApIXgtNroxWOtX/TdDfV0xQl8+qdfql9+kgy0R3iPGuDR+gOH84XH180A6nKB7uKZCKPu4vT1/mMznYrueonazScBQd2y4jE7Xf2mC6+jwPeuEi09Ubhp6UCtxn2C4NIn7JQhTCXWY/Q5Ap1YAVvPhoQLuW1b0AfXkwdGtf5nYp9v6hF4YevuUeLFhTDe0j8Uhyv/HVPauE9YuJyGePsj4nkaxKEoWuuOJsSu2vLESdLuKsKZUhcTW8Bh8EsGOQCBQpqKMEzjdu6QO3dTGPsvTahBLuYlJGMUcGWkTPqPUqA8sQBAoGBAO0g76+rkP6LS5QmhTsSapWLWR0DGkUbSEFefyXykcjJm6rhkWbrnbM7Vc5SsVZBbDDUZ25NSdFo1RugYdc2oCNn+YhVw0wY4GDLBenRzj0OGQ01/jJLFym9oWMfwfAzcqhPbSHJCiPEXuf1Q47UqYA3cAGPfKqe7pWF2sALMcMBAoGBAOF5c4izoSc73CRCtJZ0Mwntd7nmvCdwyWs8NrztU42h9FUSwBLgBNjjODa/GsbUtnxgAKo3g/B3V7sK37BgX7shZwfp5Ozm7U3lXithMLtlYYNIpLkcbFU7WGaoPEbm4cw4frjfSZJrAXEjKzwGBsJZxt+mvaeAXD0WvSFm0VaLAoGBAI2H9wdW03faFAYc57BWUZ9oSIv0ah2NJxc9G46+tRyumGbpsytGvh1X8OLwoD/nVHfgjsta/hArDecrVrppNDNtv5YL+kDVKDcddi4Ut4/hdjpYW5wRDYYwVL8hGVQQoQKsRWrA33hxoGO6E9SQQYrxi7yis7nymlxMREATbmQBAoGBAMRWadCj+rSbX3sDyxUoYjlG23a6ASWnBP2oFVI2pwcx+/0IstC82fuzAIRLrRluqOls/6c5aF7AzVhGg7qmcTYWRA2UEpBoFkQ6cuH7Y+AKy/ryCt5Wbc9aOgRKgxKKghy/JTn+1aX2H+9Q3JkL9l7OpmqiW4u8LpXTcyXeznM5AoGBANTNAJLSlX96geBBDBgHgiZYGyOYQj1X0yUD4gBn3kIMhmeYkgmluXpxm8P+N6WBZ6xSmEO7HSruFial6CQRjGHr9M/+sZjp0JloERehIUZy/rvC00kZ3TiMfyXWyYuAlDfaldLwnrrXIMkKXlxTFf/rstQaGVRvi+lHFy+gk3j7'),

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/alipay.log'),
        //  'level' => 'debug'
        //  'type' => 'single', // optional, 可选 daily.
        //  'max_file' => 30,
        ],

        // optional，设置此参数，将进入沙箱模式
        // 'mode' => 'dev',
    ],

    'wechat' => [
        // 公众号 APPID
        'app_id' => env('WECHAT_APP_ID', 'wxd6404f2255e97d07'),

        // 小程序 APPID
        'miniapp_id' => env('WECHAT_MINIAPP_ID', 'wxd6404f2255e97d07'),

        // APP 引用的 appid
        'appid' => env('WECHAT_APPID', 'wxd6404f2255e97d07'),

        // 微信支付分配的微信商户号
        'mch_id' => env('WECHAT_MCH_ID', '1545005121'),

        // 微信支付异步通知地址
        'notify_url' => 'http://api.haonanzhang.cn/api/user_auth/order/notify',

        // 微信支付签名秘钥
        'key' => env('WECHAT_KEY', 'mosiling01f2b34748a82c3542e34453'),
//        'key' =>"mosiling01f2b34748a82c3542e34453",

        // 客户端证书路径，退款、红包等需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_client' => '',

        // 客户端秘钥路径，退款、红包等需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_key' => '',

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/wechat.log'),
        //  'level' => 'debug'
        //  'type' => 'single', // optional, 可选 daily.
        //  'max_file' => 30,
        ],

        // optional
        // 'dev' 时为沙箱模式
        // 'hk' 时为东南亚节点
        // 'mode' => 'dev',
    ],
];

// return [
//     'alipay' => [
//         'app_id'         => '2016092200573020',
//         'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvDhtAGiSfUuGBzBrZKPW0F8JPtHqzvTdu3uLk6KSGktG5l0+zSfGtjjYxz7tQQYSUBSBRRNe4Arqgs9YCUjau/RHOy2TkmQlm+twtfsIqcraEbIOfDtArTEYrsNnfn8DTQvCHyVS4wR+7KU2BLcROPaChewYzUUIr0dBizUSjnGi6xTjwQPOoBtpxTmkLI5KZ/W9wVoOBErynUGk2YnS8XnkkJev39g0PlHTi5kQDHDqK4t/0JxZI9LhbWSRlFT4wgQl3O0nWZ/GDeCFtlmbY+ee8f2w/CKdMmaeiG92IiDEyT3i0fWgDOUfgK0BmOWpEtZ6kdWhZY51LRvrrWdoeQIDAQAB',
//         'private_key'    => 'MIIEpQIBAAKCAQEAsMWPif7V9/0JIhjfEjFYev9ZJGmP0O/QZA2Tx0KQ0eQZDIyY+cOApEqdT5AfNWl4qBi4GYWaOfhOlgRILX112zjl+90lVk3oaQeMDBLb6IVPa4b8GJDDbPcP7FqwIosGxxfWmvmUbSFN1d9TE6EoKTPziFnkJ+rbEH4qgTxHQ1N4fvcYz90fT7z2d1B2KjuhjjCQKXvWT9lPdnGFdbcxI+rQLv3porisl601bbrRY0Bgvabt4GNL/Vhvj4+8RtpvvHP/HDuEU/xxfeo5ajhwuLHznsVdqm5U+sRaEvnjoNFhP38seh4t0Tn5MsER8Tl1S7mJwVrKlH6q1fKDGTEYxwIDAQABAoIBAQCEQt0aB/T6PnX18Bv/lbI5HRMKfn0ffD80jUATp8eJc5wWWqAeyFtZEYbQP+pJ4Wdohk5AskjptNK/xeZnOubSpqjVIOrNvy70XrQ3WGj3eb8pme7HRpEh110vn88HmXPxxPFKNREL8g41xol3N25AHeHKFE/0WfGcTnnpBjvfr7bb872ui7TxKYs/9bre6nX0/iXmdgzV4EZ8J+5llMsfe8Tclvh1lpYRg/fLoGgBuQEOj8Ezt/BynT9MvB2sHEoPZw80NHKDtf6xnKYlU7J23vAU9963B0e2WvauGqTVKzajAEv8RJtZuTWupDgroBZV0lzXzG3s2ADcOPx3YcoJAoGBAN7Zx49cKkHnz6enFJcMnmYgSp9FzjZlNpa8FGqO/xMWWD99K8o2ptVZf0xpk4VSbTov3Pyry+510OfsMB7XCbNMrVWY8M8O63xAw9ocYBvuJDE94Fu36Op2JZkzT5BO0AfVFndsKknJmI8s8MLI1Xcfo1lPx2hH8IeIYUzOBoFNAoGBAMsRFHwfMYSZ/H+FPjNtdsgrDmcFhPrAwQ1lYhk1AObM3fIraHBJ76WHwAb5nfDaZ052sB3IdUiKABvlvivY9jGzpTGkj3IypmPCWxZqy4PtL6kZnaLguT5yP/2/VjF4S0llsexa5f1mppH1A4lKsIzggIhcRLQOAslygph31XhjAoGBALYD+lLFXF5oD9tHRDH7RIT1av2b7knPcT68b5B5Ky1T2tBAVDvdV3Z6mta2hJ8oK76SyVQ2nWIvKGnFJ6iIyot/3TNEr6ru7LeXzl+fPYCSiU0O1OkU1VBrH1p55kpflNpQ2QDBf+i0l76ZXiw6DOA3HxwbZStvVq3cXlx1CishAoGABZfB1a1SQtGu56A211nDdL3i1qmLQRDAAGtzaThRfwnTbxEM/lK6+/ciLc8AL5sET1/rd9aGjGnomNwaAcEm/rVw7k4W+VE1zfeTZKmqU0bcEi83bT39PCAPbSCw8gnbIPlhDh5uySzjl4+E+moJNMgWIitQZRkhsISr3iEmyvsCgYEAkcXZ+RMQyaPnUMwN1tyl9/3sKRKroESzZNs9nRLdN/p67Kk/+fUE1qV/apPXS0UuVf0ZDifGxDRaaMdusf9pH7dImCMX6AJBFNPU66g1jB9FmFws79fNlKovgf2bs2oWqprjwemhcTBe0k5Y4Nt/DZUa/QaA+G+9nlL/i2Tb9KQ=',
//         'log'            => [
//             'file' => storage_path('logs/alipay.log'),
//         ],
//     ],

//     'wechat' => [
//         'app_id'      => '',
//         'mch_id'      => '',
//         'key'         => '',
//         'cert_client' => '',
//         'cert_key'    => '',
//         'log'         => [
//             'file' => storage_path('logs/wechat_pay.log'),
//         ],
//     ],
// ];