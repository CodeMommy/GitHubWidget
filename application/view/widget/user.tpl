{extends file='../base/widget_base.tpl'}
{block name=main}
    <div class="media">
        <div class="media-left">
            <a href="{$user['url']}" title="{$user['name']}" target="_blank">
                <img class="media-object" src="{$cache}{$user['avatar']}" alt="{$user['name']}">
            </a>
        </div>
        <div class="media-body">
            <a href="{$user['url']}" title="{$user['name']}" target="_blank">
                <h4 class="media-heading">{$user['name']}</h4>
            </a>
            {$user['about']}
        </div>
    </div>
{/block}
{block name=header}
    <style>
        .media img {
            width: {$avatarSize}px;
            height: {$avatarSize}px;
        }
    </style>
{/block}