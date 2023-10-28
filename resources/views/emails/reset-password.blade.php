<x-email-layout>
    <tr>
        <td class="content-cell"
            style="word-break: break-word; font-family: &quot;Nunito Sans&quot;, Helvetica, Arial, sans-serif; font-size: 16px; padding: 35px;">
            <div class="f-fallback">
                <h1 style="margin-top: 0; color: #333333; font-size: 22px; font-weight: bold; text-align: left;"
                    align="left">Hello {{ isset($username) ? $username : '' }}!</h1>
                <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
                    We have received a request to reset the password for your account. If
                    you did not initiate this request, please disregard this email.</p>
                <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
                    To reset your password, please click on the link below:</p>
                {{-- <p
                style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
                <a href="{{ isset($url) ? $url : '' }}" rel="noopener"
                    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; position: relative; border-radius: 4px; color: rgba(255, 255, 255, 1); display: inline-block; overflow: hidden; text-decoration: none; background-color: rgba(45, 55, 72, 1); border-bottom: 8px solid rgba(45, 55, 72, 1); border-left: 18px solid rgba(45, 55, 72, 1); border-right: 18px solid rgba(45, 55, 72, 1); border-top: 8px solid rgba(45, 55, 72, 1)">Reset
                    Password</a>
            </p> --}}
                <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
                    <a href="{{ isset($url) ? $url : '' }}" target="_blank">{{ isset($url) ? $url : '' }}</a>
                </p>
                {{-- <p
            style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
            This password reset link will expire in
            {{ isset($count) ? $count : '' }} minutes.
        </p> --}}
                <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
                    You will be directed to a page where you can create a new password.</p>

                <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
                    If you have any questions or concerns, please contact us.
                </p>
                <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
                    Best Regards,
                </p>
                <p style="font-size: 16px; line-height: 1.625; color: #51545E; margin: .4em 0 1.1875em;">
                    {{ config('app.name', 'Laravel') }}</p>
            </div>
        </td>
    </tr>
</x-email-layout>
