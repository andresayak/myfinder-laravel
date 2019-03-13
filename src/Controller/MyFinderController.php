<?php

namespace andresayak\MyFinder\Controller;

use \Illuminate\Routing\Controller;
use Psr\Container\ContainerInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * Controller for handling requests to CKFinder connector.
 */
class MyFinderController extends Controller
{
    /**
     * @param ContainerInterface $container
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function browser(ContainerInterface $container, Request $request)
    {
        $service = $container->get('myfinder');
        $dir = $request->input('dir');
        return response()->json($service->browser($dir));
    }
    
    public function upload(ContainerInterface $container, Request $request)
    {
        $service = $container->get('myfinder');
        $dir = $request->input('dir');
        $file = $request->file('file');
        return response()->json($service->upload($dir, $file));
    }
    
    public function mkdir(ContainerInterface $container, Request $request)
    {
        $service = $container->get('myfinder');
        $dir = $request->input('dir');
        $name = $request->input('name');
        return response()->json($service->mkdir($dir, $name));
    }
    
    public function remove(ContainerInterface $container, Request $request)
    {
        $service = $container->get('myfinder');
        $file = $request->input('file');
        return response()->json($service->remove($file));
    }
}