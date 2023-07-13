<?php

namespace App\Http\Controllers;

use App\Repository\Profile\ProfileInterface;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private $profileRepository;
    public function __construct(ProfileInterface $profileInterface)
    {
        $this->profileRepository = $profileInterface;
    }
    public function index()
    {
        $details = $this->profileRepository->Select();
        return inertia('Admin/Picture', ['picture' => $details]);
    }
}
