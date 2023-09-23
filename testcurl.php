<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apigwuat.icicibank.com:8443/api/v1/composite-payment',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
"device-id": "a2fa806f843b3538",
"mobile": "9046780520",
"channel-code": "GOOGLE",
"profile-id": "1147846",
"seq-no": "ICI6a732b2eb1264b1f8da0fb62ed9116ae",
"pre-approved": "M",
"payer-va": "ankan.k.e.s.h0045-40@okicici",
"amount": "120.00",
"remarks": "UPI",
"account-provider": "508534",
"account-number": "AX61c7d43c47fc0c513ad9283dc0539d90",
"senderIFSC": "ICIC0001937",
"account-type": "SAVINGS",
"use-default-acc": "N",
"default-credit": "N",
"default-debit": "N",
"currency": "INR",
"ref-url": "https://www.example.org",
"payee-va": "good@icici",
"txn-type": "payRequest"
}',
  CURLOPT_HTTPHEADER => array(
    'apikey: m9gS9ommoQBAwAJOQReKLhddos4r5NGY',
    'content-type: application/json',
    'x-priority: 1000'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
