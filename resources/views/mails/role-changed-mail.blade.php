<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Change Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
            text-transform: uppercase;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #999;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>Hello, {{ $user->name }}!</h1>
        
        <p>We are excited to inform you that your role has been successfully updated to:</p>
        @if ($user->role == "Clerk")
            <p class="highlight">Clerk</p>
        @elseif ($user->role == "UnitHead")
            <p class="highlight">Extension Unit Head</p>
        @elseif ($user->role == "User")
            <p class="highlight">User</p>
        @elseif ($user->role == "Admin")
            <p class="highlight">System Administrator</p>
        @else
            <p class="highlight">{{ $user->role }}</p>
        @endif
       
        <p>If you have any questions regarding this change or need further assistance, please do not hesitate to contact our support team.</p>
        
        <p>Thank you for being a part of our system!</p>
        
        <p>Best regards,</p>
        <p><strong>PIT-RIES </strong></p>
        
        <div class="footer">
            <p>If you did not request this change, please contact us immediately at pitreisnoreply@gmail.com.</p>
            <p>&copy; {{ date('Y') }} PIT-RIES. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
