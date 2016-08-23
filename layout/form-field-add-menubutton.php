<?php 

/* Form Fieldide lisamiseks
 */

echo '


  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-default bluecol"  data-toggle="modal" data-target="#myModal">Add Fields</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a new Field</h4>
      </div>
      <div class="modal-body">
        
      <!-- ################ FROM BEGIN ################ -->
        <form class="form-inline" action="#" method="post" role="form">
          <div class="form-group">
              
              <input type="hidden" id="'.$Keskus->_field_ADDED.'" name="'.$Keskus->_field_ADDED.'" value="1" />
              
              <label for="inputFieldName">Name:</label>
              <input id="inputFieldName" class="form-control" name="inputFieldName" />
              
          </div>
      
          <div class="form-group">
            <label for="inputSelectFieldColor">Choose a color:</label>
            <select class="form-control" id="inputSelectFieldColor" name="inputSelectFieldColor"  onchange="colourFunction()">

<option value="#00FFFF">Aqua</option>
<option value="#0000FF">Blue</option>
<option value="#00FFFF">Cyan</option>
<option value="#006400">DarkGreen</option>
<option value="#8B008B">DarkMagenta</option>
<option value="#556B2F">DarkOliveGreen</option>
<option value="#FF8C00">DarkOrange</option>
<option value="#FFD700">Gold</option>
<option value="#DAA520">GoldenRod</option>
<option value="#FFFFF0">Ivory</option>
<option value="#F0E68C">Khaki</option>
<option value="#E6E6FA">Lavender</option>
<option value="#FFA07A">LightSalmon</option>
<option value="#00FF00">Lime</option>
<option value="#32CD32">LimeGreen</option>
<option value="#FFA500">Orange</option>
<option value="#FFC0CB">Pink</option>
<option value="#DDA0DD">Plum</option>
<option value="#B0E0E6">PowderBlue</option>
<option value="#800080">Purple</option>
<option value="#FF0000">Red</option>
<option value="#F5DEB3">Wheat</option>
<option value="#FFFFFF">White</option>
<option value="#F5F5F5">WhiteSmoke</option>
<option value="#FFFF00">Yellow</option>
<option value="#9ACD32">YellowGreen</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success field-create-btn">Create</button>
        </form>
      <!-- ################ FROM END ################ -->
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
  
  '
?>
