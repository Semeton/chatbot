<?php
// connecting to database
$db = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($db, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE messages LIKE '%$getMesg%'";
$run_query = mysqli_query($db, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0)
{
    //fetching response from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing response to a varible which we'll send to ajax
    $response = $fetch_data['replies'];
    echo $response;
}
else
{
    echo "Sorry can't be able to understand you!";
}

?>