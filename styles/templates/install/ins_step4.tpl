{include file="ins_header.tpl"}
<tr>
	<td colspan="2">
		{nocache}
		<div id="main" class="left">
			<h2>{$LNG.step4_titre_ok}</h2>
			<div class="separateur"></div>
			<p>{$message}</p>
		</div>
			{if $class == 'noerror'}
			<div class="line">
				<a class="read-more" href="index.php?mode=install&step=5">{$LNG.continue}</a>
			</div>
			{else}
			<div class="line">
				{nocache}<a class="read-more" href="index.php?mode=install&step=3&amp;host={$host}&amp;port={$port}&amp;user={$user}&amp;dbname={$dbname}&amp;prefix={$prefix}">{/nocache}{$LNG.back}</a>
			</div>
			{/if}
		</div>{/nocache}
	</td>
</tr>
{include file="ins_footer.tpl"}