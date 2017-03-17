{extends file='../base/base.tpl'}
{block name=main}
    <!DOCTYPE html>
    <html>
    <head>
        <title>GitHub Members</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet"
              href="//cache.shareany.com/?f=http://www.codemommy.com/static/vendor/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body{
                overflow-x: hidden;

            }
            ul, li {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            ul{
                margin-right:-10px;
            }
            li {
                float: left;
                margin-right: 10px;
                margin-bottom: 10px;
                text-align: center;
            }

            .avatar img {
                width: 80px;
                height: 80px;
            }

            .name {
                width: 80px;
                height: 20px;
                overflow: hidden;
                margin-top: 5px;
            }
        </style>

    </head>
    <body>
    <ul>
        {foreach from=$members item=member}
            <li>
                <div class="avatar"><a href="{$member['url']}" target="_blank"><img src="{$member['avatar']}" alt="{$member['name']}"></a></div>
                <div class="name"><a href="{$member['url']}" target="_blank">{$member['name']}</a></div>
            </li>
        {/foreach}
    </ul>
    </body>
    </html>
{/block}