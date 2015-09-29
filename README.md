# cynoCloakMod
Enhanced version of the Cyno Cloak Mod by Tyr for the Eve Development Killboard.

This mod adds items indicating fitted cyno/cloak/entosis link modules directly in the kill list table. It is designed for EDK v4.2 and higher.


#### Changelog:

###### 13.12.2011, v0.1: 
- First release

###### 14.12.2011, v0.2: 
- Added settings page to configure if cyno/cloak should be shown or not
- changes to the killlisttable.tpl
- Added killlisttable.tpl to the folder for simple updating
- Added css file


###### 17.12.2011, v0.3:
- Added Support for simplified URLs

###### 20.07.2012, v0.4:
- Fixed a small bug with fitted mods not showing up - obviously the slot id for fitted items changed

###### 08.08.2012, v0.5:
- Included killlisttable.tpl again

###### 19.04.2014, v0.6:
- updated to work with EDK 4.2+

###### 17.07.1015, v.07
- added Entosis Links



### Installation

There are still some css issues depending on the used theme, especially with the width of the kill list table.
Extract the mod folder from this archive to /mods/. Backup your killlisttable.tpl file from /themes/yourtheme/templates/
and replace it with the one from this archive (only tested with default theme). If you're using a different theme and run
into errors or have already made custom changes to the tpl file, you have to manually add the following lines:

FIND:
```html
<!-- killlistable.tpl -->
```


INSERT AFTER:
```html
{if function_exists('getCynoList') && config::get('cc_cyno')}
	{$cynos = call_user_func('getCynoList')}	
{/if}
{if function_exists('getCloakList') && config::get('cc_cloak')}
	{$cloaks = call_user_func('getCloakList')}
{/if}
{if function_exists('getEntosisList') && config::get('cc_entosis')}
	{$entosises = call_user_func('getEntosisList')}
{/if}
```

---------------------------------

FIND:
```html
<td class="kl-shiptype" colspan="2">Ship type</td>
```

CHANGE TO:
```html
<td class="kl-shiptype" colspan="{if isset($cynos) || isset($cloaks) || isset($entosises)}3{else}2{/if}">Ship type</td>
```


---------------------------------
FIND:
```html
<td class="kb-table-imgcell">
	<img src='{$k.victimshipimage}' style="width: 32px; height: 32px; margin-bottom:-2px !important;" alt="" />
</td>
```

INSERT AFTER:
```html
{if isset($cynos) || isset($cloaks) || isset($entosises)}
	<td class="kl-cyno-cloak-mod{if isset($cloaks)} cloak{/if}{if isset($cynos)} cyno{/if}{if isset($entosises)} entosis{/if}">
		{if isset($cloaks)}
			<img src=https://image.eveonline.com/InventoryType/11370_32.png {if in_array($k.id, $cloaks)}style="opacity:1;"{/if} alt="" />
		{/if}
		{if isset($cynos)}
			<img src=https://image.eveonline.com/InventoryType/21096_32.png {if in_array($k.id, $cynos)}style="opacity:1;"{/if} alt="" />
		{/if}
        {if isset($entosises)}
			<img src=https://image.eveonline.com/InventoryType/34593_32.png {if in_array($k.id, $entosises)}style="opacity:1;"{/if} alt="" />
		{/if}
	</td>
{/if}
```


Cheers o/


Copyright @Tyranero, 2012.

Contact admin@stryke.de for more, donations always welcomed to 'Tyranero' ingame.

Enhanced by Salvoxia 2015
