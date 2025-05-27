<?php

class DbFunctions
{
	public static function connectWithDatabase()
	{
		$link = mysqli_connect('pav050.hs-bochum.de', 'iksy2_holiday24', 'rfQJY/]cDIfCxxd/');
		$query = "USE iksy2_holiday24";
		self::executeQuery($link, $query);
		return $link;
	}

	public static function executeQuery($link, $query)
	{
		return mysqli_query($link, $query);
	}

		public static function getHash($link, $query)
	{
	    $result=self::executeQuery($link, $query);
	    $countRows=mysqli_num_rows($result);
	    if ($countRows==0)
	    {
	        return null;
	    }
	    $fieldList=array();
	    for ($i=0; $i<$countRows; $i++)
	    {
	        $row=mysqli_fetch_row($result);
	        $fieldList[$row[0]]=$row[1];
	    }
	    mysqli_free_result($result);
	    return $fieldList;
	}

	public static function getRows($link, $query)
	{
		$result = self::executeQuery($link, $query);
		$rows = [];
		
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		
		return $rows;
	}

	public static function getFirstFieldOfResult($link, $query)
	{
	    $result=self::executeQuery($link, $query);
	    if (mysqli_num_rows($result)==0)
	    {
	        return null;
	    }
	    $row=mysqli_fetch_row($result);
	    mysqli_free_result($result);
	    return ($row[0]);
	}

	    public static function verifyUser($link, $userid)
    {
        $query = "UPDATE customer SET verified = 1 WHERE id = ?";
    
        $stmt = $link->prepare($query);
    
        if ($stmt) {
            $stmt->bind_param("s", $userid); 
            $stmt->execute();
            $stmt->close();
        } else {
            error_log("Error preparing statement: " . $link->error);
        }
    }   
}
?>