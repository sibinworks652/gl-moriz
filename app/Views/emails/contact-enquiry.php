<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Enquiry</title>
</head>
<body style="margin:0;padding:0;background:#f4f7fb;font-family:Arial,Helvetica,sans-serif;color:#1f2a37;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f7fb;margin:0;padding:28px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:640px;background:#ffffff;border-radius:8px;overflow:hidden;border:1px solid #e3e8ef;">
                    <tr>
                        <td style="background:#1f6f9f;padding:24px 28px;color:#ffffff;">
                            <div style="font-size:13px;letter-spacing:.08em;text-transform:uppercase;opacity:.9;margin:0 auto;text-align:center;"><img src="<?= base_url('web/assets/images/moriz-logo-mail.png') ?>" width="40%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px;">
                        <h3 style="margin:8px 0 0;font-size:18px;line-height:1.3;font-weight:700; margin-bottom:10px;">New Contact Enquiry</h3>
                            <p style="margin:0 0 22px;font-size:15px;line-height:1.6;color:#4b5563;">
                                A visitor submitted the contact form. Their details are below.
                            </p>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #edf1f5;width:140px;color:#64748b;font-size:13px;">Name</td>
                                    <td style="padding:12px 0;border-bottom:1px solid #edf1f5;font-size:15px;font-weight:600;"><?= esc($data['first_name'] . ' ' . $data['last_name']) ?></td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #edf1f5;color:#64748b;font-size:13px;">Email</td>
                                    <td style="padding:12px 0;border-bottom:1px solid #edf1f5;font-size:15px;">
                                        <a href="mailto:<?= esc($data['email']) ?>" style="color:#1f6f9f;text-decoration:none;"><?= esc($data['email']) ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #edf1f5;color:#64748b;font-size:13px;">Phone</td>
                                    <td style="padding:12px 0;border-bottom:1px solid #edf1f5;font-size:15px;">
                                        <a href="tel:<?= esc($data['phone']) ?>" style="color:#1f6f9f;text-decoration:none;"><?= esc($data['phone']) ?></a>
                                    </td>
                                </tr>
                                <?php if (! empty($data['page'])): ?>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #edf1f5;color:#64748b;font-size:13px;">Page</td>
                                    <td style="padding:12px 0;border-bottom:1px solid #edf1f5;font-size:15px;">
                                        <a href="<?= esc($data['page']) ?>" style="color:#1f6f9f;text-decoration:none;"><?= esc($data['page']) ?></a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </table>

                            <div style="margin-top:24px;">
                                <div style="margin-bottom:8px;color:#64748b;font-size:13px;">Message</div>
                                <div style="background:#f8fafc;border:1px solid #e3e8ef;border-radius:8px;padding:16px;font-size:15px;line-height:1.7;color:#1f2a37;">
                                    <?= nl2br(esc($data['message'])) ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:18px 28px;background:#f8fafc;color:#64748b;font-size:12px;line-height:1.5;">
                            This message was sent from the Moriz website contact form.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
