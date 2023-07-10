<?php

namespace App\Usables;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait ReadWrite
{
    /**
     * Writing general exception
     */
    public function WriteGeneralException(Exception $ex)
    {
        Log::channel('general_exception')->info("General Exception : " . $ex->getMessage() . ' On Line : ' . $ex->getLine());
    }
    /**
     * Storing image
     * @return bool
     */
    public function StoreImage(string $path, $image, string &$error): bool
    {
        try {
            $isstored = Storage::disk('public')->put($path, $image);
            return $isstored;
        } catch (Exception $ex) {
            $error = $ex->getMessage();
            return false;
        }
    }
}
