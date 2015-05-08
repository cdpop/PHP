<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- vim:set filetype=php: -->

<?
// Opening HTML and CSS printed with TopMatter()
echo TopMatter();
if (! isset($_POST['user_name'] , $_POST['password'] ,$_POST['sid'])
    || !$_POST['user_name'] || !$_POST['password'] || !$_POST['sid']) {
       echo LoginForm();

} else {  # we have the values we need, so we can go to work.
   echo OverallExplanation();
   require_once 'MDB2.php';
   $uid = strtoupper($_POST['user_name']);
   VerifyUID($uid);
   $con =& MakeConnection($uid);
   error_check($con,'MakeConnection');
   $uid = 'CPOP';
echo Approach();

//cleaning the table
CleanTable();

$query0=Query0();

echo "Retrieving the department numbers and names with <br><pre>$query0</pre> ";
$outer = & $con->query($query0);
error_check($outer, 'querying with query0');
$insert_number =1;



while(($row=$outer->fetchRow())){
   $qnum = $row[0] . "\n";
   $nme = $row[1] . "\n";

   echo "<h3> Retrieving the results based on the department number which are specific to the type of employee and project type. $loc<h3>";
   $query1=Query1($qnum);
   $query2=Query2($qnum);
   $query3=Query3($qnum);
   $query4=Query4($qnum);
   $query5=Query5($qnum);

   //QUERY 1
   echo ShortExp('num_emps, hours, and cost',$query1);
   echo ExplainQuery1($query1);
   $mytotl1 = $con->query($query1);
   error_check($mytotl1, 'querying with query1');
   ShowTable($mytotl1,0);
   $mytotl1->seek(0);
   $myx1 = $mytotl1->fetchRow(MDB2_FETCHMODE_ORDERED,0);
   $num_emps1 = $myx1[0];
   $hours1 = $myx1[1];
   $cost1 = $myx1[2];
   $etype1 = 'NOMINAL';
   $ptype1 = 'NA';
   echo "<h4>Inserting for department $qnum</h4>";

   InsertRow($qnum,$nme, $etype1, $ptype1, $num_emps1, $hours1,$cost1 );
   $insert_number++;

   //QUERY 2
   echo ShortExp('num_emps, hours, and cost',$query2);
   echo ExplainQuery2($query2);
   $mytotl2 = $con->query($query2);
   error_check($mytotl2, 'querying with query2');
   ShowTable($mytotl2,0);
   $mytotl2->seek(0);
   $myx2 = $mytotl2->fetchRow(MDB2_FETCHMODE_ORDERED,0);
   $num_emps2 = $myx2[0];
   $hours2 = $myx2[1];
   $cost2 = $myx2[2];
   $etype2 = 'DEPT';
   $ptype2 = 'DEPT';
   echo "<h4>Inserting for department $qnum</h4>";
   InsertRow($qnum,$nme, $etype2, $ptype2, $num_emps2, $hours2,$cost2 );
   $insert_number++;

   //QUERY 3
   echo ShortExp('num_emps, hours, and cost',$query3);
   echo ExplainQuery3($query3);
   $mytotl3 = $con->query($query3);
   error_check($mytotl3, 'querying with query3');
   ShowTable($mytotl3,0);
   $mytotl3->seek(0);
   $myx3 = $mytotl3->fetchRow(MDB2_FETCHMODE_ORDERED,0);
   $num_emps3 = $myx3[0];
   $hours3 = $myx3[1];
   $cost3 = $myx3[2];
   $etype3 = 'DEPT';
   $ptype3 = 'NONDEPT';
   echo "<h4>Inserting for department $qnum</h4>";
   InsertRow($qnum,$nme, $etype3, $ptype3, $num_emps3, $hours3,$cost3 );
   $insert_number++;

   //QUERY 4
   echo ShortExp('num_emps, hours, and cost',$query4);
   echo ExplainQuery4($query4);
   $mytotl4 = $con->query($query4);
   error_check($mytotl4, 'querying with query4');
   ShowTable($mytotl4,0);
   $mytotl4->seek(0);
   $myx4 = $mytotl4->fetchRow(MDB2_FETCHMODE_ORDERED,0);
   $num_emps4 = $myx4[0];
   $hours4 = $myx4[1];
   $cost4 = $myx4[2];
   $etype4 = 'NONDEPT';
   $ptype4 = 'DEPT';
   echo "<h4>Inserting for department $qnum</h4>";
   InsertRow($qnum,$nme, $etype4, $ptype4, $num_emps4, $hours4,$cost4 );
   $insert_number++;

   //QUERY 5
   echo ShortExp('num_emps, hours, and cost',$query5);
   echo ExplainQuery5($query5);
   $mytotl5 = $con->query($query5);
   error_check($mytotl5, 'querying with query5');
   ShowTable($mytotl5,0);
   $mytotl5->seek(0);
   $myx5 = $mytotl5->fetchRow(MDB2_FETCHMODE_ORDERED,0);
   $num_emps5 = $myx5[0];
   $hours5 = $myx5[1];
   $cost5 = $myx5[2];
   $etype5 = 'ASSIGNED';
   $ptype5 = 'DEPT';
   echo "<h4>Inserting for department $qnum</h4>";
   InsertRow($qnum,$nme, $etype5, $ptype5, $num_emps5, $hours5,$cost5 );
   $insert_number++;
}
$outer->free();
DisplayResults();
$con->disconnect();



}
?>
<?
function TopMatter(){
   return <<<TOP
   <html>
   <head>
   <style type="text/css">
   H1,H2,H3,H4 {background: #bbdddd;}
   BODY {margin-left:5%; margin-right:5%;}
   PRE.query {font-size: 120%;
            font-style: italic;
            font-weight: 600;
            background: #ddbbdd;
   }
   .problem {background: #ddddbb;}
   .indent {margin-left: 5%;}

   </style>

   <title>PHP Database Problem Example</title>
   </head>
   <body>
TOP;
}
function LoginForm(){
  return <<<_HTML_
  <h2>Supply information to login to your Oracle Account</h2><br/>
    <form method="post" action="$_SERVER[PHP_SELF]">
    Enter your oracle account id: <input type="text" name="user_name" id="user_name">
    <br/>
    Enter your oracle account password: <input type="password" name="password" id="password">
    <br/>
    Enter your oracle account SID: <input type="text" name="sid" id="sid">
    <br/>
    <input type='submit' value='SUBMIT INFO'>
    </form>
_HTML_;
}
function OverallExplanation(){
   return <<<EXPLAIN
   <div class='problem'>
   <h2>PHP Problem Statement</h2>
   <pre>
   Honor Code Statement:
   By registering for classes at ODU you have agreed to the following Honor Pledge
   I pledge to support the honor system of Old Dominion University. I will refrain
   from any form of academic dishonesty or deception, such as cheating or plagiarism.
   I am aware that as a member of the academic community, it is my responsibility
   to turn in all suspected violators of the honor system. I will report to
   Honor Council hearings if summoned.

   Assignment Explanation:
   This is the solution for Assingment 3 using PHP. We insert rows to a relation
   depending on the employee type and project type. There are 5 queries which
   conduct a database search based on the critiria of the
   employee type and project type. The query We conduct searches based on
   department number and returh the results to each query.

   We produce a report that considers every department.
   This one report combines multiple queries, based on whatever the criteria
   of the employee type and project type.

   The following are the guidelines for the employee and project types:
      <table>
   <tr>
   <td>NOMINAL</td><td>NA</td><td>This category includes all employees who work for this department.</td>
   </tr>
   <tr>
   <td>DEPT </td><td>DEPT</td><td>This category includes all department employees assigned to any
                    projects belonging to the department.</td>
   </tr>
   <tr>
   <td>DEPT </td><td>NONDEPT</td><td>This category includes all department employees assigned to any
                    projects belonging to other departments.</td>
   </tr>
   <tr>
   <td>NONDEPT<td>DEPT<td>This category includes all non-department employees assigned to any projects belonging to this department.</td>
   </tr>
   <tr>  <td>ASSIGNED   <td>DEPT<td>This category includes all employees, whether or not they belong to
                    the department, who are assigned to any project belonging to
               this department.</td>


   </pre></div>
      <table border="1">
      <tr><td colspan="2">This page is the solely the work of</td></tr>
      <tr><td>catalin pop</td><td>cpop</td></tr>
      <tr><td>zetan li</td><td>zli</td></tr>
      <tr><td colspan="2">We have not recieved aid from anyone<br>
      else in this assignment.  We have not given <br>
         anyone else aid in the
      assignment</td></tr>
      </table>

EXPLAIN;
}
function VerifyUID($uid){
   $legal_names=array(
       'IBL','IBLA','IBLB','IBLC','IBLD');
   // Add the team members to the array by replacing PARTNER1 and PARTNER2
   // with your team's Oracle LOGINS
   $legal_names[] = 'CPOP';
   $legal_names[] = 'ZLI'; // have to be in upper case
   if ( ! in_array($uid, $legal_names)){
     print <<<HTML
       <h1>ACCESS DENIED</h1>
HTML;
     if (preg_match('/ibl\b/',__FILE__)){
     print <<<HTML
       <b>Copy the source code to your own public_html directory<br>
          by clicking on the "To see the code" link<br>
          and add your UID to the \$legal_names array in function VerifyUID</b>
HTML;
     }
     print <<<HTML
       </body>
       </html>
HTML;
     exit;
   }
}
function error_check($e2check,$e_in_msg){
   global $con;
   if(PEAR::isError($e2check)) {
      echo("<br>Error in $e_in_msg : ");
      echo( $e2check->getMessage() );
      echo( ' - ');
      echo( $e2check->getUserinfo());
      if ($con->disconnect){
      $con->disconnect();
      }
      print "</body></html>";
      exit;
   }else {
      echo("no error in $e_in_msg<br>");
   }
}
function MakeConnection($uid){
   // $_POST is automatically global
   $sid = strtoupper($_POST['sid']);
   $dsn= array(
         'phptype'  => 'oci8',
         'dbsyntax' => 'oci8',
         'username' => $uid,
         'password' => $_POST['password'],
         'hostspec' => "oracle.cs.odu.edu",
         'service'  => $sid,
         );
   $con =& MDB2::factory($dsn, array('emulate_prepared' => false));
   return $con;
}
function Approach(){
return <<<HTML
<h3>Overview</h3>
<div class='problem'>
The approach taken here is the Big Loop approach.  An outer loop retrieves a list
of all the department names and numbers.  Then for each department the values to be reported for that departmnet
are calculated. These values are then inserted, and we proceed to the next location.
</div>
HTML;
}
function CleanTable(){
   # builds the procedure call to clean the table, executes the query,
   # checks the result and explains what is going on.
   global $uid,$con;
   print "<h3>First clean clean_dept_summary table</h3>";
   // $query & $result are automatically local to CleanTable because not global
   $query = "
   BEGIN
      ibl.clean_dept_summary('$uid');
   END;
   ";
   $query=preg_replace('/\r/','',$query);
   print("cleaning with <pre class='query'>$query</pre>");
   $result =& $con->query($query);
   error_check($result,'cleaning');
   $result->free();
}
// Query 0: Gets the department name and number
function Query0(){
   return  <<<QUERY
   select distinct dnumber, dname from department order by dnumber
QUERY;
}
function ExplainQuery0(){
   return <<<HTML
   <h3>We start with an Outer Loop</h3>
   <pre class="query">$query0</pre>
   <div class="indent"><b>Explanation</b>:
   This Query selects the department name and distinct department number
   from Department then orders it by the department number.
   </div>
HTML;
}
function Query1($qnum){
   return <<<QUERY
   select nvl(count(distinct ssn),0) as num_emps, nvl(count(distinct ssn)*40,0) as hours, nvl(sum(mypay),0) as cost
    from (select ssn, salary, dno, dname, hours, ((salary/2000)) as mypay
          from employee, works_on, department
          where dno=dnumber and dno = $qnum)
QUERY;
echo "Main query 1";
}
function ExplainQuery1($query1){
   return <<<HTML
   <h3>Column: num_emp--query1</h3>
   <pre class="query">$query1</pre>
   <div class="indent"><b>Explanation Query1 </b>:
   <ul> <li>This category includes all employees who work for this department.</li>
   <li>First we specify the department: [NOMINAL][NA]</li>
   <li>We grab the Number of employees, hours, and cost from all employees</li>
   <li>This is done by selecting attributes from employee, works_on, and department relations</li>
   <li>We calculate the cost by diving salary by 2,000 hours, count the distinct number of ssn for employes, and multiply the hours by the employee number</li>
   </ul></div>
HTML;
}
function ShortExp($colname, $query){
   return <<<HTML
   <p>Retrieving $colname with prepared query<pre class="query">
   $query</pre> </p>
HTML;
}
function Query2($qnum){
   return<<<QUERY
   select nvl(count(distinct ssn),0) as num_emps, nvl(sum(hours),0) as hours, nvl(sum(mypay),0) as cost
    from (select ssn, salary, dno, dname, hours, ((salary/2000)) as mypay
          from employee, works_on, project, department
          where ssn = essn and pno = pnumber and dnum = $qnum and dno = $qnum)
QUERY;
echo "Main query 2";
}
function ExplainQuery2($query2){
   return <<<HTML
   <h3>Column: num_proj--query2</h3>
   <pre class="query">$query2</pre>
   <div class="indent"><b>Explanation</b>:
   <ul><li>This category includes all department employees assigned to any projects belonging to the department.</li>
   <li>First we specify the department: [DEPT][DEPT]</li>
   <li> We grab the Number of employees, hours, and cost from employee,works_on,project, and department</li>
   <li>We calculate the cost by diving salary by 2,000 hours, count the distinct number of ssn for employes, and final sum all hours within the query</li>
   </ul></div>
HTML;
}
function Query3($qnum){
   return <<<QUERY
   select nvl(count(distinct ssn),0) as num_emps, nvl(sum(hours),0) as hours, nvl(sum(mypay),0) as cost
    from (select ssn, salary, dno, dname, hours, ((salary/2000)) as mypay
          from employee, works_on, project, department
          where dno = $qnum and ssn = essn and pno = pnumber and pno = pnumber and dnum <> $qnum)
QUERY;
echo "Main query 3";
}
function ExplainQuery3($query3){
   return <<<HTML
   <h3>Column: num_proj--query3</h3>
   <pre class="query">$query3</pre>
   <div class="indent"><b>Explanation</b>:
   <ul><li>This category includes all department employees assigned to any projects belonging to other departments.</li>
   <li>First we specify the department: [DEPT][NONDEPT]</li>
   <li>We grab the Number of employees, hours, and cost from employee, works_on, project, and department</li>
   <li>We calculate the cost by diving salary by 2,000 hours, count the distinct number of ssn for employes, and final sum all hours within the query</li>
   </ul></div>
HTML;
}
function Query4($qnum){
   return <<<QUERY
   select nvl(count(distinct ssn),0) as num_emps, nvl(sum(hours),0) as hours, nvl(sum(mypay),0) as cost
    from (select ssn, salary, dno, dname, hours, ((salary/2000)) as mypay
          from employee, works_on, project, department
          where dno <> $qnum and ssn = essn and pno = pnumber and pno = pnumber and dnum = $qnum)
QUERY;
echo "Main query 4";
}
function ExplainQuery4($query4){
   return <<<HTML
   <h3>Column: num_proj--query4</h3>
   <pre class="query">$query4</pre>
   <div class="indent"><b>Explanation</b>:
   <ul><li>This category includes all non-department employees assigned to any projects belonging to this department.</li>
   <li>First we specify the department: [NONDEPT][DEPT]</li>
   <li>We grab the Number of employees, hours, and cost from employee, works_on, project, and department</li>
   <li>We calculate the cost by diving salary by 2,000 hours, count the distinct number of ssn for employes, and final sum all hours within the query</li>
   </ul></div>
HTML;
}
function Query5($qnum){
   return <<<QUERY5
      select nvl(count(distinct ssn),0) as num_emps, nvl(sum(hours),0) as hours, nvl(sum(mypay),0) as cost
    from (select ssn, salary, dno, dname, hours, ((salary/2000)) as mypay
          from employee, works_on, project, department
          where ssn = essn and pno = pnumber and dnum = $qnum )
QUERY5;
echo "Main query 5";
}

function ExplainQuery5($query5){
   return <<<HTML
   <h3>Column: num_proj--query5</h3>
   <pre class="query">$query5</pre>
   <div class="indent"><b>Explanation</b>:
   <ul><li>This category includes all employees, whether or not they belong to the department, who are assigned to any project belonging to this department.</li>
   <li>First we specify the department: [ASSIGNED][DEPT]  </li>
   <li>We grab the Number of employees, hours, and cost from employee, works_on, project, and department</li>
   <li>We calculate the cost by diving salary by 2,000 hours, count the distinct number of ssn for employes, and final sum all hours within the query</li>
   </ul></div>
HTML;
}

function InsertRow($qnum, $nme, $etype, $ptype, $num_emps, $hours, $cost){
   global $uid,$con,$insert_number;
   $query=<<<QUERY
   BEGIN
        ibl.ins_dept_summary('$nme'          ,$qnum,      '$etype',
         '$ptype',
         $num_emps,
         $hours,
         $cost,
         '$uid',
         $insert_number);
   END;
QUERY;
   # if you write your code on windows rather than UNIX you will need to add this next line
   # to avoid an error.
   $query=preg_replace('/\r/','',$query);
   # The error occurs because Windows ends lines with two characters
   # ascii 13 and 10 but unix only uses 10.  The PL/SQL process gets upset when it finds
   # the carriage returns (ascii 13) in the code for the procedure calls (but in the
   # SQL there is no problem).

   print("Inserting with <pre class='query'>$query</pre>");
   $result =& $con->query($query);
   error_check($result,'procedure call');
   $result->free();
   # important to free memory used by $result
}
function DisplayResults(){
   global $con, $uid;
   $query="select * from TABLE(ibl.v_dept_summary('$uid'))";
   print <<<_HTML_
      <h4>Checking results of Database Procedure Inserts</h4>
      using query <pre class='query'>$query</pre>
_HTML_;
   $result =& $con->query($query);
   error_check($result,'querying v_dept_summary');
   ShowTable($result, 1); # 1 means free $result

}
function ShowTable($result,$free = 0){
  #changed from last version.  do not always want to free $result
  #$free is assumed to be ==0 unless stated otherwise
   echo "<br><table border='1'>";
   $header=0;
   while ($array = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
      if (!$header){
         $header=1;
         echo "<TR>";
            foreach($array as $key => $field){
               echo("<th>$key</th>");
            }
         echo "</TR>";
      }
      echo "<tr>";
         foreach ($array as  $field){
            echo("<td>$field</td>");
         }
      echo "</tr>";
   }
   # important to free memory used by $result
   if ($free) { $result->free();}
   # this version does automatically not free because of reuse of $result

   echo "</table>";
}
?>

</body>
</html>
