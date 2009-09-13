USAGE
=====
-Obtain your XML key from text-link-ads.com

-Add the following code to global.php in your theme or plugin

require_once(_BASEPLUGINDIR.'/jojo_text_link_ads/jojo_text_link_ads.php');
$xmlkey = 'YOUR-XML-KEY-HERE';
$smarty->assign('textlinkads',getTextLinkAds($xmlkey));

-Add the following code to your template file
{if $textlinkads}
<ul>
{section name=t loop=$textlinkads}
<li><a href="{$textlinkads[t].url}" target="_BLANK">{$textlinkads[t].text}</a></li>
{/section}
</ul>
{/if}

You can assign several ad groups by giving each group a different name when assigning to Smarty.
For one-page ads, you may need to use an if statement to restrict where the code appears. eg...
{if $pageid==1}....{/if} (for the homepage)
{if $pg_url=='contact'}....{/if} (for the contact page)