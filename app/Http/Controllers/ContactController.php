<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Mail\NewAppointmentNotification;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('pages.contact', compact('services'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create($request->validated());

        Mail::to(config('clinic.notification_email'))
            ->send(new NewAppointmentNotification($appointment));

        return back()->with('status', 'Thank you! We\'ve received your request and will call you shortly to confirm.');
    }
}
