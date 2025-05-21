<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
   public function index()
    {
        $notifications = Auth::user()->notifications;
        return view('directeur.notification', compact('notifications'));
    }

   public function markAsRead($id)
        {
            $notification = Auth::user()->notifications->firstWhere('id', $id);

            if ($notification) {
                $notification->markAsRead();
                return redirect()->back()->with('success', 'Notification marquée comme lue.');
            } else {
                return redirect()->back()->with('error', 'Notification non trouvée.');
            }
        }
    public function delete($id)
        {
            $notification = Auth::user()->notifications->firstWhere('id', $id);

            if ($notification) {
                $notification->delete();
                return redirect()->back()->with('success', 'Notification supprimée.');
            }

            return redirect()->back()->with('error', 'Notification non trouvée.');
        }

}
