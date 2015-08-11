<?php
require_once "autoloader.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset=UTF-8">
        <title>WorldCat Similar Titles</title>
        <link type="text/css" rel="stylesheet" href="css/normalize.css" />
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" />
        <script type='text/javascript' src='js/jquery.js'></script>
    </head>
    <body>
        <?php
        $txtInput = new \input\CSVTextArea;
        $fileInput = new \input\CSVFile;

        if (!isset($_POST['submit'])) {?>


<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>WorldCat Similar Titles Search</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="idtype">ID Type</label>
  <div class="col-md-4">
    <select id="idtype" name="idtype" class="form-control" required>
      <option value="oclc">OCLC Numbers</option>
      <option value="isbn">ISBN Numbers</option>
      <option value="issn">ISSN Numbers</option>
      <option value="sn">Standard Numbers</option>
    </select>
  </div>
</div>

<!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="idlist_file">Import IDs (CSV or line breaks)</label>
  <div class="col-md-4">
    <input id="idlist_file" name="idlist_file" class="input-file" type="file">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="idlist_textarea">ID List (CSV or line breaks)</label>
  <div class="col-md-4">
    <textarea class="form-control" id="idlist_textarea" name="idlist_textarea"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>


        <?php
        } else {
            $txtData = $txtInput->getval();
            $fileData = $fileInput->getval();

            $values = "";
            if ($txtData != FALSE) {
                $values .= $txtData;
            }

            if ($txtData != FALSE && $fileData != FALSE)
                $values .= ',';

            if ($fileData != FALSE) {
                $values .= $fileData;
            }

            echo "<form id=\"CSVForm\" action=\"process.php\" method=\"post\">
            <input type=\"hidden\" name=\"idlist\" value=\"$values\" />";
            ?><script type='text/javascript'>
                $(document).ready(function () {
                    $("#CSVForm").submit();
                });
            </script><?php
        }
        ?>
    </body>
</html>
