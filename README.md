# E-Campus

 Abstract
- GUI (Graphical User Interface), Graphical User Interface are designs developed to help electronic devices use icons, and other visual graphics. HTML and CSS were used for the frontend part. CSS codes are taken from bootstrap for a better UI design. To increase efficiency and reduce complexity, the number of classes has been reduced as much as possible by using php and html codes for all classes in the same place.
------
 Login
- For the login, database and UI parts are created in different classes(LoginDB.php for database connection and to save instructors' and students' variables, index.php for UI to login). The index.php page asks for the user's SSN and password. If the SSN and password belong to the instructor and matches, user is directed to the Instructorpage.php or StudentPage.php according to the “role”. If the information are not matches, a warning occurs, and error message displayed.
------
 Register
- Users can also register by using “register” button. It directs the user to the RegisterUI.php page and asks for the “role”, “ssn”, “password” and add this information to the database by using RegisterDB.php class.
------
 Instructor
- When the Instructor logs into the system successfully, the InstructorPage.php class run.
- Courses : Instructor can see the courses that he/she is teaching. (CourseCode, CourseName,
ECTS, NumberOfHours)
- Students of courses : Instructor can see the students that are enrolled to the course which
Instructor teaches. (CourseCode, SectionID, StudentName, StudentID)
- Projects (Leading) : Instructor can see the projects he/she is leading. (ProjectName, Subject,
Budget, StartDate, EndDate)
- Projects (Working on) : Instructor can see the projects he/she is working on. (ProjectName,
Subject, Budget, StartDate, EndDate)
- Weekly schedule : Instructor can see the weekly schedule of himself/herself. (CourseCode,
CourseName, SectionID, Day, Hour)
- Advising : Instructor can see the information of students that he/she is advising. (Student
SSN, StudentID, StudentName, GraduationStatus)
- Supervising : Instructor can see the information of students that he/she is supervising.
(StudentName, StudentSSN, StudentID)
- Free hours report : Instructor can see the free hours of himself/herself. (Day, hour)
- Add exam : Instructor can add an exam to course that he/she wants. (ExamName,
ExamDate, InstructorSSN, CourseCode, Year, Semester, SectionID)
- Display exams : Instructor can see the exams for the courses that he/she is teaching.
(CourseCode, CourseName, ExamName, ExamDate, ExamYear) 
------
Student
- When the Student logs into the system successfully, the StudentPage.php class runs.
- Graduation Status : Student can see the graduation status of himself/herself (Graduated or Ungraduated).
- Courses : Student can see the courses that he/she is enrolled (CourseCode, CourseName, SectionID, Year, Semester, LetterGrade).
- Grade report (Transcript) : Student can see the projects he/she is leading. (CourseCode, CourseName, ECTS, LetterGrade, Year)
- Exam grades of a course : Student can see the projects he/she is working on. (CourseCode, ExamName, Year, Score)
- Weekly schedule : Student can see the weekly schedule of himself/herself. (CourseCode, CourseName, SectionID, Day, Hour)
- Advisor : Student can see the information of students that he/she is advising. (AdvisorName)
- List of courses supposed to be taken: Student can see the information of students that he/she is supervising. (CourseCode, CourseName, ECTS, NumberOfHours, PrereqCourses)
- Department : Student can see the free hours of himself/herself. (DepartmentName)
- Supervisor list : Student can add an exam to course that he/she wants. (SupervisorDepartmentName, SupervisorRank, SupervisorName)
- List of projects : Student can see the exams for the courses that he/she is teaching. (ProjectName, WorkingHour, Ranl, LeadInstructorName)
------
Database System Part
- The name of the database system is “universitydbsystem”. (Changable according to DB) In order to use the database system actively the program connects to the MySQL workbench with the code above:

- $dbname = "universitydbsystem"; 
- $db = mysqli_connect("localhost", "root", "", $dbname);

- In order to improve the efficiency and reduce the complexity of the program, some variables such as userSSN, and userName are stored when the user login to the system. This is a need for the personalized data processing and displaying.

- $result = mysqli_query($conn, $sql);
- $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
- $_SESSION['iname'] = $row['iname'];
- $_SESSION['issn'] = $row['ssn'];
------
Example queries
- Student → Courses : SELECT C.courseCode, C.courseName, E.sectionId, E.yearr, E.semester, E.lettergrade FROM enrollment E, course C WHERE sssn = '$studentNumber' AND C.courseCode = E.courseCode AND E.yearr = 2022 ORDER BY E.yearr DESC
- Student → GradeReport : " SELECT C.courseCode, C.courseName, C.ects, E.lettergrade, E.yearr FROM Course C, enrollment E WHERE C.courseCode = E.courseCode AND sssn = '$studentNumber' ORDER BY yearr DESC"
- Student → ListOfCoursesSupposedTobeTaken : " SELECT C.courseCode, C.courseName, C.ects, C.numHours, C.prereq_courseCode FROM curriculacourses CC, course C WHERE CC.courseCode = C.courseCode AND dName LIKE 'comp%' AND C.courseCode NOT IN (SELECT courseCode FROM enrollment WHERE sssn = '$studentNumber') ORDER BY ects DESC”
- Student → SuperviserList : SELECT rankk, iname, dname FROM gradstudent, instructor WHERE instructor.ssn = gradstudent.supervisorSsn AND gradstudent.ssn = '$studentNumber'"
- Student → WeeklySchedule : " SELECT E.courseCode, C.courseName, E.sectionId, W.dayy, W.hourr FROM weeklyschedule W NATURAL JOIN enrollment E LEFT JOIN course C ON E.courseCode = C.courseCode WHERE E.sssn = '$studentNumber'"
- Instructor → SupervisedStudents : "SELECT S.studentname, S.ssn, S.studentid FROM gradstudent G, student S WHERE S.ssn = G.ssn AND supervisorSsn = '$instructorNumber'"
- Instructor → StudentsOfCourses : “SELECT E.courseCode, E.sectionId, S.studentname, S.studentid FROM enrollment E, student S WHERE E.sssn = S.ssn AND E.issn = '$instructorNumber' GROUP BY studentid"
- Instructor → ProjectsWorkingOn : “"SELECT P.pName, subject, budget, startDate, endDate, PI.workinghour FROM project P, project_has_instructor PI WHERE PI.pName = P.pName AND PI.issn = '$instructorNumber' ORDER BY startDate"
- Instructor → FreeHours : "SELECT T.dayy, T.hourr FROM timeslot T WHERE (T.dayy, T.hourr) NOT IN (SELECT W.dayy, W.hourr FROM enrollment E NATURAL JOIN weeklyschedule W WHERE E.yearr=2022 AND E.semester = 'spring' AND E.sssn IN (SELECT E2.sssn FROM enrollment E2 WHERE E2.sssn = E.sssn AND E2.issn= '$instructorNumber' AND E2.courseCode='comp2222' and E2.sectionId = 1 AND E2.yearr=2022 and E2.semester = 'spring'))"
- Instructor → CoursesTeaching : "SELECT C.courseCode, C.courseName, C.ects, C.numHours FROM course C, enrollment E C.courseCode = E.courseCode AND E.issn '$instructorNumber' GROUP BY courseCode"
- Instructor → DisplayExams : "SELECT C.courseCode, C.courseName, E.eName, E.edate, E.yearr FROM exam E, course C WHERE E.courseCode = C.courseCode AND E.issn = '$instructorNumber' ORDER BY yearr DESC"
- Instructor → ProjectsLeading : "SELECT pName, subject, budget, startDate, endDate FROM project P, instructor I WHERE P.leadSsn = I.ssn AND I.ssn = '$instructorNumber' ORDER BY startDate"
------
