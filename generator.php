<?php
    function gen_id($type, $connect)
    {
        while(true)
        {
            $res = $type;
            for($i = 0; $i < 5; $i++)
            {
                $res = $res . rand(0, 9);
            }

            $query = "";
            if($type == "S-")
            {
                $query = "select * from seller where s_id = '$res'";
            }
            elseif($type == "C-")
            {
                $query = "select * from customer where c_id = '$res'";
            }
            elseif($type == "I-")
            {
                $query = "select * from item where item_no = '$res'";
            }

            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1)
            {
                continue;
            }
            else
            {
                break;
            }
        }

        return $res;
    }
?>