{extends file='../base/base.tpl'}
{block name=main}
    <!DOCTYPE html>
    <html>
    <head>
        <title>{$title}</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <style>
            body {
                margin: 0;
            }

            iframe {
                border: 1px solid #ccc;
                border-left: none;
                border-top: none;
                width: 260px;
                height: 460px;
            }
        </style>
    </head>
    <body>
    <iframe src="{$root}widget/members/laravel"></iframe>
    </body>
    </html>
{/block}