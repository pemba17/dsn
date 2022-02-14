<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'company_name'=>['nullable','string','max:255'],
            'contact'=>['nullable','numeric','digits_between:7,10',Rule::unique('users')->ignore($user->id)],
            'pan_number'=>['nullable','numeric'],
            'city'=>['nullable','string','max:255'],
            'address'=>['nullable','string','max:255'],
            'bank_id'=>['nullable'],
            'account_number'=>['nullable','numeric',Rule::unique('users')->ignore($user->id)],
            'account_name'=>['nullable','string','max:255']
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'company_name'=>$input['company_name'],
                'pan_number'=>$input['pan_number'],
                'city'=>$input['city'],
                'address'=>$input['address'],
                'account_number'=>$input['account_number'],
                'bank_id'=>$input['bank_id'],
                'contact'=>$input['contact'],
                'account_name'=>$input['account_name']
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
