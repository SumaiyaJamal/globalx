<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Message</title>
</head>
<body style="margin:0;padding:0;background:#f4f8fc;font-family:Arial,Helvetica,sans-serif;color:#0d1b2a;">
    <div style="max-width:720px;margin:0 auto;padding:24px;">
        <div style="background:#ffffff;border:1px solid #dde8f0;border-radius:12px;padding:22px;">
            <h2 style="margin:0 0 14px;font-size:18px;">New Contact Form Submission</h2>

            <table cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                <tr>
                    <td style="padding:10px 0;width:160px;color:#3d5166;font-size:13px;"><strong>Name</strong></td>
                    <td style="padding:10px 0;font-size:13px;">{{ ($data['first_name'] ?? '') }} {{ ($data['last_name'] ?? '') }}</td>
                </tr>
                <tr>
                    <td style="padding:10px 0;color:#3d5166;font-size:13px;"><strong>Email</strong></td>
                    <td style="padding:10px 0;font-size:13px;">{{ $data['email'] ?? '' }}</td>
                </tr>
                @if(!empty($data['phone']))
                <tr>
                    <td style="padding:10px 0;color:#3d5166;font-size:13px;"><strong>Phone</strong></td>
                    <td style="padding:10px 0;font-size:13px;">{{ $data['phone'] }}</td>
                </tr>
                @endif
                <tr>
                    <td style="padding:10px 0;color:#3d5166;font-size:13px;"><strong>Subject</strong></td>
                    <td style="padding:10px 0;font-size:13px;">{{ $data['subject'] ?? '' }}</td>
                </tr>
                <tr>
                    <td style="padding:10px 0;color:#3d5166;font-size:13px;vertical-align:top;"><strong>Message</strong></td>
                    <td style="padding:10px 0;font-size:13px;white-space:pre-wrap;line-height:1.6;">{{ $data['message'] ?? '' }}</td>
                </tr>
            </table>

            <hr style="border:none;border-top:1px solid #dde8f0;margin:18px 0;">
            <div style="font-size:12px;color:#7a91a8;">
                Sent from your website contact form.
            </div>
        </div>
    </div>
</body>
</html>

