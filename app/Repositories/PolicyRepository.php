<?php

namespace App\Repositories;

use App\Models\PrivacyPolicy;
use App\Models\TermsAndConditions;
use App\Models\RefundPolicy;
use Illuminate\Http\Request;

class PolicyRepository
{
    public function privacyPolicy()
    {
        return PrivacyPolicy::first();
    }
    public function termsAndConditions()
    {
        return TermsAndConditions::first();
    }
    public function refundPolicy()
    {
        return RefundPolicy::first();
    }
    public function get()
    {
        return new Request( [
            'privacyPolicy' => $this->privacyPolicy(),
            'refundPolicy' => $this->refundPolicy(),
            'termsAndConditions' => $this->termsAndConditions(),
        ]);
    }
}
