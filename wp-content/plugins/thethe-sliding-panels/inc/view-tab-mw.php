<fieldset>
  <legend>Main Settings</legend>
  <ul class="thethe-settings-list"> 
    <li>
      <label for="m[is_active]">Active: </label>
      <input name="m[is_active]" type="checkbox" value="true" <?php echo ($options['m']['is_active']) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to activate a <strong><em>Modal Window</em></strong>. This will also activate the <em>Modal Window</em> widget area.</span></a> </li>
    <li>
      <label for="m[cookiesName]">Suppressing Cookie: </label>
      <input type="text" name="m[cookiesName]" class="str-field" value="<?php echo $options['m']['cookiesName'];?>" />
      <a class="tooltip" href="#">?<span>Enter the cookie name, existence of which will suppress opening of the <strong><em>Modal Window</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Window Settings</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="m[width]">Width: </label>
      <input type="text" maxlength="4" name="m[width]" value="<?php echo $options['m']['width'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the default width of the <strong><em>Modal Window</em></strong>.</span></a> </li>
    <li>
      <label for="m[height]">Height: </label>
      <input type="text" maxlength="4" name="m[height]" value="<?php echo $options['m']['height'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the default height of the <strong><em>Modal Window</em></strong>.</span></a> </li>
    <li>
      <label for="m[center]">Centred: </label>
      <input type="hidden" name="m[center]" value="false" />
      <input name="m[center]" type="checkbox" value="true" <?php echo ($options['m']['center'] == "true") ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to center the <strong><em>Modal Window</em></strong>.</span></a>      
    </li>
    <li>
      <label for="m[top]">Position Top:</label>
      <input type="text" name="m[top]" maxlength="4" value="<?php echo $options['m']['top'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Set the <em>top</em> position of the <strong><em>Modal Window</em></strong>. Ignored if <q>Centred</q> has been checked.</span></a>
    </li>
    <li>
      <label for="m[left]">Position Left:</label>
      <input type="text" name="m[left]" maxlength="4" value="<?php echo $options['m']['left'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Set the <em>left</em> position of the <strong><em>Modal Window</em></strong>. Ignored if <q>Centred</q> has been checked.</span></a>      
    </li>
    <li>
      <label for="m[right]">Position Right:</label>
      <input type="text" name="m[right]" maxlength="4" value="<?php echo $options['m']['right'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Set the <em>right</em> position of the <strong><em>Modal Window</em></strong>. Ignored if <q>Centred</q> has been checked.</span></a>      
    </li>
    <li>
      <label for="m[bottom]">Position Bottom:</label>
      <input type="text" name="m[bottom]" maxlength="4" value="<?php echo $options['m']['bottom'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Set the <em>bottom</em> position of the <strong><em>Modal Window</em></strong>. Ignored if <q>Centred</q> has been checked.</span></a>      
    </li>
    <li>
      <label for="m[effect]">Effect: </label>
      <select name="m[effect]" style="width:110px;">
        <option <?php echo ($options['m']['effect'] == "slideUp") ? 'selected' : '';?> value="slideUp">Slide Up</option>
        <option <?php echo ($options['m']['effect'] == "slideDown") ? 'selected' : '';?> value="slideDown">Slide Down</option>
        <option <?php echo ($options['m']['effect'] == "slideLeft") ? 'selected' : '';?> value="slideLeft">Slide Left</option>
        <option <?php echo ($options['m']['effect'] == "slideRight") ? 'selected' : '';?> value="slideRight">Slide Right</option>
        <option <?php echo ($options['m']['effect'] == "fadeIn") ? 'selected' : '';?> value="fadeIn">Fade In</option>
      </select>
      <a class="tooltip" href="#">?<span>Specify the default animation effect of the <strong><em>Modal Window</em></strong>.</span></a> </li>    
    <li>
      <label for="m[speed]">Effect Speed: </label>
      <input type="text" maxlength="4" name="m[speed]" value="<?php echo $options['m']['speed'];?>" />&nbsp;&nbsp;ms
      <a class="tooltip" href="#">?<span>Specify the default sliding speed of the <strong><em>Modal Window</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Panel Style</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="m[theme]">Color Scheme: </label>
      <select name="m[theme]" class="text-field">
        <?php foreach ($ttsp_themes as $m) { $selected='';?>
        <?php if ($options['m']['theme'] == $m) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $m?>"><?php echo $m?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select the color scheme of the <strong><em>Modal Window</em></strong>.</span></a> </li>
    <li>
      <label for="m[bgColor]">Background Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="m[bgColor]" value="<?php echo $options['m']['bgColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Modal Window</em></strong> background color. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="m[opacity]">Background Opacity: </label>
      <input type="text" maxlength="2" name="m[opacity]" value="<?php echo $options['m']['opacity'];?>" />&nbsp;&nbsp;%
      <a class="tooltip" href="#">?<span>Specify the opacity percentage for the <strong><em>Modal Window</em></strong> background.</span></a> </li>
    <li>
      <label for="m[overlayColor]">Overlay Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="m[overlayColor]" value="<?php echo $options['m']['overlayColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Modal Window's</em></strong> overlay color. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="m[overlayOpacity]">Overlay Opacity: </label>
      <input type="text" maxlength="2" name="m[overlayOpacity]" value="<?php echo $options['m']['overlayOpacity'];?>" />&nbsp;&nbsp;%
      <a class="tooltip" href="#">?<span>Specify the opacity percentage for the <strong><em>Modal Window's</em></strong> overlay.</span></a> </li>      
    <li>
      <label for="m[borderWidth]">Border Width: </label>
      <input type="text" maxlength="1" name="m[borderWidth]" value="<?php echo $options['m']['borderWidth'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Modal Window's</em></strong> Border Width. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li>
      <label for="m[borderColor]">Border Color: </label>
      <input type="text" maxlength="11" class="pickcolor" name="m[borderColor]" value="<?php echo $options['m']['borderColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Modal Window's</em></strong> border color. This will overwrite the selected color scheme's settings.</span></a> </li>      
    <li>
      <label for="m[textColor]">Text Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="m[textColor]" value="<?php echo $options['m']['textColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick <strong><em>Modal Window's</em></strong> text color. This will overwrite the selected color scheme's settings.</span></a> </li>
    <li><strong>CSS3 Styles</strong></li>
    <li>
      <label for="m[radius]">Window Corners Radius: </label>
      <input type="text" maxlength="2" name="m[radius]" value="<?php echo $options['m']['radius'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Modal Window's</em></strong> corner radiuses in px.</span></a> </li>
    <li>
      <label for="m[shadowSize]">Shadow Size: </label>
      <input type="text" maxlength="2" name="m[shadowSize]" value="<?php echo $options['m']['shadowSize'];?>" />&nbsp;&nbsp;px
      <a class="tooltip" href="#">?<span>Specify the <strong><em>Modal Window's</em></strong> shadow size in px.</span></a> </li>
    <li>
      <label for="m[shadowColor]">Shadow Color: </label>
      <input type="text" maxlength="7" class="pickcolor" name="m[shadowColor]" value="<?php echo $options['m']['shadowColor'];?>" />
      <a class="tooltip" href="#">?<span>Pick the <strong><em>Modal Window's</em></strong> shadow color.</span></a> </li>      
  </ul>
</fieldset>
<fieldset>
  <legend>Opening Parameters</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="m[firstVisitShow]">Show on First Visit: </label>
      <input type="hidden" name="m[firstVisitShow]" value="false" />      
      <input name="m[firstVisitShow]" type="checkbox" value="true" <?php echo ($options['m']['firstVisitShow'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to open the <strong><em>Modal Window</em></strong> on a visitor's first pageview.</span></a> </li>
    <li>
      <label for="m[regularity]">Then Regularly: </label>
      <select name="m[regularity]" style="width:110px;">
        <?php foreach ($ttsp_regularity as $r) { $selected='';?>
        <?php if ($options['m']['regularity'] == $r['value']) $selected = ' selected';?>
        <option <?php echo $selected;?> value="<?php echo $r['value']?>"><?php echo $r['title']?></option>
        <?php }?>
      </select>
      <a class="tooltip" href="#">?<span>Select how often to show the <strong><em>Modal Window</em></strong> to each visitor (controled with cookies).</span></a> </li>  
    <li>
      <label for="m[autoClose]">Auto-Close: </label>
      <input type="hidden" name="m[autoClose]" value="false" />
      <input name="m[autoClose]" type="checkbox" value="true" <?php echo ($options['m']['autoClose'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to make the <strong><em>Modal Window</em></strong> close automatically.</span></a> </li>
    <li>
      <label for="m[openIn]">Open In: </label>
      <input type="text" name="m[openIn]" value="<?php echo $options['m']['openIn'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to open the <strong><em>Modal Window</em></strong>.</span></a> </li>
    <li>
      <label for="m[closeAfter]">Close After: </label>
      <input type="text" name="m[closeAfter]" value="<?php echo $options['m']['closeAfter'];?>" />&nbsp;&nbsp;sec
      <a class="tooltip" href="#">?<span>Specify in how many seconds to close the <strong><em>Modal Window</em></strong>.</span></a> </li>
  </ul>
</fieldset>
<fieldset>
  <legend>Buttons Options</legend>
  <ul class="thethe-settings-list">
    <li>
      <label for="m[showCloseButton]">Show 'Close' Button: </label>
      <input type="hidden" name="m[showCloseButton]" value="false" />
      <input name="m[showCloseButton]" type="checkbox" value="true" <?php echo ($options['m']['showCloseButton'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to show the 'Close' button of the <strong><em>Modal Window</em></strong>.</span></a> </li>
    <li>
      <label for="m[closeButtonText]">Close Button Text: </label>
      <input type="text" class="str-field" name="m[closeButtonText]" value="<?php echo $options['m']['closeButtonText'];?>" />
      <a class="tooltip" href="#">?<span>Enter the text for the 'Close' button of the <strong><em>Modal Window</em></strong>.</span></a> </li>
    <li>
      <label for="m[backLink]"> Linkback to Developer: </label>
      <input type="hidden" name="m[backLink]" value="false" />            
      <input name="m[backLink]" type="checkbox" value="true" <?php echo ($options['m']['backLink'] == "true" ) ? 'checked' : '';?> />
      <a class="tooltip" href="#">?<span>Check this box to display a backlink to the plugin home page.</span></a> </li>
  </ul>
</fieldset>