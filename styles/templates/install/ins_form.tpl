{include file="ins_header.tpl"}
<tr>
	<td class="left">
	<div id="main">
		<h2>{$LNG.step1_head}</h2>
		<div class="separateur"></div>
		<p>{$LNG.step1_desc}</p>
	</div>
		<form action="index.php?mode=install&step=4" method="post"> 
		<input type="hidden" name="post" value="1">
		<table class="flatTable">
			<tr class="titleTr">
			    <td class="titleTd">{$LNG.step1_titre}</td>
			    <td colspan="4"></td>
	  		</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step1_mysql_server}</p></td>
				<td class="transparent"><input type="text" name="host" value="{$smarty.get.host|escape:'htmlall'|default:'localhost'}" size="30"></td>
			</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step1_mysql_port}</p></td>
				<td class="transparent"><input type="text" name="port" value="{$smarty.get.port|escape:'htmlall'|default:'3306'}" size="30"></td>
			</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step1_mysql_dbuser}</p></td>
				<td class="transparent"><input type="text" name="user" value="{$smarty.get.user|escape:'htmlall'|default:''}" size="30"></td>
			</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step1_mysql_dbpass}</p></td>
				<td class="transparent"><input type="password" name="passwort" value="" size="30"></td>
			</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step1_mysql_dbname}</p></td>
				<td class="transparent"><input type="text" name="dbname" value="{$smarty.get.dbname|escape:'htmlall'|default:''}" size="30"></td>
			</tr>
			<tr>
				<td class="transparent left"><p>{$LNG.step1_mysql_prefix}</p></td>
				<td class="transparent"><input type="text" name="prefix" value="{$smarty.get.prefix|escape:'htmlall'|default:'uni1_'}" size="30"></td>
			</tr>
		</table>
		<div class="line">
            <input type="submit" name="next" value="{$LNG.continue}">
        	</div>
		</form>
	</td>
</tr>
{include file="ins_footer.tpl"}