<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function FooterSetup()
    {
        $footerpage = Footer::find(1);
        return view('admin.footer.footer_all', compact('footerpage'));
    }

    public function FooterUpdate(Request $request)
    {
        $footer_id = $request->id;

        Footer::findOrFail($footer_id)->update([
            'number' => $request->number,
            'address' => $request->address,
            'short_description' => $request->short_description,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'copyright' => $request->copyright,
            'twitter' => $request->twitter,
        ]);

        $notification = array(
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
