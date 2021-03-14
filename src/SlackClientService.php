<?php

namespace Jlg;

use Exception;

use GuzzleHttp\{
    Client as Http,
    Psr7\Response
};

class SlackClientService 
{

    /**
     *  Sends a message to a slack webHook Url "channel".
     * 
     * @param string $text 
     * @param string $channel 
     * @param SlackAttachment|null $attachment 
     * @param string $username default ''
     * 
     * @return Response
     */
    public function sendSimpleSlackMessage(
        string $text, 
        string $channel, 
        ?SlackAttchment $attachment, 
        string $username = ''
    ): Response {
        $payload = [
            'text' => $text
        ];
    
        if (isset($options['username'])) {
            $payload['username'] = $options['username'];
        }
        
        if ($attachment !== null) {
            $payload['attachments'] = $attachment->toArray();
        }


        return (new Guzzle())->post($channel, ['json' => $payload]);
    }
}
