<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }
    
    public function activity()
    {
    	return view('about/activity');
    }
    public function information()
    {
    	return view('about/information');
    }
    public function pressrelease()
    {
    	return view('about/press_release');
    }
    public function history()
    {
    	return view('about/history');
    }
    public function visionmission()
    {
    	return view('about/visionmission');
    }
}
