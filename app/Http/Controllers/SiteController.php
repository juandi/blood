<?php

namespace App\Http\Controllers;

use App\Helpers\WhiteBrandHelper;
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

    /**
     * @param string $slugPage
     * @param int $page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWhiteBrand(string $slugPage, int $page = 1, Request $request)
    {
        $this->affiliates = $this->affiliates::where('name', strtolower($slugPage))->first();
        $list = Cache::remember('list', 15, function () use ($page) {
            return WhiteBrandHelper::getWebCams($page);
        });
        return view('whitebrand.index', [
            'title'   => $slugPage,
            'cssPath' => $this->affiliates->css_path,
            'list'    => $list
        ]);
    }
}
