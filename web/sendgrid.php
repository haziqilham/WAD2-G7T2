<?php
  require 'vendor/autoload.php'; 
  use \Mailjet\Resources;
  $mj = new \Mailjet\Client('79de86f0cfcc4d0a342b20056cb017ab','06e1911f6e0ac49a6ececd9641b484a9',true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "muhammadi.2019@scis.smu.edu.sg",
          'Name' => "haziq"
        ],
        'To' => [
          [
            'Email' => "muhammadi.2019@scis.smu.edu.sg",
            'Name' => "haziq"   
          ]
        ],
        'Subject' => "TEST 4",
        'TextPart' => "My first Mailjet email",
        'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());
?>
