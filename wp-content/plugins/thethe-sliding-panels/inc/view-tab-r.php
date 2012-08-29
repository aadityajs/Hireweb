<fieldset>
  <legend>Main Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="r[is_active]">Active: </label>
      <input name="r[is_active]" type="checkbox" value="true" <?php echo ($options['r']['is_active']) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to activate a <strong><em>Right Sliding Panel</em></strong>.  This will also activate the <em>Right Sliding Panel</em> widget area.</span></a> </li>
    <li>
      <label for="r[cookiesName]">Suppressing Cookie: </label>
      <input type="text" name="r[cookiesName]" class="str-field" value="<?php echo $options['r']['cookiesName'];?>" />
      <a class="tooltip" href="#">?<span>Enter the cookie name, existence of which will suppress opening of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Window Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="r[width]">Width: </label>
      <input type="text" maxlength="4" name="r[width]" value="<?php echo $options['r']['width'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the default width of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="r[height]">Height: </label>
      <input type="text" maxlength="4" name="r[height]" value="<?php echo $options['r']['height'];?>" />
      <select name="r[heightUnit]">
        <option <?php echo ($options['r']['heightUnit'] == 'px') ?  ' selected' : '';?> value="px"> px&nbsp; </option>
        <option <?php echo ($options['r']['heightUnit'] == '%') ?  ' selected' : '';?> value="%"> % </option>
      </select>
      <a class="tooltip" href="#">?<span>Specify the default height of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="r[speed]">Sliding Speed: </label>
      <input type="text" maxlength="4" name="r[speed]" value="<?php echo $options['r']['speed'];?>" />&nbsp;&nbsp;ms
      <a class="tooltip" href="#">?<span>Specify the default sliding speed of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Panel Style</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="r[theme]">Color Scheme: </label>
      <select name="r[theme]" class="text-field">
        <?php foreach ($ttsp_themes as $r) { $selected='';?>
        <?php if ($options['r']['theme'] == $r) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $r?>"><?php echo $r?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select the color scheme of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="r[bgColor]">Background Color: </label>
      <input type="text" class="pickcolor" maxlength="7" name="r[bgColor]" value="<?php echo $options['r']['bgColor'];?>" />      
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Right Sliding Panel's</em></strong> background color. This will overwrite the selected color scheme's settings.</span></a></li>
    <li>
      <label for="r[opacity]">Background Opacity: </label>
      <input type="text" maxlength="2" name="r[opacity]" value="<?php echo $options['r']['opacity'];?>" />&nbsp;&nbsp;%
      <a class="tooltip" href="#">?<span>Specify the opacity percentage for the <strong><em>Right Sliding Panel</em></strong> background. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="r[borderWidth]">Border Width: </label>
      <input type="text" maxlength="1" name="r[borderWidth]" value="<?php echo $options['r']['borderWidth'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the Border Width for the <strong><em>Right Sliding Panel</em></strong>. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="r[borderColor]">Border Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="r[borderColor]" value="<?php echo $options['r']['borderColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Right Sliding Panel's</em></strong> border color. This will overwrite the selected color scheme's settings.</span></a> </li>      
    <li>
      <label for="r[textColor]">Text Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="r[textColor]" value="<?php echo $options['r']['textColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Right Sliding Panel's</em></strong> text color. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li><strong>CSS3 Styles</strong></li>
    <li>
      <label for="r[radius]">Panel Corners Radius: </label>
      <input type="text" maxlength="2" name="r[radius]" value="<?php echo $options['r']['radius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Right Sliding Panel's</em></strong> corner radiuses in px.</span></a> </li>
    <li>
      <label for="r[tabRadius]">Tab Corners Radius: </label>
      <input type="text" maxlength="2" name="r[tabRadius]" value="<?php echo $options['r']['tabRadius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Right Sliding Panel's</em></strong> tab corner radiuses in px.</span></a></li>
    <li>
      <label for="r[shadowSize]">Shadow Size: </label>
      <input type="text" maxlength="2" name="r[shadowSize]" value="<?php echo $options['r']['shadowSize'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Right Sliding Panel's</em></strong> shadow size in px.</span></a> </li>
    <li>
      <label for="r[shadowColor]">Shadow Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="r[shadowColor]" value="<?php echo $options['r']['shadowColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Right Sliding Panel's</em></strong> shadow color.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Opening Parameters</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="r[firstVisitShow]">Show on First Visit: </label>
      <input type="hidden" name="r[firstVisitShow]" value="false" />         
      <input name="r[firstVisitShow]" type="checkbox" value="true" <?php echo ($options['r']['firstVisitShow'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to open the <strong><em>Modal Window</em></strong> on a visitor's first pageview.</span></a> </li>
    <li>
      <label for="r[regularity]">Then Regularly: </label>
      <select name="r[regularity]" style="width:110px;">
        <?php foreach ($ttsp_regularity as $r) { $selected='';?>
        <?php if ($options['r']['regularity'] == $r['value']) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $r['value']?>"><?php echo $r['title']?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select how often to show the <strong><em>Modal Window</em></strong> to each visitor (controled with cookies).</span></a></li>  
    <li>
      <label for="r[autoOpen]">Auto-Open: </label>
      <input type="hidden" name="r[autoOpen]" value="false" />
      <input name="r[autoOpen]" type="checkbox" value="true" <?php echo ($options['r']['autoOpen'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Right Sliding Panel</em></strong> open automatically.</span></a> </li>
    <li>
      <label for="r[autoClose]">Auto-Close: </label>
      <input type="hidden" name="r[autoClose]" value="false" />
      <input name="r[autoClose]" type="checkbox" value="true" <?php echo ($options['r']['autoClose'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Right Sliding Panel</em></strong> close automatically.</span></a> </li>
    <li>
      <label for="r[openIn]">Open In: </label>
      <input type="text" name="r[openIn]" value="<?php echo $options['r']['openIn'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to open the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="r[closeAfter]">Close After: </label>
      <input type="text" name="r[closeAfter]" value="<?php echo $options['r']['closeAfter'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to close the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Buttons Options</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="r[showTab]">Show Tab: </label>
      <input type="hidden" name="r[showTab]" value="false" />
      <input name="r[showTab]" type="checkbox" value="true" <?php echo ($options['r']['showTab'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the tab of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="r[tabText]">Tab Text: </label>
      <input type="text" class="str-field" name="r[tabText]" value="<?php echo $options['r']['tabText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the tab of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="r[showCloseButton]">Show 'Close' Button: </label>
      <input type="hidden" name="r[showCloseButton]" value="false" />
      <input name="r[showCloseButton]" type="checkbox" value="true" <?php echo ($options['r']['showCloseButton'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the 'Close' button of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="r[closeButtonText]">Close Button Text: </label>
      <input type="text" class="str-field" name="r[closeButtonText]" value="<?php echo $options['r']['closeButtonText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the 'Close' button of the <strong><em>Right Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="r[backLink]"> Linkback to Developer: </label>
      <input type="hidden" name="r[backLink]" value="false" />            
      <input name="r[backLink]" type="checkbox" value="true" <?php echo ($options['r']['backLink'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to display a backlink to the plugin home page.</span></a> </li>      
  </ul>
</fieldset>