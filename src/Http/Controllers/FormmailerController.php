<?php
namespace Otrigg\Formmailer\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Otrigg\Formmailer\Services\FormService;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class FormmailerController extends Controller
{

    private $service;

    public function __construct(FormService $service)
    {
        $this->service = $service;
    }

    public function send(Request $request) 
    {   
        $request->validate(config('formmailer.rules'));
        
        $message = 'Message sent.';
        $error = false;
        
        try {
            $this->service->sendMyMail($request);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $error = true;
        }

        if($error) 
        {
            return response()->json([
                'error' => $message
            ], 400);
        } 
        else 
        {
            return response()->json([
                'message' => $message
            ], 200);
        }

    }

}
