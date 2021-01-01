<?php
class Home extends DbConfig{
	public function getData($query)
    {       
        $result = $this->connection->query($query);
        $ins = mysqli_num_rows($result);
        echo $ins. ' Data';
    }
}
?>