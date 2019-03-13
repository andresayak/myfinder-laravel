<?php

return array(
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public/myfinder'),
            'url' => env('APP_URL') . '/storage/myfinder',
            'visibility' => 'public',
        ]
    ],
    'images'    =>  array(
        'maxWidth' => 1600,
        'maxHeight' => 1200,
        'quality' => 80,
        'sizes' => array(
            'small' => array('width' => 480, 'height' => 320, 'quality' => 80),
            'medium' => array('width' => 600, 'height' => 480, 'quality' => 80),
            'large' => array('width' => 800, 'height' => 600, 'quality' => 80)
        )
    ),
    'resourceTypes' =>  [
        [
            'type' => 'image',
            'directory' => 'images',
            'maxSize' => 0,
            'allowedExtensions' => 'bmp,gif,jpeg,jpg,png',
            'deniedExtensions' => '',
            'backend' => 'default'
        ],
        [
            'type' => 'file',
            'directory' => 'files',
            'maxSize' => 0,
            'allowedExtensions' => '7z,aiff,asf,avi,bmp,csv,doc,docx,fla,flv,gif,gz,gzip,jpeg,jpg,mid,mov,mp3,mp4,mpc,mpeg,mpg,ods,odt,pdf,png,ppt,pptx,pxd,qt,ram,rar,rm,rmi,rmvb,rtf,sdc,sitd,swf,sxc,sxw,tar,tgz,tif,tiff,txt,vsd,wav,wma,wmv,xls,xlsx,zip',
            'deniedExtensions' => ''
        ]
    ]
);
