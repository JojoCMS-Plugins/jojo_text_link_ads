{if $textlinkads && $pageid==1}
<ul>
{section name=t loop=$textlinkads}
  <li><a href="{$textlinkads[t].url}" target="_BLANK">{$textlinkads[t].text}</a></li>
{/section}
</ul>
{/if}