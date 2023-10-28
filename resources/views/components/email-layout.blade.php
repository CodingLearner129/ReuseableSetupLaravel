<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<x-email-head></x-email-head>

<body
    style="width: 100% !important; height: 100%; -webkit-text-size-adjust: none; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; background-color: #F4F4F7; color: #51545E; margin: 0;"
    bgcolor="#F4F4F7">
    <!-- <span class="preheader" style="display: none !important; visibility: hidden; mso-hide: all; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; opacity: 0; overflow: hidden;"></span> -->
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background-color: #F4F4F7; margin: 0; padding: 0;"
        bgcolor="#F4F4F7">
        <tr>
            <td align="center"
                style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px;">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation"
                    style="width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; margin: 0; padding: 0;">
                    <!-- Load View: Email Main Header -->
                    <tr>
                        <td class="email-masthead"
                            style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; padding: 25px 0;"
                            align="center">
                            <a href="#" class="f-fallback email-masthead_name"
                                style="color: #A8AAAF; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">{{ config('app.name', 'Laravel') }}</a>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td class="email-body" width="100%" cellpadding="0" cellspacing="0"
                            style="word-break: break-word; margin: 0; padding: 0; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; width: 100%; -premailer-width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background-color: #FFFFFF;"
                            bgcolor="#FFFFFF">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0"
                                cellspacing="0" role="presentation"
                                style="width: 570px; -premailer-width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background-color: #FFFFFF; margin: 0 auto; padding: 0;"
                                bgcolor="#FFFFFF">
                                <!-- Body content -->
                                {{ $slot }}
                            </table>
                        </td>
                    </tr>
                    <!-- Load View: Email Footer -->
                    <x-email-footer></x-email-footer>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
