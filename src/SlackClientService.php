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
     * Send text only to a channel
     * 
     * @param string $channel
     * @param string $text
     * @param string $username
     * 
     * @return Response
     */
    public static function sendText(
        string $channel,
        string $text,
        string $username
    ): Response {
        return self::sendMessage($channel, $text, null, $username);
    }

    /**
     *  Sends a message to a slack webHook Url "channel".
     * 
     * @param string $chennel 
     * @param string $text 
     * @param SlackAttachment|null $attachment 
     * @param string $username default ''
     * 
     * @return Response
     */
    public static function sendMessage(
        string $channel, 
        string $text, 
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
