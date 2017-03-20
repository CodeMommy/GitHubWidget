<!DOCTYPE html>
<html>
<head>
    <title>{$title}</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet"
          href="{$cache}http://www.codemommy.com/static/vendor/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            overflow-x: hidden;
        }

        ul, li {
            list-style: none;
            margin: 0;
            padding: 0;
        }
    </style>
    {block name=header}{/block}
</head>
<body>
{block name=body}{/block}
{block name=footer}{/block}
</body>
</html>