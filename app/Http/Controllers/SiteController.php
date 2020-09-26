<?php

namespace App\Http\Controllers;

use App\Helpers\BloodHelper;
use App\WhiteBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteController extends Controller
{
    protected $affiliates;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->affiliates = new WhiteBrand();

    }

    public function index()
    {
        $ground = BloodHelper::createGround();

        foreach ($ground["item"] as $field) {
            BloodHelper::getBestFieldArea($field);
        }
    }


}
