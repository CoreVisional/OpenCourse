<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OpenCourse</title>
    </head>
    <body style="font-family: Arial, sans-serif; background-color: #f5f5f5;">
        <div style="text-align: center;">
            <a href="{{ route('contact.show') }}"
               style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block; margin: 25px 0;">
                OpenCourse
            </a>
        </div>

        <div
            style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
            <p style="text-align: center; font-size: 24px; font-weight: bold; margin-bottom: 35px;">You've Got Mail!</p>

            <div style="margin-bottom: 10px;">
                <h2 style="font-size: 18px; font-weight: bold; color: #333333;">Message:</h2>
                <p style="font-size: 16px; margin: 0; color: #666666;">
                    {{ $emailContent }}
                </p>
            </div>
        </div>
    </body>
</html>
