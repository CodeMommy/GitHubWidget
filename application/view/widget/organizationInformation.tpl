{extends file='../base/widget.tpl'}
{block name=body}
    <div class="media">
        <div class="media-left">
            <a href="{$data['url']}" title="{$data['name']}" target="_blank">
                <img class="media-object" src="{$cache}{$data['avatar']}" alt="{$data['name']}">
            </a>
        </div>
        <div class="media-body">
            <a href="{$data['url']}" title="{$data['name']}" target="_blank">
                <h4 class="media-heading">{$data['name']}</h4>
            </a>
            {$data['about']}
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