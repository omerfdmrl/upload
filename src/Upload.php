<?php

namespace Omerfdmrl\Upload;

use Verot\Upload\Upload as UploadUpload;

class Upload
{

    protected static $upload;

    protected static $error = null;
    

    static function new($name,$lang = 'en_GB')
    {
        self::$upload = new UploadUpload($_FILES[$name],$lang);
        if(self::$upload->uploaded){
            return new static;
        }else {
            self::$error = self::$upload->error;
            return new static;
        }
    }

    public function rename($name)
    {
        self::$upload->file_new_name_body = $name;
        return new static;
    }

    public function convert($type)
    {
        self::$upload->image_convert = $type;
        return new static;
    }

    public function allowed($allowed = [])
    {
        self::$upload->allowed = $allowed;
        return new static;
    }

    public function maxSize($maxSize)
    {
        self::$upload->file_max_size = $maxSize;
        return new static;
    }

    public function crop($x,$y,$ratio = True)
    {
        self::$upload->image_resize = True;
        self::$upload->image_ratio = $ratio;
        self::$upload->image_y = $y;
        self::$upload->image_x = $x;
        return new static;
    }

    public function prefix($prefix)
    {
        self::$upload->file_name_body_pre = $prefix;
        return new static;
    }

    public function brightness($brightness)
    {
        self::$upload->image_brightness = $brightness;
        return new static;
    }

    public function contrast($contrast)
    {
        self::$upload->image_contrast = $contrast;
        return new static;
    }

    public function opacity($opacity)
    {
        self::$upload->image_opacity = $opacity;
        return new static;
    }

    public function max($height = null,$width = null)
    {
        if($height){
            self::$upload->image_max_height = $height;
        }
        if($width){
            self::$upload->image_max_width = $width;
        }
        return new static;
    }

    public function min($height = null,$width = null)
    {
        if($height){
            self::$upload->image_min_height = $height;
        }
        if($width){
            self::$upload->image_min_width = $width;
        }
        return new static;
    }

    public function text($text,$direction = 'h',$color = '#fff',$position = 'BR')
    {
        self::$upload->text = $text;
        self::$upload->image_text_direction = $direction;
        self::$upload->image_text_color = $color;
        self::$upload->image_text_position = $position;
        return new static;
    }

    public function watermark($image,$position = 'BR')
    {
        self::$upload->image_watermark = 'watermark.png';
        self::$upload->image_watermark_position = 'BR';
        return new static;
    }

    public function other($settings = [])
    {
        foreach($settings as $key => $value){
            self::$upload->$key = $value;
        }
        return new static;
    }

    public function upload($path)
    {
        self::$upload->Process($path);
        return new static;
    }

    public function control()
    {
        if(self::$error == null){
            if(self::$upload->processed){
                return (object)['path'=>self::$upload->file_dst_path,'name'=>self::$upload->file_dst_name];
            }else {
                return self::$upload->error;
            }
        }else {
            return self::$error;
        }
    }

}