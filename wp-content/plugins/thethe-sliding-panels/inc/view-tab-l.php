<fieldset>
  <legend>Main Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="l[is_active]">Active: </label>
      <input name="l[is_active]" type="checkbox" value="true" <?php echo ($options['l']['is_active']) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to activate a <strong><em>Left Sliding Panel</em></strong>.  This will also activate the <em>Left Sliding Panel</em> widget area.</span></a> </li>
    <li>
      <label for="l[cookiesName]">Suppressing Cookie: </label>
      <input type="text" name="l[cookiesName]" class="str-field" value="<?php echo $options['l']['cookiesName'];?>" />
      <a class="tooltip" href="#">?<span>Enter the cookie name, existence of which will suppress opening of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Window Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="l[width]">Width: </label>
      <input type="text" maxlength="4" name="l[width]" value="<?php echo $options['l']['width'];?>" />&nbsp;&nbsp;px
<?php /*?>      <select disabled="disabled">
        <option selected value="px"> px&nbsp; </option>
      </select>
<?php */?>      <a class="tooltip" href="#">?<span>Specify the default width of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="l[height]">Height: </label>
      <input type="text" maxlength="4" name="l[height]" value="<?php echo $options['l']['height'];?>" />
      <select name="l[heightUnit]">
        <option <?php echo ($options['l']['heightUnit'] == 'px') ?  ' selected' : '';?> value="px"> px&nbsp; </option>
        <option <?php echo ($options['l']['heightUnit'] == '%') ?  ' selected' : '';?> value="%"> % </option>
      </select>
      <a class="tooltip" href="#">?<span>Specify the default height of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="l[speed]">Sliding Speed: </label>
      <input type="text" maxlength="4" name="l[speed]" value="<?php echo $options['l']['speed'];?>" />&nbsp;&nbsp;ms
      <a class="tooltip" href="#">?<span>Specify the default sliding speed of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Panel Style</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="l[theme]">Color Scheme: </label>
      <select name="l[theme]" class="text-field">
        <?php foreach ($ttsp_themes as $l) { $selected='';?>
        <?php if ($options['l']['theme'] == $l) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $l?>"><?php echo $l?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select the color scheme of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="l[bgColor]">Background Color: </label>
      <input type="text" class="pickcolor" maxlength="7" name="l[bgColor]" value="<?php echo $options['l']['bgColor'];?>" />      
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Left Sliding Panel's</em></strong> background color. This will overwrite the selected color scheme's settings.</span></a></li>
    <li>
      <label for="l[opacity]">Background Opacity: </label>
      <input type="text" maxlength="2" name="l[opacity]" value="<?php echo $options['l']['opacity'];?>" />&nbsp;&nbsp;%
      <a class="tooltip" href="#">?<span>Specify the opacity percentage for the <strong><em>Left Sliding Panel</em></strong> background. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="l[borderWidth]">Border Width: </label>
      <input type="text" maxlength="1" name="l[borderWidth]" value="<?php echo $options['l']['borderWidth'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the Border Width for the <strong><em>Left Sliding Panel</em></strong>. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="l[borderColor]">Border Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="l[borderColor]" value="<?php echo $options['l']['borderColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Left Sliding Panel's</em></strong> border color. This will overwrite the selected color scheme's settings.</span></a> </li>      
    <li>
      <label for="l[textColor]">Text Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="l[textColor]" value="<?php echo $options['l']['textColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Left Sliding Panel's</em></strong> text color. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li><strong>CSS3 Styles</strong></li>
    <li>
      <label for="l[radius]">Panel Corners Radius: </label>
      <input type="text" maxlength="2" name="l[radius]" value="<?php echo $options['l']['radius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Left Sliding Panel's</em></strong> corner radiuses in px.</span></a> </li>
    <li>
      <label for="l[tabRadius]">Tab Corners Radius: </label>
      <input type="text" maxlength="2" name="l[tabRadius]" value="<?php echo $options['l']['tabRadius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Left Sliding Panel's</em></strong> tab corner radiuses in px.</span></a></li>
    <li>
      <label for="l[shadowSize]">Shadow Size: </label>
      <input type="text" maxlength="2" name="l[shadowSize]" value="<?php echo $options['l']['shadowSize'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Left Sliding Panel's</em></strong> shadow size in px.</span></a> </li>
    <li>
      <label for="l[shadowColor]">Shadow Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="l[shadowColor]" value="<?php echo $options['l']['shadowColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Left Sliding Panel's</em></strong> shadow color.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Opening Parameters</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="l[firstVisitShow]">Show on First Visit: </label>      
      <input type="hidden" name="l[firstVisitShow]" value="false" />      
      <input name="l[firstVisitShow]" type="checkbox" value="true" <?php echo ($options['l']['firstVisitShow'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to open the <strong><em>Modal Window</em></strong> on a visitor's first pageview.</span></a> </li>
    <li>
      <label for="l[regularity]">Then Regularly: </label>
      <select name="l[regularity]" style="width:110px;">
        <?php foreach ($ttsp_regularity as $r) { $selected='';?>
        <?php if ($options['l']['regularity'] == $r['value']) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $r['value']?>"><?php echo $r['title']?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select how often to show the <strong><em>Modal Window</em></strong> to each visitor (controled with cookies).</span></a></li>
    <li>
      <label for="l[autoOpen]">Auto-Open: </label>
      <input type="hidden" name="l[autoOpen]" value="false" />
      <input name="l[autoOpen]" type="checkbox" value="true" <?php echo ($options['l']['autoOpen'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Left Sliding Panel</em></strong> open automatically.</span></a> </li>
    <li>
      <label for="l[autoClose]">Auto-Close: </label>
      <input type="hidden" name="l[autoClose]" value="false" />
      <input name="l[autoClose]" type="checkbox" value="true" <?php echo ($options['l']['autoClose'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Left Sliding Panel</em></strong> close automatically.</span></a> </li>
    <li>
      <label for="l[openIn]">Open In: </label>
      <input type="text" name="l[openIn]" value="<?php echo $options['l']['openIn'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to open the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="l[closeAfter]">Close After: </label>
      <input type="text" name="l[closeAfter]" value="<?php echo $options['l']['closeAfter'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to close the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Buttons Options</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="l[showTab]">Show Tab: </label>
      <input type="hidden" name="l[showTab]" value="false" />
      <input name="l[showTab]" type="checkbox" value="true" <?php echo ($options['l']['showTab'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the tab of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="l[tabText]">Tab Text: </label>
      <input type="text" class="str-field" name="l[tabText]" value="<?php echo $options['l']['tabText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the tab of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="l[showCloseButton]">Show 'Close' Button: </label>
      <input type="hidden" name="l[showCloseButton]" value="false" />
      <input name="l[showCloseButton]" type="checkbox" value="true" <?php echo ($options['l']['showCloseButton'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the 'Close' button of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="l[closeButtonText]">Close Button Text: </label>
      <input type="text" class="str-field" name="l[closeButtonText]" value="<?php echo $options['l']['closeButtonText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the 'Close' button of the <strong><em>Left Sliding Panel</em></strong>.</span></a> </li>
    <li>
      <label for="l[backLink]"> Linkback to Developer: </label>
      <input type="hidden" name="l[backLink]" value="false" />            
      <input name="l[backLink]" type="checkbox" value="true" <?php echo ($options['l']['backLink'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to display a backlink to the plugin home page.</span></a> </li>      
  </ul>
</fieldset>