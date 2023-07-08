<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\SaveRequest;
use App\Repository\Profile\ProfileInterface;
use Exception;
use Illuminate\Http\Request;

class FormController extends Controller
{
    private $profileRepository;
    public function __construct(ProfileInterface $profileInterface)
    {
        $this->profileRepository = $profileInterface;
    }
    public function saveProfile(SaveRequest $request)
    {
        try {
            $params = $request->all();
            $details = $this->profileRepository->Save($params);
            return response()->json(['message' => 'Profile details saved successfully', 'details' => $details], 200);
        } catch (Exception $ex) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
