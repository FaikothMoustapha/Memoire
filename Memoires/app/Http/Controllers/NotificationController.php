<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
   public function index()
    {
        $notifications = Auth::user()->notifications;
        return view('directeur.notification.projet_creer', compact('notifications'));
    }
    public function resp()
    {
        $notifications = Auth::user()->notifications;
        return view('responsable.notification.projet_affecter', compact('notifications'));
    }
    public function chef()
    {
        $notifications = Auth::user()->notifications;
        return view('chefProjet.notification.projet_affecter', compact('notifications'));
    }
    public function markAllAsRead()
    {
        $user = Auth::user();

        if ($user) {
            $user->unreadNotifications->markAsRead(); // uniquement les non lues
            return redirect()->back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
        }

        return redirect()->back()->with('error', 'Utilisateur non authentifié.');
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
