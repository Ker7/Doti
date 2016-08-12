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
        <form class="form-inline" action="?'.$Keskus->_field_ADDED.'=1" method="post" role="form">
          <div class="form-group">
            
              <label for="selectField">Name:</label>
              <input id="selectField" name="selectField" />
              
          </div>
      
          <div class="form-group">
            <label for="selectColor">Choose a color:</label>
            <select class="form-control" id="selectColor" name="selectColor"  onchange="colourFunction()">
<option value="#F0F8FF"><div class="colsnip" style="background-color:#F0F8FF;">&nbsp; </div> AliceBlue</option>
<option value="#FAEBD7">AntiqueWhite</option>
<option value="#00FFFF">Aqua</option>
<option value="#7FFFD4">Aquamarine</option>
<option value="#F0FFFF">Azure</option>
<option value="#F5F5DC">Beige</option>
<option value="#FFE4C4">Bisque</option>
<option value="#000000">Black</option>
<option value="#FFEBCD">BlanchedAlmond</option>
<option value="#0000FF">Blue</option>
<option value="#8A2BE2">BlueViolet</option>
<option value="#A52A2A">Brown</option>
<option value="#DEB887">BurlyWood</option>
<option value="#5F9EA0">CadetBlue</option>
<option value="#7FFF00">Chartreuse</option>
<option value="#D2691E">Chocolate</option>
<option value="#FF7F50">Coral</option>
<option value="#6495ED">CornflowerBlue</option>
<option value="#FFF8DC">Cornsilk</option>
<option value="#DC143C">Crimson</option>
<option value="#00FFFF">Cyan</option>
<option value="#00008B">DarkBlue</option>
<option value="#008B8B">DarkBlue</option>
<option value="#B8860B">DarkGoldenRod</option>
<option value="#A9A9A9">DarkGray</option>
<option value="#A9A9A9">DarkGrey</option>
<option value="#006400">DarkGreen</option>
<option value="#BDB76B">DarkKhaki</option>
<option value="#8B008B">DarkMagenta</option>
<option value="#556B2F">DarkOliveGreen</option>
<option value="#FF8C00">DarkOrange</option>
<option value="#9932CC">DarkOrchid</option>
<option value="#8B0000">DarkRed</option>
<option value="#E9967A">DarkSalmon</option>
<option value="#8FBC8F">DarkSeaGreen</option>
<option value="#483D8B">DarkSeaGreen</option>
<option value="#2F4F4F">DarkSlateGray</option>
<option value="#2F4F4F">DarkSlateGrey</option>
<option value="#00CED1">DarkSlateGrey</option>
<option value="#9400D3">DarkViolet</option>
<option value="#FF1493">DeepPink</option>
<option value="#00BFFF">DeepSkyBlue</option>
<option value="#696969">DimGray</option>
<option value="#696969">DimGrey</option>
<option value="#1E90FF">DodgerBlue</option>
<option value="#B22222">FireBrick</option>
<option value="#FFFAF0">FloralWhite</option>
<option value="#228B22">ForestGreen</option>
<option value="#FF00FF">Fuchsia</option>
<option value="#DCDCDC">Gainsboro</option>
<option value="#F8F8FF">GhostWhite</option>
<option value="#FFD700">Gold</option>
<option value="#DAA520">GoldenRod</option>
<option value="#808080">Gray</option>
<option value="#808080">Grey</option>
<option value="#008000">Green</option>
<option value="#ADFF2F">GreenYellow</option>
<option value="#F0FFF0">HoneyDew</option>
<option value="#FF69B4">HotPink</option>
<option value="#CD5C5C">IndianRed</option>
<option value="#4B0082">Indigo</option>
<option value="#FFFFF0">Ivory</option>
<option value="#F0E68C">Khaki</option>
<option value="#E6E6FA">Lavender</option>
<option value="#FFF0F5">LavenderBlush</option>
<option value="#7CFC00">LawnGreen</option>
<option value="#FFFACD">LemonChiffon</option>
<option value="#ADD8E6">LightBlue</option>
<option value="#F08080">LightCoral</option>
<option value="#E0FFFF">LightCyan</option>
<option value="#FAFAD2">LightGoldenRodYellow</option>
<option value="#D3D3D3">LightGray</option>
<option value="#D3D3D3">LightGrey</option>
<option value="#90EE90">LightGreen</option>
<option value="#FFB6C1">LightPink</option>
<option value="#FFA07A">LightSalmon</option>
<option value="#20B2AA">LightSeaGreen</option>
<option value="#87CEFA">LightSkyBlue</option>
<option value="#778899">LightSlateGray</option>
<option value="#778899">LightSlateGrey</option>
<option value="#B0C4DE">LightSteelBlue</option>
<option value="#FFFFE0">LightYellow</option>
<option value="#00FF00">Lime</option>
<option value="#32CD32">LimeGreen</option>
<option value="#FAF0E6">Linen</option>
<option value="#FF00FF">Magenta</option>
<option value="#800000">Maroon</option>
<option value="#66CDAA">MediumAquaMarine</option>
<option value="#0000CD">MediumBlue</option>
<option value="#BA55D3">MediumOrchid</option>
<option value="#9370DB">MediumPurple</option>
<option value="#3CB371">MediumPurple</option>
<option value="#7B68EE">MediumSlateBlue</option>
<option value="#00FA9A">MediumSpringGreen</option>
<option value="#48D1CC">MediumTurquoise</option>
<option value="#C71585">MediumVioletRed</option>
<option value="#191970">MidnightBlue</option>
<option value="#F5FFFA">MintCream</option>
<option value="#FFE4E1">MistyRose</option>
<option value="#FFE4B5">Moccasin</option>
<option value="#FFDEAD">NavajoWhite</option>
<option value="#000080">Navy</option>
<option value="#FDF5E6">OldLace</option>
<option value="#808000">Olive</option>
<option value="#6B8E23">OliveDrab</option>
<option value="#FFA500">Orange</option>
<option value="#FF4500">OrangeRed</option>
<option value="#DA70D6">OrangeRed</option>
<option value="#EEE8AA">PaleGoldenRod</option>
<option value="#98FB98">PaleGreen</option>
<option value="#AFEEEE">PaleTurquoise</option>
<option value="#DB7093">PaleVioletRed</option>
<option value="#FFEFD5">PapayaWhip</option>
<option value="#FFDAB9">PeachPuff</option>
<option value="#CD853F">PeachPuff</option>
<option value="#FFC0CB">Pink</option>
<option value="#DDA0DD">Plum</option>
<option value="#B0E0E6">PowderBlue</option>
<option value="#800080">Purple</option>
<option value="#663399">RebeccaPurple</option>
<option value="#FF0000">Red</option>
<option value="#BC8F8F">RosyBrown</option>
<option value="#4169E1">RoyalBlue</option>
<option value="#8B4513">SaddleBrown</option>
<option value="#FA8072">Salmon</option>
<option value="#F4A460">SandyBrown</option>
<option value="#2E8B57">SeaGreen</option>
<option value="#FFF5EE">SeaShell</option>
<option value="#A0522D">Sienna</option>
<option value="#C0C0C0">Sienna</option>
<option value="#87CEEB">SkyBlue</option>
<option value="#6A5ACD">SlateBlue</option>
<option value="#708090">SlateGray</option>
<option value="#708090">SlateGrey</option>
<option value="#FFFAFA">Snow</option>
<option value="#00FF7F">SpringGreen</option>
<option value="#4682B4">SpringGreen</option>
<option value="#D2B48C">Tan</option>
<option value="#008080">Teal</option>
<option value="#D8BFD8">Thistle</option>
<option value="#FF6347">Tomato</option>
<option value="#40E0D0">Turquoise</option>
<option value="#EE82EE">Violet</option>
<option value="#F5DEB3">Wheat</option>
<option value="#FFFFFF">White</option>
<option value="#F5F5F5">WhiteSmoke</option>
<option value="#FFFF00">Yellow</option>
<option value="#9ACD32">YellowGreen</option>
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
  
  
  '
?>
