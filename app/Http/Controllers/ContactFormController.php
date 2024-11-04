<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $messages = [
            'name.required' => __('site.name_required'),
            'name.string' => __('site.name_string'),
            'email.required' => __('site.email_required'),
            'email.email' => __('site.email_email'),
            'website.url' => __('site.website_url'),
            'message.required' => __('site.message_required'),
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'website' => 'nullable|url',
            'message' => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        ContactForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => __("site.success_send")
        ], 200);
    }



}
