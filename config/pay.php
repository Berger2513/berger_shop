<?php

return [
    'alipay' => [
        'app_id'         => '2016092200573020',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvDhtAGiSfUuGBzBrZKPW0F8JPtHqzvTdu3uLk6KSGktG5l0+zSfGtjjYxz7tQQYSUBSBRRNe4Arqgs9YCUjau/RHOy2TkmQlm+twtfsIqcraEbIOfDtArTEYrsNnfn8DTQvCHyVS4wR+7KU2BLcROPaChewYzUUIr0dBizUSjnGi6xTjwQPOoBtpxTmkLI5KZ/W9wVoOBErynUGk2YnS8XnkkJev39g0PlHTi5kQDHDqK4t/0JxZI9LhbWSRlFT4wgQl3O0nWZ/GDeCFtlmbY+ee8f2w/CKdMmaeiG92IiDEyT3i0fWgDOUfgK0BmOWpEtZ6kdWhZY51LRvrrWdoeQIDAQAB',
        'private_key'    => 'MIIEpQIBAAKCAQEAsMWPif7V9/0JIhjfEjFYev9ZJGmP0O/QZA2Tx0KQ0eQZDIyY+cOApEqdT5AfNWl4qBi4GYWaOfhOlgRILX112zjl+90lVk3oaQeMDBLb6IVPa4b8GJDDbPcP7FqwIosGxxfWmvmUbSFN1d9TE6EoKTPziFnkJ+rbEH4qgTxHQ1N4fvcYz90fT7z2d1B2KjuhjjCQKXvWT9lPdnGFdbcxI+rQLv3porisl601bbrRY0Bgvabt4GNL/Vhvj4+8RtpvvHP/HDuEU/xxfeo5ajhwuLHznsVdqm5U+sRaEvnjoNFhP38seh4t0Tn5MsER8Tl1S7mJwVrKlH6q1fKDGTEYxwIDAQABAoIBAQCEQt0aB/T6PnX18Bv/lbI5HRMKfn0ffD80jUATp8eJc5wWWqAeyFtZEYbQP+pJ4Wdohk5AskjptNK/xeZnOubSpqjVIOrNvy70XrQ3WGj3eb8pme7HRpEh110vn88HmXPxxPFKNREL8g41xol3N25AHeHKFE/0WfGcTnnpBjvfr7bb872ui7TxKYs/9bre6nX0/iXmdgzV4EZ8J+5llMsfe8Tclvh1lpYRg/fLoGgBuQEOj8Ezt/BynT9MvB2sHEoPZw80NHKDtf6xnKYlU7J23vAU9963B0e2WvauGqTVKzajAEv8RJtZuTWupDgroBZV0lzXzG3s2ADcOPx3YcoJAoGBAN7Zx49cKkHnz6enFJcMnmYgSp9FzjZlNpa8FGqO/xMWWD99K8o2ptVZf0xpk4VSbTov3Pyry+510OfsMB7XCbNMrVWY8M8O63xAw9ocYBvuJDE94Fu36Op2JZkzT5BO0AfVFndsKknJmI8s8MLI1Xcfo1lPx2hH8IeIYUzOBoFNAoGBAMsRFHwfMYSZ/H+FPjNtdsgrDmcFhPrAwQ1lYhk1AObM3fIraHBJ76WHwAb5nfDaZ052sB3IdUiKABvlvivY9jGzpTGkj3IypmPCWxZqy4PtL6kZnaLguT5yP/2/VjF4S0llsexa5f1mppH1A4lKsIzggIhcRLQOAslygph31XhjAoGBALYD+lLFXF5oD9tHRDH7RIT1av2b7knPcT68b5B5Ky1T2tBAVDvdV3Z6mta2hJ8oK76SyVQ2nWIvKGnFJ6iIyot/3TNEr6ru7LeXzl+fPYCSiU0O1OkU1VBrH1p55kpflNpQ2QDBf+i0l76ZXiw6DOA3HxwbZStvVq3cXlx1CishAoGABZfB1a1SQtGu56A211nDdL3i1qmLQRDAAGtzaThRfwnTbxEM/lK6+/ciLc8AL5sET1/rd9aGjGnomNwaAcEm/rVw7k4W+VE1zfeTZKmqU0bcEi83bT39PCAPbSCw8gnbIPlhDh5uySzjl4+E+moJNMgWIitQZRkhsISr3iEmyvsCgYEAkcXZ+RMQyaPnUMwN1tyl9/3sKRKroESzZNs9nRLdN/p67Kk/+fUE1qV/apPXS0UuVf0ZDifGxDRaaMdusf9pH7dImCMX6AJBFNPU66g1jB9FmFws79fNlKovgf2bs2oWqprjwemhcTBe0k5Y4Nt/DZUa/QaA+G+9nlL/i2Tb9KQ=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];