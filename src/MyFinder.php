<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace andresayak\MyFinder;

/**
 * Description of MyFinder
 *
 * @author Andrey Sayak <andresayak@gmail.com>
 */

use Illuminate\Support\Facades\Storage;

class MyFinder {
    const ACTION_BROWSER = 'browser';
    const ACTION_UPLOAD = 'upload';
    const ACTION_REMOVE = 'remove';
    const ACTION_RENAME = 'rename';
    
    protected $_config = [];
    
    public function __construct($config) 
    {
        $this->_config = $config;
    }
    
    protected function _getStorage()
    {
        return Storage::disk('myfinder_public');
    }
    
    public function browser($dir)
    {
        $storage = $this->_getStorage();
        $directories = $storage->allDirectories();
        if(!in_array($dir, $directories)){
            $dir = '';
        }
        $files = [];
        foreach($storage->files($dir) AS $file){
            $files[] = [
                'filename' =>   preg_replace('/^'. preg_quote($dir, '/').'\//', '', $file),
                'filesize'   =>  $storage->size($file),
                'url'   =>  $storage->url($file),
            ];
        }
        return [
            'directories'   =>  $directories,
            'files' =>  $files
        ];
    }
    public function upload($dir, \Illuminate\Http\UploadedFile $file)
    {
        $storage = $this->_getStorage();
        $storage->putFileAs(($dir?$dir.'/':''), $file, $file->getClientOriginalName());
        return $this->browser($dir); 
    }
    public function mkdir($dir, $folderName)
    {
        $storage = $this->_getStorage();
        $storage->makeDirectory(($dir?$dir.'/':'').$folderName);
        return $this->browser($dir); 
    }
}
