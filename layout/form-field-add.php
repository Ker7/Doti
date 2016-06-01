<?php 

/* Form Fieldide lisamiseks
 */

echo '
  <form class="form-inline" action="?'.$Keskus->_field_ADDED.'=1" method="post" role="form">
    <div class="form-group">
      <label for="infname">Field name</label>
      <input type="text" class="form-control" id="inputFieldName" name="inputFieldName" placeholder="Anything">
    </div>

    <div class="form-group">
      <label for="sel1">Colour:</label>
      <select class="form-control" id="selectColor" name="selectColor">
        <option>Acid Green</option>
        <option>Aero</option>
        <option>Aero Blue</option>
        <option>African Violet</option>
        <option>Alabaster</option>
        <option>Alien Armpit</option>
        <option>Almond</option>
        <option>Amaranth Pink</option>
        <option>Amazonite</option>
        <option>Amber</option>
        <option>Antique Brass</option>
        <option>...</option>
      </select>
    </div>
    <button type="submit" class="btn btn-default">Create</button>
  </form>'

?>
