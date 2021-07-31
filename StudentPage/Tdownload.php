<?php
	$file = './TeacherPage/TeacherHomeworks/'.$_GET['user'];
   	$title=$_GET['user'];

    header("Pragma: public");
    header('Content-disposition: attachment; filename='.$title);
  
    header('Content-Transfer-Encoding: binary');
   
    ob_clean();
    flush();

    $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
    if (filesize($file) > $chunksize) {
        $handle = fopen($file, 'rb');
        $buffer = '';

        while (!feof($handle)) {
            $buffer = fread($handle, $chunksize);
            echo $buffer;
            ob_flush();
            flush();
        }

        fclose($handle);
    } else {
        readfile($file);
    }
	?>