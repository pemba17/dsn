<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RequestFacebookAd;
use Livewire\WithPagination;

class RequestFacebookAdTable extends Component
{
    use WithPagination;
    public function render()
    {
        $fb_ads=RequestFacebookAd::has('user')->with('user')->orderBy('id','desc')->paginate(10);
        return view('livewire.request-facebook-ad-table',compact('fb_ads'));
    }
}
