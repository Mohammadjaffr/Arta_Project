<?php

namespace App\Services;

use App\Repositories\OTPRepository;

class OTPService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private OTPRepository $OTPRepository)
    {
        //
    }
    public function generateOTP($email,$purpose='account_creation')
    {
        $existingOtp=$this->OTPRepository->findByEmail($email);
        if($existingOtp){
            $this->OTPRepository->delete($existingOtp->id);
        }
        $otp = rand(100000, 999999);
        $expiresAt = now()->addMinutes(10);
        $data=[
            'email' => $email,
            'code' => $otp,
            'expires_at' => $expiresAt,
            'purpose' => $purpose,
        ];
        $this->OTPRepository->store($data);
        return $otp;
    }

    public function verifyOTP($email, $code)
    {
        $otp = $this->OTPRepository->verifyOTP($email, $code);

        if ($otp) {
            $otp->is_used = true;
            $otp->save();
            return true;
        }

        return false;
    }
}
