<fieldset>
  <legend>Main Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="b[is_active]">Active: </label>
      <input name="b[is_active]" type="checkbox" value="true" <?php echo ($options['b']['is_active']) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to activate a <strong><em>Bottom Sliding Panel</em></strong>.  This will also activate the <em>Bottom Sliding Panel</em> widget area.</span></a> </li>
    <li>
      <label for="b[cookiesName]">Suppressing Cookie: </label>
      <input type="text" name="b[cookiesName]" class="str-field" value="<?php echo $options['b']['cookiesName'];?>" />
      <a class="tooltip" href="#">?<span>Enter the cookie name, existence of which will suppress opening of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Window Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="b[width]">Width: </label>
      <input type="text" maxlength="4" name="b[width]" value="<?php echo $options['b']['width'];?>" />
      <select name="b[widthUnit]">
        <option <?php echo ($options['b']['widthUnit'] == 'px') ?  ' selected' : '';?> value="px"> px&nbsp; </option>
        <option <?php echo ($options['b']['widthUnit'] == '%') ?  ' selected' : '';?> value="%"> % </option>
      </select>
      <a class="tooltip" href="#">?<span>Specify the default width of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="b[height]">Height: </label>
      <input type="text" maxlength="4" name="b[height]" value="<?php echo $options['b']['height'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the default height of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="b[speed]">Sliding Speed: </label>
      <input type="text" maxlength="4" name="b[speed]" value="<?php echo $options['b']['speed'];?>" />&nbsp;&nbsp;ms
      <a class="tooltip" href="#">?<span>Specify the default sliding speed of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Panel Style</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="b[theme]">Color Scheme: </label>
      <select name="b[theme]" class="text-field">
        <?php foreach ($ttsp_themes as $b) { $selected='';?>
        <?php if ($options['b']['theme'] == $b) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $b?>"><?php echo $b?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select the color scheme of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="b[bgColor]">Background Color: </label>
      <input type="text" class="pickcolor" maxlength="7" name="b[bgColor]" value="<?php echo $options['b']['bgColor'];?>" />      
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Bottom Sliding Panel's</em></strong> background color. This will overwrite the selected color scheme's settings.</span></a></li>
    <li>
      <label for="b[opacity]">Background Opacity: </label>
      <input type="text" maxlength="2" name="b[opacity]" value="<?php echo $options['b']['opacity'];?>" />&nbsp;&nbsp;%
      <a class="tooltip" href="#">?<span>Specify the opacity percentage for the <strong><em>Bottom Sliding Panel</em></strong> background. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="b[borderWidth]">Border Width: </label>
      <input type="text" maxlength="1" name="b[borderWidth]" value="<?php echo $options['b']['borderWidth'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the Border Width for the <strong><em>Bottom Sliding Panel</em></strong>. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="b[borderColor]">Border Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="b[borderColor]" value="<?php echo $options['b']['borderColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Bottom Sliding Panel's</em></strong> border color. This will overwrite the selected color scheme's settings.</span></a> </li>      
    <li>
      <label for="b[textColor]">Text Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="b[textColor]" value="<?php echo $options['b']['textColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Bottom Sliding Panel's</em></strong> text color. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li><strong>CSS3 Styles</strong></li>
    <li>
      <label for="b[radius]">Panel Corners Radius: </label>
      <input type="text" maxlength="2" name="b[radius]" value="<?php echo $options['b']['radius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Bottom Sliding Panel's</em></strong> corner radiuses in px.</span></a> </li>
    <li>
      <label for="b[tabRadius]">Tab Corners Radius: </label>
      <input type="text" maxlength="2" name="b[tabRadius]" value="<?php echo $options['b']['tabRadius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Bottom Sliding Panel's</em></strong> tab corner radiuses in px.</span></a></li>
    <li>
      <label for="b[shadowSize]">Shadow Size: </label>
      <input type="text" maxlength="2" name="b[shadowSize]" value="<?php echo $options['b']['shadowSize'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Bottom Sliding Panel's</em></strong> shadow size in px.</span></a> </li>
    <li>
      <label for="b[shadowColor]">Shadow Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="b[shadowColor]" value="<?php echo $options['b']['shadowColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Bottom Sliding Panel's</em></strong> shadow color.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Opening Parameters</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="b[firstVisitShow]">Show on First Visit: </label>      
      <input type="hidden" name="b[firstVisitShow]" value="false" />      
      <input name="b[firstVisitShow]" type="checkbox" value="true" <?php echo ($options['b']['firstVisitShow'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to open the <strong><em>Modal Window</em></strong> on a visitor's first pageview.</span></a> </li>
    <li>
      <label for="b[regularity]">Then Regularly: </label>
      <select name="b[regularity]" style="width:110px;">
        <?php foreach ($ttsp_regularity as $r) { $selected='';?>
        <?php if ($options['b']['regularity'] == $r['value']) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $r['value']?>"><?php echo $r['title']?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select how often to show the <strong><em>Modal Window</em></strong> to each visitor (controled with cookies).</span></a></li>  
    <li>
      <label for="b[autoOpen]">Auto-Open: </label>
      <input type="hidden" name="b[autoOpen]" value="false" />
      <input name="b[autoOpen]" type="checkbox" value="true" <?php echo ($options['b']['autoOpen'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Bottom Sliding Panel</em></strong> open automatically.</span></a> </li>
    <li>
      <label for="b[autoClose]">Auto-Close: </label>
      <input type="hidden" name="b[autoClose]" value="false" />
      <input name="b[autoClose]" type="checkbox" value="true" <?php echo ($options['b']['autoClose'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Bottom Sliding Panel</em></strong> close automatically.</span></a> </li>
    <li>
      <label for="b[openIn]">Open In: </label>
      <input type="text" name="b[openIn]" value="<?php echo $options['b']['openIn'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to open the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="b[closeAfter]">Close After: </label>
      <input type="text" name="b[closeAfter]" value="<?php echo $options['b']['closeAfter'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to close the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Buttons Options</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="b[showTab]">Show Tab: </label>
      <input type="hidden" name="b[showTab]" value="false" />
      <input name="b[showTab]" type="checkbox" value="true" <?php echo ($options['b']['showTab'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the tab of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="b[tabText]">Tab Text: </label>
      <input type="text" class="str-field" name="b[tabText]" value="<?php echo $options['b']['tabText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the tab of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="b[showCloseButton]">Show 'Close' Button: </label>
      <input type="hidden" name="b[showCloseButton]" value="false" />
      <input name="b[showCloseButton]" type="checkbox" value="true" <?php echo ($options['b']['showCloseButton'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the 'Close' button of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="b[closeButtonText]">Close Button Text: </label>
      <input type="text" class="str-field" name="b[closeButtonText]" value="<?php echo $options['b']['closeButtonText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the 'Close' button of the <strong><em>Bottom Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="b[backLink]"> Linkback to Developer: </label>
      <input type="hidden" name="b[backLink]" value="false" />            
      <input name="b[backLink]" type="checkbox" value="true" <?php echo ($options['b']['backLink'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to display a backlink to the plugin home page.</span></a> </li>      
  </ul>
</fieldset>