<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\SaveRequest;
use App\Repository\Profile\ProfileInterface;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;

class FormController extends Controller
{
    private $profileRepository;
    private $imageService;
    public function __construct(ProfileInterface $profileInterface, ImageService $imageService)
    {
        $this->profileRepository = $profileInterface;
        $this->imageService = $imageService;
    }
    public function saveFormDetails(SaveRequest $request)
    {
        try {
            $params = $request->all();
            $image = $request->file('profile_pic');
            $fileName = 'profile_' . date('YmdHisu') . '.png';
            $error = '';
            $upload = $this->imageService->SaveImageFromWeb($image, 'profile_pic', $fileName, $error);
            if (!$upload) {
                throw new Exception($error);
            }
            $params['profile_pic'] = $fileName;
            $details = $this->profileRepository->Save($params);
            return response()->json(['message' => 'Form details saved successfully', 'details' => $details], 200);
        } catch (Exception $ex) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
