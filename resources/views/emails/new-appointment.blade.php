<!DOCTYPE html>
<html>
<body style="font-family: sans-serif; color: #353638;">
    <h2>New Appointment Request</h2>
    <p><strong>Name:</strong> {{ $appointment->name }}</p>
    <p><strong>Phone:</strong> {{ $appointment->phone }}</p>
    @if($appointment->email)
        <p><strong>Email:</strong> {{ $appointment->email }}</p>
    @endif
    @if($appointment->service)
        <p><strong>Service:</strong> {{ $appointment->service->title }}</p>
    @endif
    @if($appointment->preferred_date)
        <p><strong>Preferred date:</strong> {{ $appointment->preferred_date->format('d M Y') }} {{ $appointment->preferred_time }}</p>
    @endif
    @if($appointment->message)
        <p><strong>Message:</strong><br>{{ $appointment->message }}</p>
    @endif
    <p style="color: #a8a8a8; font-size: 12px;">Submitted at {{ $appointment->created_at->format('d M Y, h:i A') }}</p>
</body>
</html>
