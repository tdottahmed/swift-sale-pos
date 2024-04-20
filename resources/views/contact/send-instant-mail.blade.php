<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

        <!-- Header with Logo -->
        <div style="background-color: #4caf50; color: #fff; text-align: center; padding: 20px;">
            <h1 style="margin: 0;" {{env('APP_NAME')}}</h1>
        </div>

        <!-- Main Content -->
        <div style="padding: 20px;">
            <!-- Greeting Message -->
            <p style="font-size: 18px; color: #333; margin-bottom: 20px;">Dear {{ $recipientFirstName }},</p>

            <!-- Marketing Content -->
            <p style="font-size: 16px; color: #666; line-height: 1.6;">
                Thank you for being a valued customer of Your Company Name. We're excited to share with you our latest products and offers!
            </p><br>

            <p>{{$body}}</p>

            <!-- Button -->
            <div style="text-align: center; margin-top: 30px;">
                <a href="#" style="background-color: #4caf50; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">Shop Now</a>
            </div>

            <!-- Attachment Placeholder (Replace with actual attachment if available) -->
            @if($attachment)
                <div style="text-align: center; margin-top: 30px;">
                    <strong>Attachment:</strong> {{ $attachment->getClientOriginalName() }}
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div style="background-color: #4caf50; color: #fff; text-align: center; padding: 10px 0; font-size: 14px;">
            &copy; {{ date('Y') }} {{env('APP_NAME')}}. All rights reserved.
        </div>

    </div>

</body>
</html>
