<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    /**
     * Display email compose form and sent email history.
     */
    public function create()
    {
        // Get all registered customers
        $customers = User::where('role', 'customer')
            ->orderBy('name')
            ->get();

        // Get sent email history of the logged-in staff
        $sentEmails = DB::table('email_logs')
            ->where('staff_id', auth()->id())
            ->orderByDesc('sent_at')
            ->get();

        return view('staff.emails.create', compact(
            'customers',
            'sentEmails'
        ));
    }

    /**
     * Send email to a selected customer and save it to history.
     */
    public function send(Request $request)
    {
        // Validate form inputs
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Make sure the selected user is a customer
        $customer = User::where('id', $validated['customer_id'])
            ->where('role', 'customer')
            ->firstOrFail();

        // Check if customer has an email address
        if (empty($customer->email)) {
            return back()
                ->withInput()
                ->with('error', 'This customer has no registered email address.');
        }

        // Send the actual email
        try {
            Mail::raw($validated['message'], function ($mail) use ($customer, $validated) {
                $mail->to($customer->email, $customer->name)
                    ->subject($validated['subject']);
            });
        } catch (\Throwable $e) {
            Log::error('Staff email sending failed: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Email sending failed. Please check your email configuration.');
        }

        // Save successfully sent email to email_logs table
        try {
            DB::table('email_logs')->insert([
                'staff_id' => auth()->id(),
                'recipient_name' => $customer->name,
                'recipient_email' => $customer->email,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'sent_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Email was sent but history could not be saved: ' . $e->getMessage());

            return redirect()
                ->route('staff.emails.create')
                ->with('error', 'The email was sent, but its history could not be saved.');
        }

        // Return to email page with success message
        return redirect()
            ->route('staff.emails.create')
            ->with('success', 'Email successfully sent to ' . $customer->email);
    }
}