<fieldset> 
  <legend>Main Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="t[is_active]">Active: </label>
      <input name="t[is_active]" type="checkbox" value="true" <?php echo ($options['t']['is_active']) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to activate a <strong><em>Top Sliding Panel</em></strong>.  This will also activate the <em>Top Sliding Panel</em> widget area.</span></a> </li>
    <li>
      <label for="t[cookiesName]">Suppressing Cookie: </label>
      <input type="text" name="t[cookiesName]" class="str-field" value="<?php echo $options['t']['cookiesName'];?>" />
      <a class="tooltip" href="#">?<span>Enter the cookie name, existence of which will suppress opening of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Window Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="t[width]">Width: </label>
      <input type="text" maxlength="4" name="t[width]" value="<?php echo $options['t']['width'];?>" />
      <select name="t[widthUnit]">
        <option <?php echo ($options['t']['widthUnit'] == 'px') ?  ' selected' : '';?> value="px"> px&nbsp; </option>
        <option <?php echo ($options['t']['widthUnit'] == '%') ?  ' selected' : '';?> value="%"> % </option>
      </select>
      <a class="tooltip" href="#">?<span>Specify the default width of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="t[height]">Height: </label>
      <input type="text" maxlength="4" name="t[height]" value="<?php echo $options['t']['height'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the default height of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="t[speed]">Sliding Speed: </label>
      <input type="text" maxlength="4" name="t[speed]" value="<?php echo $options['t']['speed'];?>" />&nbsp;&nbsp;ms
      <a class="tooltip" href="#">?<span>Specify the default sliding speed of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Panel Style</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="t[theme]">Color Scheme: </label>
      <select name="t[theme]" class="text-field">
        <?php foreach ($ttsp_themes as $t) { $selected='';?>
        <?php if ($options['t']['theme'] == $t) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $t?>"><?php echo $t?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select the color scheme of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="t[bgColor]">Background Color: </label>
      <input type="text" class="pickcolor" maxlength="7" name="t[bgColor]" value="<?php echo $options['t']['bgColor'];?>" />      
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Top Sliding Panel's</em></strong> background color. This will overwrite the selected color scheme's settings.</span></a></li>
    <li>
      <label for="t[opacity]">Background Opacity: </label>
      <input type="text" maxlength="2" name="t[opacity]" value="<?php echo $options['t']['opacity'];?>" />&nbsp;&nbsp;%
      <a class="tooltip" href="#">?<span>Specify the opacity percentage for the <strong><em>Top Sliding Panel</em></strong> background. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="t[borderWidth]">Border Width: </label>
      <input type="text" maxlength="1" name="t[borderWidth]" value="<?php echo $options['t']['borderWidth'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the Border Width for the <strong><em>Top Sliding Panel</em></strong>. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="t[borderColor]">Border Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="t[borderColor]" value="<?php echo $options['t']['borderColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Top Sliding Panel's</em></strong> border color. This will overwrite the selected color scheme's settings.</span></a> </li>      
    <li>
      <label for="t[textColor]">Text Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="t[textColor]" value="<?php echo $options['t']['textColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Top Sliding Panel's</em></strong> text color. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li><strong>CSS3 Styles</strong></li>
    <li>
      <label for="t[radius]">Panel Corners Radius: </label>
      <input type="text" maxlength="2" name="t[radius]" value="<?php echo $options['t']['radius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Top Sliding Panel's</em></strong> corner radiuses in px.</span></a> </li>
    <li>
      <label for="t[tabRadius]">Tab Corners Radius: </label>
      <input type="text" maxlength="2" name="t[tabRadius]" value="<?php echo $options['t']['tabRadius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Top Sliding Panel's</em></strong> tab corner radiuses in px.</span></a></li>
    <li>
      <label for="t[shadowSize]">Shadow Size: </label>
      <input type="text" maxlength="2" name="t[shadowSize]" value="<?php echo $options['t']['shadowSize'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Top Sliding Panel's</em></strong> shadow size in px.</span></a> </li>
    <li>
      <label for="t[shadowColor]">Shadow Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="t[shadowColor]" value="<?php echo $options['t']['shadowColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Top Sliding Panel's</em></strong> shadow color.</span></a> </li>      
  </ul>
</fieldset>
<fieldset>
  <legend>Opening Parameters</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="t[firstVisitShow]">Show on First Visit: </label>
      <input type="hidden" name="t[firstVisitShow]" value="false" />
      <input name="t[firstVisitShow]" type="checkbox" value="true" <?php echo ($options['t']['firstVisitShow'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to open the <strong><em>Modal Window</em></strong> on a visitor's first pageview.</span></a> </li>
    <li>
      <label for="t[regularity]">Then Regularly: </label>
      <select name="t[regularity]" style="width:110px;">
        <?php foreach ($ttsp_regularity as $r) { $selected='';?>
        <?php if ($options['t']['regularity'] == $r['value']) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $r['value']?>"><?php echo $r['title']?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select how often to show the <strong><em>Modal Window</em></strong> to each visitor (controled with cookies).</span></a></li>  
    <li>
      <label for="t[autoOpen]">Auto-Open: </label>
      <input type="hidden" name="t[autoOpen]" value="false" />
      <input name="t[autoOpen]" type="checkbox" value="true" <?php echo ($options['t']['autoOpen'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Top Sliding Panel</em></strong> open automatically.</span></a> </li>
    <li>
      <label for="t[autoClose]">Auto-Close: </label>
      <input type="hidden" name="t[autoClose]" value="false" />
      <input name="t[autoClose]" type="checkbox" value="true" <?php echo ($options['t']['autoClose'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Top Sliding Panel</em></strong> close automatically.</span></a> </li>
    <li>
      <label for="t[openIn]">Open In: </label>
      <input type="text" name="t[openIn]" value="<?php echo $options['t']['openIn'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to open the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="t[closeAfter]">Close After: </label>
      <input type="text" name="t[closeAfter]" value="<?php echo $options['t']['closeAfter'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to close the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Buttons Options</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="t[showTab]">Show Tab: </label>
      <input type="hidden" name="t[showTab]" value="false" />
      <input name="t[showTab]" type="checkbox" value="true" <?php echo ($options['t']['showTab'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the tab of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="t[tabText]">Tab Text: </label>
      <input type="text" class="str-field" name="t[tabText]" value="<?php echo $options['t']['tabText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the tab of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="t[showCloseButton]">Show 'Close' Button: </label>
      <input type="hidden" name="t[showCloseButton]" value="false" />
      <input name="t[showCloseButton]" type="checkbox" value="true" <?php echo ($options['t']['showCloseButton'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the 'Close' button of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="t[closeButtonText]">Close Button Text: </label>
      <input type="text" class="str-field" name="t[closeButtonText]" value="<?php echo $options['t']['closeButtonText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the 'Close' button of the <strong><em>Top Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="t[backLink]"> Linkback to Developer: </label>
      <input type="hidden" name="t[backLink]" value="false" />            
      <input name="t[backLink]" type="checkbox" value="true" <?php echo ($options['t']['backLink'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to display a backlink to the plugin home page.</span></a> </li>      
  </ul>
</fieldset>
