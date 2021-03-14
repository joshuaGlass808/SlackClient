<?php

namespace Jlg;

use Exception;

class SlackAttachment
{
    public $color = '#3AA3E3';
    public $attachmentType = 'default';

    protected $actions = [];
    protected $toArray = [];
    protected $reqBasicFields = ['pretext', 'fallback', 'callback_id'];
    protected $reqActionFields = ['name', 'value', 'type'];

    /**
     * @param array $attachmentValues
     */
    public function __construct(array $attachmentValues)
    {
        $this->validateFields('attachment', $attachmentValues, $this->reqBasicFields);
        $this->toArray = $attachmentValues;

        if (!isset($attachmentValues['color'])) {
            $this->toArray['color'] = $this->color;
        }

        if (!isset($attachmentValues['attachment_type'])) {
            $this->toArray['attachment_type'] $this->attachmentType;
        }

    }

    /**
     * Add an Action
     * 
     * @param array $action
     * 
     * @return self
     */
    public function addAction(array $action): self 
    {
        $this->validateFields('Action', $action, $this->reqActionFields);
        $this->actions[] = $action;

        return self;
    }

    /**
     * Convert data to array 
     * 
     * @return array
     */
    public function toArray(): array 
    {
        if (count($this->actions) > 0) {
            $this->toArray['actions'] = $this->actions;
        }

        return $this->toArray;
    }

    /**
     * Add multiple actions
     * 
     * @param array $actions 
     * 
     * @return self
     */
    public function addActions(array $actions): self 
    {
        foreach ($actions as $action) {
            $this->addAction($action);
        }

        return self;
    }
    
    /**
     * Validate Fields
     * 
     * @param string $type
     * @param array $values 
     * @param array $fields 
     * @throws Exception - an output of all missing fields for that section.
     * 
     * @return void
     */
    protected function validateFields(string $type, array $values, array $fields): void 
    {
        $missing = [];
        $keys = array_keys($values);
        foreach ($fields as $field) {
            if (!in_array($field, $keys)) {
                $missing[] = "Missing field: {$field}";
                continue;
            }
        } 

        if (count($missing) !== 0) {
            throw new Exception("Missing Required {$type} Fields: \n" . implode(', ', $missing));
        }
    }
}