<?php

namespace App\Http\Controllers;

use App\Repository\Product\ProductInterface;
use App\Services\HeaderService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TabularController extends Controller
{
    private $productRepository;
    private $headers;
    public function __construct(ProductInterface $productInterface, HeaderService $headerService)
    {
        $this->productRepository = $productInterface;
        $this->headers = $headerService;
    }
    public function index()
    {
        return inertia('Admin/Tabular', ['tabs' => $this->headers->getTableTabs(), 'headers' => $this->headers->getTableHeaders()]);
    }
    public function getTableDetails(Request $request)
    {
        try {
            $params = $request->input('tab');
            $tab = strtolower($params);
            switch ($tab) {
                case 'tab-1':
                    if (Cache::has('Tab_Details')) {
                        $details = Cache::get('Tab_Details');
                    } else {
                        $details = $this->productRepository->Select();
                        Cache::put('Tab_Details', $details, now()->addYear(10));
                    }
                    break;
                case 'tab-2':
                    $details = [];
                    break;
                case 'tab-3':
                    $details = [];
                    break;
                default:
                    $details = $this->productRepository->Select();
                    break;
            }

            return response()->json(['details' => $details], 200);
        } catch (Exception $ex) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
