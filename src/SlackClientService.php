<?php

namespace Jlg;

use Exception;

use GuzzleHttp\{
    Client as Http,
    Psr7\Response
};

class SlackClientService {

    /**
    * @param string text - simple text message.
    * @param string $channel - example: https://hooks.slack.com/services/**T16**89/*******8/*********DF89********
    * @param array $options - default is [].
    *    keys:
    *      - username => Custom Username, default is SlackClient
    *      - attachments => Custom Slack message attachment, see readme for more details.
    *
    * @return Response
    *
    */ 
    public function sendSimpleSlackMessage(string $text, string $channel, array $options = []): Response
    {
        $payload = [
            'text' => $text
        ];
    
        if (isset($options['username'])) {
            $payload['username'] = $options['username'];
        }

        if (isset($options['attachments'])) {
            $payload['attachments'] = $options['attachments'];
        }

        return (new Guzzle())->post($channel, ['json' => $payload]);
    }
}
