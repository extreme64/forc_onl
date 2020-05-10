<?php

class Db_ex extends CI_Controller {
    
    
    
    
    function __construct() {
        ob_start();
 
        $hostname = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname   = "kbp";

        // if mysqldump is on the system path you do not need to specify the full path
        // simply use "mysqldump --add-drop-table ..." in this case C:\\xampp\\mysql\\bin\\
        $command = "D:\\xampp\\mysql\\bin\\mysqldump --add-drop-table --host=".$hostname." --user=".$username." ";
        if ($password) 
                $command.= "--password=". $password ." "; 
        $command.= $dbname;
        system($command);

        $dump = ob_get_contents(); 
        ob_end_clean();

        // send dump file to the output
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($dbname . "_" . 
            date("Y-m-d_H-i-s").".sql"));
        flush();
        echo $dump;
        exit();
        
        
        
        /***
        
        
        //ENTER THE RELEVANT INFO BELOW
        $mysqlDatabaseName ='xxxxxx';
        $mysqlUserName ='xxxxxxx';
        $mysqlPassword ='myPassword';
        $mysqlHostName ='xxxxxxxx.net';
        $mysqlExportPath ='chooseFilenameForBackup.sql';

        //DO NOT EDIT BELOW THIS LINE
        //Export the database and output the status to the page
        $command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ~/' .$mysqlExportPath;
        exec($command);

        
        
        Using SQL Command through PHP

            You can execute SQL SELECT command to take a backup of any table. To take a complete database dump you will 
            need to write separate query for separate table. Each table will be stored into separate text file.

            Example:

            Try out following example of using SELECT INTO OUTFILE query for creating table backup :

            <?php
            $dbhost = 'localhost:3036';
            $dbuser = 'root';
            $dbpass = 'rootpassword';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            if(! $conn )
            {
              die('Could not connect: ' . mysql_error());
            }
            $table_name = "employee";
            $backup_file  = "/tmp/employee.sql";
            $sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );
            if(! $retval )
            {
              die('Could not take data backup: ' . mysql_error());
            }
            echo "Backedup  data successfully\n";
            mysql_close($conn);
            ?>
            There may be instances when you would need to restore data which you have backed up some time ago. 
            To restore the backup you just need to run LOAD DATA INFILE query like this :

            <?php
            $dbhost = 'localhost:3036';
            $dbuser = 'root';
            $dbpass = 'rootpassword';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            if(! $conn )
            {
              die('Could not connect: ' . mysql_error());
            }
            $table_name = "employee";
            $backup_file  = "/tmp/employee.sql";
            $sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";

            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );
            if(! $retval )
            {
              die('Could not load data : ' . mysql_error());
            }
            echo "Loaded  data successfully\n";
            mysql_close($conn);
            ?>
        
        */
        
        
    }
    
    public function db_out()
    {
        $dbhost = 'localhost:3036';
        $dbuser = 'root';
        $dbpass = 'rootpassword';
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if(! $conn )
        {
          die('Could not connect: ' . mysql_error());
        }
        $table_name = "employee";
        $backup_file  = "/tmp/employee.sql";
        $sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

        mysql_select_db('test_db');
        $retval = mysql_query( $sql, $conn );
        if(! $retval )
        {
          die('Could not take data backup: ' . mysql_error());
        }
        echo "Backedup  data successfully\n";
        mysql_close($conn);
    }
    
    public function db_in()
    {
        $dbhost = 'localhost:3036';
        $dbuser = 'root';
        $dbpass = 'rootpassword';
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if(! $conn )
        {
          die('Could not connect: ' . mysql_error());
        }
        $table_name = "employee";
        $backup_file  = "/tmp/employee.sql";
        $sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";

        mysql_select_db('test_db');
        $retval = mysql_query( $sql, $conn );
        if(! $retval )
        {
          die('Could not load data : ' . mysql_error());
        }
        echo "Loaded  data successfully\n";
        mysql_close($conn);
    }

}
?>