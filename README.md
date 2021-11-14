# SlackClient
Just a simple Slack client in php

# Quick reference

Here is an example of the slack attachment array being used for a message that sends a button to respond to an exception.

        $data = [
            [
                "pretext" => $text,
                "fallback" => "{$text}\n{$exception->getTraceAsString()}",
                "callback_id" => "gen_task",
                "color" => "#3AA3E3",
                "attachment_type" => "default",
                "actions" => [
                    [
                        "name" => "task",
                        "text" => "Create Task",
                        "style" => "primary",
                        "type" => "button",
                        "value" => "create_task",
                        "confirm" => [
                            [
                                "title" => "Are you sure you want to generate a task?",
                                "ok_text" => "Yes",
                                "dismiss_text" => "No"
                            ]
                        ]
                    ],
                    [
                        "name" => "stacktrace",
                        "text" => "Stacktrace",
                        "style" => "danger",
                        "type" => "button",
                        "value" => "see_stack",
                    ]
                ]
            ]
        ];

Please see slacks documentation for more details on what is valid.

@todo - update documentation and update tests
