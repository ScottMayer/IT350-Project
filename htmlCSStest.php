<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

  <title>Project CSS Test Page</title>

  <!-- Bootstrap core CSS -->
  <link href='../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>

  <!-- Custom styles for this template -->
  <link href='template/css/modern-business.css' rel='stylesheet'>
</head>

<body>
  <div class='container'>
    <div class='col-md-10 col-md-offset-1'>
      <?php echo "<form class='form-horizontal' action='?' method='post'>'
      <table>
        <thead>
          <tr>
              <th colspan='3'>Make Chit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td colspan='2'><strong>Routed To</strong></td>
          </tr>
          <tr>
              <td><label for='toName'>Name:</label></td>
              <td><input type='text' class='form-control' id='toName' name='toName' value=''></td>
              <td><label for='toBillet'>Rank:</label></td>
              <td><input type='text' class='form-control' id='toBillet' name='toBillet' value=''></td>
            </tr>
          <tr></tr>
          <tr>
              <td><strong>Your Information</strong></td>
          </tr>
          <tr>
              <td><label for='MIDNname' class='control-label'>Name:</label></td>
              <td><input type='text' class='form-control' id='MIDNname' name='MIDNname' value=''></td>
              <td><label for='MIDNrank' class='control-label'>Rank:</label></td>
              <td>
                <select class='form-control' id='MIDNrank' name='MIDNrank'>
                <option value='NULL'></option>";
                for ($i=1; $i < 5; $i++) {
                  echo "<option value=$i>$i/C</option>";
                }
              echo "</select>
              </td>
              <td><label for='MIDNalpha' class='control-label'>Alpha:</label></td>
              <td><input type='number' class='form-control' id='MIDNalpha' name='MIDNalpha' value=''></td>
          </tr>
          <tr>
            <td><label for='MIDNclassyr'>Graduating Year:</label></td>
            <td>
              <select class='form-control' id='MIDNclassyr' name='MIDNclassyr'>
                <option value='NULL'></option>";
                for ($i=2018; $i < 2022; $i++) {
                  echo "<option value=$i>$i</option>";
                }
              echo "</select>
            </td>
            <td><label for='MIDNcompany'>Company:</label></td>
            <td>
              <select class='form-control' id='MIDNcompany' name='MIDNcompany'>
              <option value='NULL'></option>";
              for ($i=1; $i < 31; $i++) {
                echo "<option value=$i>$i</option>";
              }
            echo "</select>
            </td>
            <td><label for='MIDNroom'>Room Number:</label></td>
            <td><input type='number' class='form-control' id='MIDNroom' name='MIDNroom' value=''></td>
          </tr>
          <tr>
            <td><label for='MIDNSQPR'>SQPR:</label></td>
            <td><input type='number' class='form-control' id='MIDNSQPR' name='MIDNSQPR' value=''></td>
            <td><label for='MIDNCQPR'>CQPR:</label></td>
            <td><input type='number' class='form-control' id='MIDNCQPR' name='MIDNCQPR' value=''></td>
            <td><label for='MIDNPerf'>Performance Grade:</label></td>
            <td><input type='text' class='form-control' id='MIDNPerf' name='MIDNPerf' value=''></td>
          </tr>
        </tbody>
      </table>
    </form>";
      ?>

    </div>
  </div>


</body>

</html>
