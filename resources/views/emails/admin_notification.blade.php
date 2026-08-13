<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Contact — Muhammad Bin Imran</title>
  <meta name="color-scheme" content="light dark">
  <meta name="supported-color-schemes" content="light dark">
  <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
  <style>
    @media (prefers-color-scheme: dark){
      .dark\:bg{background:#0B0E14 !important;}
    }
  </style>
</head>
<body style="margin:0;padding:0;background:#0B0E14;-webkit-text-size-adjust:100%;">
  <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;mso-hide:all;">
    New contact request from {{ $contact->name }} — {{ $contact->subject }}
  </div>
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#0B0E14;background-image:linear-gradient(180deg,#0B0E14 0%,#0E1320 100%);">
    <tr>
      <td align="center" style="padding:28px 12px;">
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;background:#121726;border-radius:18px;border:1px solid rgba(255,255,255,.06);box-shadow:0 30px 70px rgba(0,0,0,.45);overflow:hidden;">
          <!-- HEADER -->
          <tr>
            <td style="padding:30px 34px 22px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td style="font-family:'Space Grotesk',Arial,Helvetica,sans-serif;font-size:17px;font-weight:700;color:#E9ECF1;letter-spacing:-.01em;">
                    muhammadbinimran<span style="color:#565F72;font-weight:500;">.online</span>
                  </td>
                  <td align="right" style="font-family:'JetBrains Mono','Courier New',monospace;font-size:11px;color:#FF8A4C;letter-spacing:.12em;">
                    NEW CONTACT
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- TOP ACCENT STRIP -->
          <tr>
            <td style="height:3px;background:linear-gradient(90deg,#FF8A4C,#5EEAD4);font-size:0;line-height:3px;">&nbsp;</td>
          </tr>

          <!-- HERO -->
          <tr>
            <td style="padding:34px 34px 26px;">
              <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td style="width:42px;height:42px;background:rgba(255,138,76,.14);border-radius:12px;text-align:center;vertical-align:middle;">
                    <span style="font-family:'Space Grotesk',Arial;font-weight:700;font-size:18px;color:#FF8A4C;">!</span>
                  </td>
                  <td style="width:14px;">&nbsp;</td>
                  <td valign="middle">
                    <span style="font-family:'JetBrains Mono','Courier New',monospace;font-size:11px;color:#FF8A4C;letter-spacing:.14em;text-transform:uppercase;">Contact form</span>
                  </td>
                </tr>
              </table>
              <h1 style="margin:16px 0 10px;font-family:'Space Grotesk',Arial,Helvetica,sans-serif;font-size:26px;line-height:1.2;font-weight:700;color:#E9ECF1;letter-spacing:-.01em;">New contact request from {{ $contact->name }}</h1>
              <p style="margin:0;font-family:Inter,Arial,Helvetica,sans-serif;font-size:14.5px;line-height:1.7;color:#8B93A6;">A visitor submitted the contact form on your site — details are below. Reply as soon as you can.</p>
            </td>
          </tr>

          <!-- SENDER INFO -->
          <tr>
            <td style="padding:0 34px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.05);border-radius:14px;">
                <tr>
                  <td style="padding:18px 20px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td valign="middle" style="width:40px;">
                          <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width:40px;height:40px;background:rgba(94,234,212,.12);border-radius:50%;">
                            <tr><td align="center" style="font-family:'Space Grotesk',Arial;font-weight:700;font-size:17px;color:#5EEAD4;">{{ strtoupper(substr($contact->name, 0, 1)) }}</td></tr>
                          </table>
                        </td>
                        <td style="width:14px;">&nbsp;</td>
                        <td>
                          <span style="font-family:Inter,Arial,Helvetica,sans-serif;font-size:15px;font-weight:600;color:#E9ECF1;">{{ $contact->name }}</span>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0 20px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td style="padding:12px 0;border-top:1px solid rgba(255,255,255,.06);">
                          <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                              <td style="font-family:'JetBrains Mono','Courier New',monospace;font-size:10.5px;letter-spacing:.1em;color:#565F72;text-transform:uppercase;width:80px;">Email</td>
                              <td style="font-family:Inter,Arial,Helvetica,sans-serif;font-size:14px;color:#5EEAD4;word-break:break-all;">{{ $contact->email }}</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0 20px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td style="padding:12px 0;border-top:1px solid rgba(255,255,255,.06);">
                          <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                              <td style="font-family:'JetBrains Mono','Courier New',monospace;font-size:10.5px;letter-spacing:.1em;color:#565F72;text-transform:uppercase;width:80px;">Subject</td>
                              <td style="font-family:Inter,Arial,Helvetica,sans-serif;font-size:14px;font-weight:600;color:#E9ECF1;">{{ $contact->subject }}</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0 20px 18px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td style="padding:12px 0 0;border-top:1px solid rgba(255,255,255,.06);">
                          <span style="font-family:'JetBrains Mono','Courier New',monospace;font-size:10.5px;letter-spacing:.1em;color:#565F72;text-transform:uppercase;">Message</span>
                        </td>
                      </tr>
                      <tr>
                        <td style="font-family:Inter,Arial,Helvetica,sans-serif;font-size:14.5px;line-height:1.75;color:#C4CAD6;white-space:pre-wrap;background:rgba(255,255,255,.015);border:1px solid rgba(255,255,255,.04);border-radius:10px;padding:14px 16px;margin-top:8px;">{{ $contact->message }}</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- CTA -->
          <tr>
            <td style="padding:26px 34px 8px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td align="center" style="background:linear-gradient(90deg,#FF8A4C,#FFB08A);border-radius:10px;padding:0;">
                    <a href="mailto:{{ $contact->email }}" style="display:inline-block;width:100%;text-decoration:none;font-family:'Space Grotesk',Arial,Helvetica,sans-serif;font-size:14px;font-weight:700;color:#0B0B0B;padding:14px 24px;letter-spacing:.01em;">Reply to {{ $contact->email }}</a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- DIVIDER -->
          <tr>
            <td style="padding:24px 34px 0;"><div style="border-top:1px solid rgba(255,255,255,.06);"></div></td>
          </tr>

          <!-- FOOTER -->
          <tr>
            <td style="padding:18px 34px 30px;">
              <p style="margin:0;font-family:Inter,Arial,Helvetica,sans-serif;font-size:12.5px;line-height:1.6;color:#565F72;">Reference <span style="font-family:'JetBrains Mono','Courier New',monospace;color:#8B93A6;">#{{ str_pad($contact->id, 4, '0', STR_PAD_LEFT) }}</span> · Received from muhammadbinimran.online contact form.</p>
            </td>
          </tr>
        </table>
        <p style="margin:18px 0 0;font-family:Inter,Arial,Helvetica,sans-serif;font-size:11.5px;color:#3A4154;text-align:center;">muhammadbinimran.online — Laravel &amp; Go backend development</p>
      </td>
    </tr>
  </table>
</body>
</html>
