<?php namespace App\Http\Controllers;

/**
 * Use to control process of UploadFileNG
 * @date 9/29/2016
 * @author Nasir Mehmood <oknasir@gmail.com>
 */

use Illuminate\Http\Request;

class UploadFileNG extends Controller
{
    /**
     * UploadFileNG constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Upload file and save in public folder
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request)
    {
        if ($request->file('ng-upload')->isValid()) {
            $request->file('ng-upload')->storeAs('upload/ng', $request->file('ng-upload')->getClientOriginalName());
            return [
                'success' => true,
                'message' => 'File is saved.'
            ];
        }

        return [
            'success' => false,
            'message' => 'File is not valid.'
        ];
    }
}