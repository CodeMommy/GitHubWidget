{extends file='../base/base.tpl'}
{block name=main}
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
    <iframe src="/widget/members/laravel"></iframe>
{/block}