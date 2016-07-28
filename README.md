# SKIT Class Tests - An online assessment portal

Demo Link - http://ec2-52-209-170-83.eu-west-1.compute.amazonaws.com/skitclasstests/

##SKIT Class Tests
There are two panels in this skitclasstests module:

1.	Test Panel for students 
Link: http://ec2-52-209-170-83.eu-west-1.compute.amazonaws.com/skitclasstests/

2.	Admin Panel for faculty members
 Link: http://ec2-52-209-170-83.eu-west-1.compute.amazonaws.com/skitclasstests/admin/

##Admin Panel Overview
1.	Go to http://ec2-52-209-170-83.eu-west-1.compute.amazonaws.com/skitclasstests/admin/ and enter your email address/username, password and text shown in captcha image.
Login details: -  Username – demouser@skit.com
		    Password – password

2.	By clicking on your name on top-right corner you can change your password and can logout. (Make sure to logout after work)
3.	By clicking on ‘SKIT Class Tests – Home’ on top-left corner you can move back to home page anytime from anywhere.
4.	Home Page shows the list of all the tests you have created.

##Creating a new Test
1.	Click on ‘Create New Test’ on your homepage.
2.	Fill the details of new test – 
Key – Enter any text/word/number combination in the key field. Students will have to enter the same key to begin the test.
3.	After submitting the form, you’ll be redirected back o the homepage, where the new test you have created should be listed.
4.	Now to insert questions for the test, click on ‘Question Bank’ in the ‘Action’. You’ll be redirected to question bank page for that test.
5.	Click on ‘Add new Question’ and fill the ques-ans form.
While filling this form make sure you enter the right answer in the ‘Option 1 (Right Answer)’ field only. 
6.	By clicking on ‘Save only’ you will be redirected back to the question bank page while clicking on ‘Save and add new’ will redirect to you back to the ques-ans form page.
7.	This way, create your question bank for the test. Make sure you have atleast total questions in the Question bank equal to the value you have inserted in ‘Number of Questions to be attempted’ field of ‘Create new test form’. There is no upper limit for the number of questions in the question bank.
Say you have 
‘Number of Questions to be attempted’ = 20
And total number of questions in the question bank = 30

Then for each student, randomly 20 ques. will be fetched from the question bank. Both the order of the questions as well as options will be random.
8.	By this point, the test has been created. But it will not show on the ‘Test Panel’ page, as the status of the test is deactivated.

##Conducting a Test
1.	Change the status of the test to activated, by clicking on the ‘Activate’ option in the ‘Actions’ menu on your homepage for the test to be conducted. 
2.	Ask students to go to Test Panel link: http://ec2-52-209-170-83.eu-west-1.compute.amazonaws.com/skitclasstests/admin/ and click on the appropriate test link. 
3.	Students will have to enter their name, roll number and the key (that you have entered in the ‘Create New Test’ form) to begin the test.
4.	When the time is over, asks students to submit the test.
5.	After this again change the status of test to deactivated, by clicking on the ‘Deactivate’ option in the ‘Actions’ menu on your homepage for the test to be conducted.
Once you have deactivated the test, no student can submit the test. The test link will also not appear on the Test Panel page.

##Getting the scores
1.	On the homepage of Admin Panel, click on ‘Marks’ in the ‘Action’ menu of the respective test.
2.	Click on ‘Download Excel Sheet’ to download the excel sheet of the test marks of all students. 

# For developers

## Configuring
1. Import skitclasstests.sql file in your database and in application/config/database.php enter database connectivity details.
2. In application/config/constants.php change base_url to constant to abosulute path address.
3. By default there is 1 marks for right answer and .25 negative marks for wrong answer. To change this, goto application/controllers/Home.php line no. 118.
4. By default there is only one teacher user with username - demouser@skit.com and password - password. To have more users enter values in your database table - 'teachers'. Password are saved as md5 hashed value.


Write to rajatgl17@gmail.com for any query or support.
