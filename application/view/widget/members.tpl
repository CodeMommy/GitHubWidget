{extends file='../base/widget.tpl'}
{block name=body}
    <ul>
        {foreach from=$members item=member}
            <li>
                <div class="avatar">
                    <a href="{$member['url']}" target="_blank" title="{$member['name']}">
                        <img src="{$cache}{$member['avatar']}" alt="{$member['name']}">
                    </a>
                </div>
                <div class="name">
                    <a href="{$member['url']}" target="_blank" title="{$member['name']}">
                        {$member['name']}
                    </a>
                </div>
            </li>
        {/foreach}
    </ul>
{/block}
{block name=header}
    <style>
        ul {
            margin-right: -10px;
        }

        li {
            float: left;
            margin-right: 10px;
            margin-bottom: 10px;
            text-align: center;
        }

        .avatar img {
            width: {$avatarSize}px;
            height: {$avatarSize}px;
        }

        .name {
            width: {$avatarSize}px;
            height: 20px;
            overflow: hidden;
            margin-top: 5px;
        }
    </style>
{/block}