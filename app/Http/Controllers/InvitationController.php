<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvitationRequest;
use App\Mail\ColocationInvitationMail;
use App\Models\Colocation;
use App\Models\Invitation;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    /**
     * Display invitations for the user's active colocation
     */
    public function index()
    {
        $user = FacadesAuth::user();
        // Get the first/active colocation for this user
        $colocation = $user->colocations()->first();

        if (!$colocation) {
            return redirect()->route('user.dashboard')->with('error', 'You need to create or join a colocation first.');
        }


        return view('invitations.dashboard', compact('colocation'));
    }
    public function store(StoreInvitationRequest $req, Colocation $colocation)
    {
        $invitation = Invitation::Create(
            [
                'colocation_id' => $colocation->id,
                'email' => $req->email,
                'token' => Str::uuid(),

                'status' => 'pending',

            ]
        );

        Mail::to($invitation->email)->send(new ColocationInvitationMail($invitation));

        return redirect()
            ->route('invitations.index')->with('succses', "invitation envoyer");
    }
    /**
     * Show a pending invitation with accept/decline buttons
     */
    public function show(string $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        if ($invitation->expires_at && now()->gt($invitation->expires_at)) {
            return abort(410, 'Invitation expired');
        }

        return view('invitations.show', compact('invitation'));
    }

    public function accept(string $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        // verify status + expiration
        if ($invitation->status !== 'pending') {
            return redirect('/')->with('error', 'This invitation is not available anymore.');
        }

        if ($invitation->expires_at && now()->gt($invitation->expires_at)) {
            $invitation->update(['status' => 'expired']);
            return redirect('/')->with('error', 'Invitation expired.');
        }

        // must login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Login first to accept the invitation.');
        }

        // security: email in invitation must match logged user
        if (Auth::user()->email !== $invitation->email) {
            abort(403, 'This invitation is not for your account.');
        }

        // attach user to colocation (pivot)
        $invitation->colocation->members()->syncWithoutDetaching([
            Auth::id() => [
                'role' => $invitation->role ?? 'member',
                'joined_at' => now(),
            ]
        ]);

        $invitation->update([
            'status' => 'accepted',
            'accepted_at' => now(),
        ]);

        return redirect()->route('user.dashboard')
            ->with('success', 'Invitation accepted 🎉');
    }

    public function decline(string $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        // if expired/past
        if ($invitation->expires_at && now()->gt($invitation->expires_at)) {
            $invitation->update(['status' => 'expired']);
            return redirect('/')->with('error', 'Invitation expired.');
        }

        // optional: require login for decline too (recommended)
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Login first to refuse the invitation.');
        }

        if (Auth::user()->email !== $invitation->email) {
            abort(403, 'This invitation is not for your account.');
        }

        $invitation->update(['status' => 'cancelled']); // ولا 'declined' إذا بغيتي

        return redirect()->route('user.dashboard')
            ->with('success', 'Invitation refused.');
    }
}
