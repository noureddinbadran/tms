<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorsLog extends Model
{
    protected $fillable = ['message', 'file', 'line', 'trace', 'err_code','request'];

    /**
     * @param \Throwable $e
     * @return int|mixed
     */
    public static function newError($e,$code=null)
    {
        if (!$code)
            $code = $e->getCode();
        $url = '';
        try{$url=\Request::getRequestUri();}catch (\Throwable $e){}
        $model = new ErrorsLog();
        $model->message = $e->getMessage();
        $model->file = $e->getFile();
        $model->line = $e->getLine();
        $model->trace = $e->getTraceAsString();
        $model->err_code = $code;
        $model->request = json_encode(request()->all());
        $model->user_id = \Auth::user()?\Auth::user()->id:0;
        $model->url = $url;
        $model->save();
        return $model->id;
    }

}
