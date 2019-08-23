<?php

namespace Otrigg\Formmailer\Services;
use Mail;

class FormService 
{
    /**
     * Check if request sent respect the rules defined into config file
     * @param Request $request
     * @return boolean
     */
    public function validateRequest($request) 
    {

        if(config('formmailer.mode') == 'strict') 
        {
            if (!in_array($request->server('HTTP_REFERER'), config('formmailer.referrals'))) 
            {
                return false;
            } 
        }

        if(!in_array($request->app_id, config('formmailer.app_id')))
        {
            return false;
        }

        return true;
    }

    /**
     * Mass send emails to the recipients defined into config file
     * @param Request $request
     * @return void
     */
    public function sendMyMail($request) 
    {   
        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'sender'    => $request->sender,
            'phone'     => $request->phone,
            'body'      => $request->message,
        ];

        $info = [
            'name'      => $data['name'],
            'sender'    => $data['sender']
        ];

        foreach(config('formmailer.recipients') as $recipient) {
            Mail::send(['formmailer::html', 'formmailer::txt'], $data, function($message) use ($info, $recipient) {
                $message
                    ->to($recipient)
                    ->subject('Message from: '.$info['name'])
                    ->from($info['sender'], 'Form Notification Service');
            });
        }
    }

}