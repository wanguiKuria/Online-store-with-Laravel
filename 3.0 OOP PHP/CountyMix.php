<?php

namespace CountyMix;

class CountyMix
{

    public $county_data = "";
    public $county_array = [];
    public $table = "";
    public $party_count = [];

    public function createTable()
    {
        //accessing property of a class within itself using the this keyword

        $this->county_array = explode(",", $this->county_data);
        $this->table .= "<table border=1 cellpadding=5 cellspacing=5>";
        $this->table .= "<thead>";
        $this->table .= "<tr>";
        $this->table .= "<th>#</th> <th>County</th>";
        $this->table .= "<th>Governor</th> <th>Party</th>";
        $this->table .= "</tr>";
        $this->table .= "</thead>";
        foreach ($this->county_array as $key1 => $row_string) :
            // $row_string = "3. Kilifi. – Gideon Mung’aro – ODM"
            $this->table .= "<tr>";

            $cells = explode("–", $row_string);
            // $cells = ["3.Kilifi","Gideon Mung’aro","ODM"]

            /*
                    <td>3</td>
                    <td>Kilifi</td>
                    <td>Gideon Mung’aro</td>
                    <td>ODM</td>
            */
            //$cell[0]] = "3.Kilifi"
            $first_cell_array = explode('.', $cells[0]);
            //$first_cell_array = [3,"Kilifi"]
            $this->table .= "<td>" . $first_cell_array[0] . "</td>";
            $this->table .= "<td>" . $first_cell_array[1] . "</td>";

            // $cells = ["9.Mandera","Mohamed Adan Khalif - UDM "]
            if (strpos($cells[1], '-')) :
                //we have found it
                $temp_array = explode('-', $cells[1]);
                //["Mohamed Adan Khalif","UDM"]
                $this->table .= "<td>" . $temp_array[0] . "</td>";
                $this->table .= "<td>" . $temp_array[1] . "</td>";
            else :
                $this->table .= "<td>" . $cells[1] . "</td>";
                $this->table .= "<td>" . $cells[2] . "</td>";
            endif;

            $this->table .= "</tr>";

        endforeach;
        $this->table .= "</table>";
        return $this->table;
    }




    public function __construct()
    {

        // echo "<p>Constructor called</p>";
        // echo "<p>Object Created</p>";
        //initialize the county_data variable       
        $this->county_data =  "1. Mombasa. – Abdulswamad Nassir – ODM,       
        3. Kilifi. – Gideon Mung’aro – ODM,
        4. Tana River. – Dhadho Godhana – ODM,
        5. Lamu. – Issa Abdallah Timamy – ANC,
        6. Taita-Taveta. – Andrew Mwadime – Independent,
        7. Garissa. – Nathif Jama – ODM,
        8. Wajir. – Ahmed Abdullahi – ODM,
        9. Mandera. – Mohamed Adan Khalif - UDM,
        10. Marsabit – Mohamud Ali – ODM,
        11. Isiolo – Abdi Hassan Guyo – Jubilee,
        12. Meru – Kawira Mwangaza – Independent,
        13. Tharaka Nithi – Muthomi Njuki – UDA,
        14. Embu – Cecily Mbarire – UDA,
        15. Kitui – Julius Malombe – Wiper,
        16. Machakos – Wavinya Ndeti – Wiper,
        17. Makueni – Mutula Kilonzo – Wiper.,
        18. Nyandarua – Moses Kiarie – UDA,
        19. Nyeri – Mutahi Kahiga – UDA,
        20. Kirinyaga. – Ann Waiguru – UDA,
        21. Murang’a – Irungu Kang’ata – UDA,
        22. Kiambu. – Kimani Wamatangi – Jubilee,
        23. Turkana. – Jeremiah Lomurkai – ODM,
        24. West Pokot. – Simon Kachapin. – UDA,
        25. Samburu. – Jonathan Leleliit – UDA,
        26. Trans-Nzoia. – George Natembeya – DAP-K,
        27. Uasin gishu. – Jonathan Bii – UDA,
        28. Elgeyo Marakwet. – Wisley Rotich – UDA,
        29. Nandi. – Stephen Sang – UDA,
        30. Baringo – Benjamin Cheboi. – UDA,
        31. Laikipia – Joshua Irungu – UDA,
        32. Nakuru. – Susan Kihika – UDA,
        33. Narok – Patrick Ole Ntutu – UDA,
        34. Kajiado. – Joseph Ole Lenku – ODM,
        35. Kericho. – Dr. Erick Mutai – UDA,
        36. Bomet. – Hillary Barchok – UDA,
        37. Kakamega. – Fernandes Barasa – ODM,
        38. Vihiga. – Wilber Ottichilo – ODM,
        39. Bungoma. – Ken Lusaka – Ford Kenya,
        40. Busia. – Paul Otuoma – ODM,
        41. Siaya. – James Orengo. – ODM,
        42. Kisumu. – Anyang’ Nyong’o. – ODM,
        43. Homabay. – Gladys Wanga – ODM,
        44. Migori. – Ochillo Ayacko – ODM,
        45. Kisii. – Simba Arati – ODM,
        46. Nyamira. – Amos Nyaribo - UPA,
        47. Nairobi. – Johnson Sakaja – UDA";
    }

    public function trackPoliticalParty($party)
    {
        $party = trim($party, ".");
        //check if the party is in the array
        if (array_key_exists($party, $this->party_count)) :
            //yes-present-true
            //$this->party_count[$party] = 
            //$this->party_count[$party] + 1;
            $this->party_count[$party] += 1;
        else :
            //no-missing-false
            $this->party_count[$party] = 1;
        endif;
    }
}
/*
//print out party_count
var_dump($testObject->party_count);
$testObject = new CountyMix();        //when you create an object,the constructor is called automically
// You must call the createTable function
echo $testObject->createTable();
*/
//namespaces in php are
//