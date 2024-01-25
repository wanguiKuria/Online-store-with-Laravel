<?php 

// a string of county data
$county_data = "1. Mombasa. – Abdulswamad Nassir – ODM,
2. Kwale. – Fatuma Achani – UDA,
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


// You should NOT modify anything above this line


// Your code starts here
//print $county_data; //primitive(int,string,boolean,chars,float/double)
/*
//splitting this data(splitting string by string in php) example:
//delimeter-string you are splitting by

$small_string ="Esther Kuria";
$small_array= explode('',small_string);

//print $small_array;//complex print_r / var_dump

print "<br/>";
var_dump($small_array);

print "<br/>";
print_r($small_array);
*/

$county_array= explode(",",$county_data);



 echo '<table border=1 cell spacing=5 cellpadding=5>'; //generates table

 echo '<thead>'; 
 echo '<tr>'; //generates rows
 echo' <th>#</th> <th>County</th> <th>Governor</th> <th>Party</th>'; //generates headings
 echo '</tr>';
 echo '</thead>';
$party_count= [];//making an array where we will add the parties
foreach($county_array as $key => $row):  //loop

//generate rows
 echo "<tr>";
// echo "<br/>ROW :".$row;
$cells = explode('–', $row);

foreach ($cells as $key => $cell):
    
    if($key == 0){      //1. Mombasa...

        $temp = explode('.',$cell);
         echo '<td>'.$temp[0]. '</td>' ;
         echo '<td>' .$temp[1]. '</td>' ;

    }else if($key ==1){

        if(stripos($cell,'-')){ //for the weird hyphen
            $temp = explode('-',$cell);
             echo '<td>' .$temp[0]. '</td>' ;
             echo '<td>' .$temp[1]. '</td>' ;

        }else{
             echo "<td>$cell</td>";
        }

    }
    else{
        //adding every political party to array i.e ["UDA","ODM","UDA".........]
        $party_count[]=$cell;
        //However, to make work easier, we do:


         echo "<td>$cell</td>";
        
    }

    

endforeach;
$count=array_count_values($party_count);

 echo "</tr>";

endforeach;  //ends loop
 echo '</table>';
var_dump($party_count);

$nice_array=['UDA' => 2, 'ODM' => 1, 'Jubliee' => 1];
 ?> 
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php  echo json_encode(array_keys($count)) ?>,
        datasets: [{
            label: '# of Votes',
            data: <?php  echo json_encode(array_values($count)) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


//print "<h1>The array</h1>";
//var_dump($county_array);
//print "<h1>The contents of the array</h1>";
/*echo $county_array[0].'<br/>';
echo $county_array[20].'<br/>';
echo $county_array[40].'<br/>';
echo $county_array[46];  

print "<h1> The second part<h1/>";
print_r(explode ("-",$county_array[0]));
print_r(explode ("-",$county_array[20]));
print_r(explode ("-",$county_array[40]));
print_r(explode ("-",$county_array[46]));
*/
?>
