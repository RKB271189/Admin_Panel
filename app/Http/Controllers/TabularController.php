<?php

namespace App\Http\Controllers;

use App\Repository\Product\ProductInterface;
use Exception;
use Illuminate\Http\Request;

class TabularController extends Controller
{
    private $productRepository;
    public function __construct(ProductInterface $productInterface)
    {
        $this->productRepository = $productInterface;
    }
    public function getProductData()
    {
        try {
            $details = $this->productRepository->Select();
            return response()->json(['details' => $details], 200);
        } catch (Exception $ex) {
            return response()->json(['error' => 'Something went wrong'], 200);
        }
    }
}
