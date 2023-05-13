<?php
    //error_reporting(0);
    require('config.php');

    function printSessionTable($view_type, $parameter1, $parameter2, $parameter3, $parameter4)
    {
        $conn = getdb();

        if($view_type === "Search")
        {

            $sql = "SELECT * FROM `academic_session` WHERE
             `dept_name` = '$parameter1' and `semester` = '$parameter2' and `duration` = '$parameter3' and `year` = '$parameter4'";

            $result = $conn->query($sql);

            echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF SESSION</h2>";
            echo "<br>";
            echo "<table>";
    
            echo "<th>Department Name</th>";
            echo "<th>Semester</th>";
            echo "<th>Section</th>";
            echo "<th>Duration</th>";
            echo "<th>Year</th>";
            echo "<th>Allot Students</th>";
            echo "<th>Allot Faculty</th>";
            echo "<th>Create Feedback Form</th>";
            echo "<th>View Feedback Forms</th>";
        
            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['dept_name'];
                echo "</td><td>";

                echo $data['semester'];
                echo "</td><td>";
                
                echo $data['section'];
                echo "</td><td>";

                echo $data['duration'];
                echo "</td><td>";

                echo $data['year'];
                echo "</td><td>";

                $academic_session_id =  $data['academic_session_id'];

                echo "<form action='upload_student.php' method = 'post'>
                    <input style = 'width: 130px; height: 30px;' type='submit' id = 'submit' name = 'academic_session_id' value = '$academic_session_id'>
                    </form>
                </td><td>";

                echo "<form action='allot_subject.php' method = 'post'>
                    <input style = 'width: 130px; height: 30px;' type='submit' id = 'submit' name = 'academic_session_id' value = '$academic_session_id'>
                    </form>
                </td><td>";

                echo "<form action='create_feedback_form.php' method = 'post'>
                <input style = 'width: 130px; height: 30px;' type='submit' id = 'submit' name = 'academic_session_id' value = '$academic_session_id'>
                    </form>
                </td><td>";

                echo "<form action='view_feedback_forms.php' method = 'post'>
                    <input style = 'width: 130px; height: 30px;' type='submit' id = 'submit' name = 'academic_session_id' value = '$academic_session_id'>
                    </form>
               </td></tr>";

            }
            echo "</table>";

        }        
        else if($view_type === "view_all")
        {

            $sql = "SELECT * FROM `academic_session`";

           $result = $conn->query($sql);

           echo "<br><br><h2 style = 'text-align: center; margin-top: 20px; margin-bottom: 30px;   word-spacing: 3px;'>LIST OF SESSION</h2>";
           echo "<br>";
           echo "<table>";

            echo "<th>Department Name</th>";
            echo "<th>Semester</th>";
            echo "<th>Section</th>";
            echo "<th>Duration</th>";
            echo "<th>Year</th>";
            echo "<th>Allot Students</th>";
            echo "<th>Allot Faculty</th>";
            echo "<th>Create Feedback Form</th>";
            echo "<th>View Feedback Forms</th>";
        
            while($data = $result->fetch_assoc())
            {
                echo "<tr><td>";
                echo $data['dept_name'];
                echo "</td><td>";

                echo $data['semester'];
                echo "</td><td>";
                
                echo $data['section'];
                echo "</td><td>";

                echo $data['duration'];
                echo "</td><td>";

                echo $data['year'];
                echo "</td><td>";

                $academic_session_id =  $data['academic_session_id'];

                echo "<form action='upload_student.php' method = 'post'>
                    <input style = 'width: 130px; height: 30px;' type='submit' id = 'submit' name = 'academic_session_id' value = '$academic_session_id'>
                    </form>
                </td><td>";

                echo "<form action='allot_subject.php' method = 'post'>
                    <input style = 'width: 130px; height: 30px;' type='submit' id = 'submit' name = 'academic_session_id' value = '$academic_session_id'>
                    </form>
                </td><td>";

                echo "<form action='create_feedback_form.php' method = 'post'>
                <input style = 'width: 130px; height: 30px;' type='submit' id = 'submit' name = 'academic_session_id' value = '$academic_session_id'>
                    </form>
                </td><td>";

                echo "<form action='view_feedback_forms.php' method = 'post'>
                    <input style = 'width: 130px; height: 30px;' type='submit' id = 'submit' name = 'academic_session_id' value = '$academic_session_id'>
                    </form>
               </td></tr>";

            }
            echo "</table>";

        }
    }
    
?>



