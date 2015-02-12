{include file="ins_header.tpl"}
<tr>
	<td class="left">
	<div id="main">
		<h2>{$LNG.step4_head}</h2>
		<div class="separateur"></div>
		<p>{$LNG.step4_desc}</p>
	</div>
		<form action="index.php?mode=install&step=8" method="post"> 
		<input type="hidden" name="post" value="1">
		<table class="flatTable">
			<tr class="titleTr">
			    <td class="titleTd">{$LNG.step4_titre}</td>
			    <td colspan="4"></td>
	  		</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step4_admin_name}</p><p class="desc">{$LNG.step4_admin_name_desc}</p></td>
				<td class="transparent"><input type="text" name="username" value="" size="30"></td>
			</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step4_admin_pass}</p><p class="desc">{$LNG.step4_admin_pass_desc}</p></td>
				<td class="transparent"><input type="password" name="password" value="" size="30"></td>
			</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step4_admin_mail}</p></td>
				<td class="transparent"><input type="text" name="email" value="" size="30"></td>
			</tr>
		</table>
		<div class="line">
			<input type="submit" name="next" value="{$LNG.continue}">
		</div>
		</form>
	</td>
</tr>
{include file="ins_footer.tpl"}