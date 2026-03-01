<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invitation</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f6f7fb; padding:24px;">
    <div
        style="max-width:560px; margin:0 auto; background:#fff; border-radius:16px; padding:24px; border:1px solid #e7e9f1;">
        <h2 style="margin:0 0 12px;">Invitation to join a colocation</h2>

        <p style="margin:0 0 16px; color:#444;">
            Hello,<br>
            You have been invited to join <b>{{ $invitation->colocation->name ?? 'a colocation' }}</b>.
        </p>

        <div style="margin:20px 0; display:flex; gap:12px;">
            <a href="{{ $acceptUrl }}"
                style="display:inline-block; padding:12px 18px; background:#4f46e5; color:#fff; text-decoration:none; border-radius:12px; font-weight:700;">
                Accept
            </a>

            <a href="{{ $declineUrl }}"
                style="display:inline-block; padding:12px 18px; background:#ef4444; color:#fff; text-decoration:none; border-radius:12px; font-weight:700;">
                Refuse
            </a>
        </div>

        <p style="margin:0; color:#666; font-size:13px;">
            If you didn’t request this, you can ignore this email.
        </p>
    </div>
</body>

</html>
