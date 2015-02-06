Using:

+-------------------------+
| interview_account_hold  |
+-------------------------+
| Student_ID | Amount_Due |
+------------+------------+
| 416996983  | 3,403.20   |
| 287856417  | 2,318.13   |
| 537713123  | 3,678.06   |
| 187296716  | 2,202.83   |
| 145768187  | 2,379.32   |
+------------+------------+

And: 

+------------------------------------------------------+
| interview_student                                    |
+------------+-----------+------------+---------+------+
| Student_ID | Last_Name | First_Name | College | GPA  |
+------------+-----------+------------+---------+------+
| 463127376  | Willemsen | Lucas      | A       | 2.37 |
+------------+-----------+------------+---------+------+



<?
function hasHold($college)
{
  $query = "SELECT interview_student.Student_ID, interview_student.Last_Name, 
                   interview_student.First_Name, interview_student.College, 
                   interview_account_hold.Amount_Due
	    FROM interview_student
	    INNER JOIN interview_account_hold
	    ON interview_student.Student_ID = interview_account_hold.Student_ID
            WHERE College=";
		  
  $query .= "'" . $college . "'";
  
  return $query;
}
?>