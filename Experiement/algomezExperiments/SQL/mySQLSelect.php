Using:

+------------------------------------------------------------+
| interview_student                                          |
+------------+-----------+------------+---------+------+-----+
| Student_ID | Last_Name | First_Name | College | GPA  | ... |
+------------+-----------+------------+---------+------+-----+
| 463127376  | Willemsen | Lucas      | A       | 2.37 | ... |
| 338288531  | Hansen    | Jocelyn    | D       | 2.56 | ... | 
| 357921012  | Looysen   | William    | E       | 3.90 | ... |
| 265307238  | Hester    | Susan      | E       | 1.25 | ... |
| 152900535  | Gaddis    | Robert     | S       | 2.45 | ... |
+------------+-----------+------------+---------+------+-----+

<?
function getStudent($min)
{
  // replace the query statement below with the correct statement
  $query = "SELECT Student_ID, Last_Name, 
                   First_Name, GPA 
            FROM interview_student 
	    WHERE GPA>=";
	    
  $query .= $min;
  
  return $query;
}
?>