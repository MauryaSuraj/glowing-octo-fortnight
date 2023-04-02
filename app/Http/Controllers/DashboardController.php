<?php

namespace App\Http\Controllers;

use App\Http\Services\Decode;
use App\Http\Services\Encode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\QuoteCreated;
use Notification;

class DashboardController extends Controller
{
    public function testfunction(){

        // $users = User::factory()->count(3)->create();
        // dd($users);

        // $user = User::find(2);
        // $quote['quotename'] = 'Lorem tets name';
        // $quote['id'] = rand();
        // $quote['created_by'] = rand();
        // $quote['action_performed'] = "Url changed";
 
        // Notification::send($user, new QuoteCreated($quote));

// foreach ($user->notifications as $notification) {
//     echo "<pre>";
//     $notification->markAsRead();
//     print_r($notification->data);
//     echo "</pre>";
// }
// echo count($user->unreadNotifications);
// $user->notifications()->delete();
// foreach ($user->unreadNotifications as $notification) {
//     echo "<pre>";
//     print_r($notification->data);
//     echo "</pre>";
    // $notification->markAsRead();
    // die();
// }
// "submitbutton" => "encyption"

        // return 'some';
    }

    public function encdec(Request $request){
        $data = null;
        
        if($request->getMethod() == 'POST'){
            if($request->submitbutton ==  'encryption'){
                $data = Encode::enc($request->stringtest);
            }elseif($request->submitbutton ==  'decryption'){
                $data = Decode::dec($request->stringtest);
            }
        }

        return view('encdep')->with('data', $data);
    }

}
