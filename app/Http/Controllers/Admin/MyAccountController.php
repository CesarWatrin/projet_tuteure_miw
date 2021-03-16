<?php
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\MyAccountController as BackpackMyAccountController;
use Backpack\CRUD\app\Http\Requests\AccountInfoRequest;

class MyAccountController extends BackpackMyAccountController
{
    public function getAccountInfoForm()
    {
        $this->data['title'] = trans('backpack::base.my_account');
        $this->data['user'] = $this->guard()->user();

        return view('backpack.my_account', $this->data);
    }

    /**
     * Save the modified personal information for a user.
     */
    public function postAccountInfoForm(AccountInfoRequest $request)
    {
        // TODO mettre à jour les données du profil admin
         $result = $this->guard()->user()->update($request->except(['_token']));

        if ($result) {
            Alert::success(trans('backpack::base.account_updated'))->flash();
        } else {
            Alert::error(trans('backpack::base.error_saving'))->flash();
        }

        return redirect()->back();
    }
}
