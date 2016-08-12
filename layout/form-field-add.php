<?php 

/* Form Fieldide lisamiseks
 */

echo '


  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-doti btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

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
        <form class="form-inline" action="?'.$Keskus->_field_ADDED.'=1" method="post" role="form">
          <div class="form-group">
            
              <div>Choose a browser from this list:</div>
              <input list="browsers" id="selectField" name="selectField" />
              <datalist id="browsers">
              <!-- Query and make list here, example:
                 -->
                <option value="Chrome">Kromosoom</option>
                <option value="Firefox">aFiira</option>
                <option value="Internet Explorer">Esp</option>
                <option value="Opera">oosa</option>
                <option value="Safari">fafa</option>
                
                <option value="1Chrome">
                <option value="1Firefox">
                <option value="1Internet Explorer">
                <option value="1Opera">
                <option value="1Safari">
                 
                 
              </datalist>
              
          </div>
      
          <div class="form-group">
            <label for="sel1">Choose a color:</label>
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
          <button type="submit" class="btn btn-success">Create</button>
        </form>
      <!-- ################ FROM END ################ -->
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
      <!-- &&&&&&&&&&&&
      
      Test confirm button
      This is not working as the final delete button has no effect :/
      
      &&&&&&&&&&&&&&& -->
      <button type="button" class="btn btn-warning" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete">Shit pants</button>
<!-- &&&&&&&&&&&& Test confirm button &&&&&&&&&&&&&&& -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                    <p>You are about to delete one track, this procedure is irreversible.</p>
                    <p>Do you want to proceed?</p>
                    <p class="debug-url"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
  
  '
?>
