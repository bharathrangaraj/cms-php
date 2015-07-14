<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 14/07/15
 * Time: 2:16 PM
 */
require_once("includes/functions.php");
include("includes/header.php");
?>



<!-- main content -->
<div id="content">

    <!-- table here-->
    <div id="table">

        <table id="table">

            <tr>

                <td id="nav">
                    &nbsp;
                </td>
                <td id="page">
                    <h3>Faculty area</h3>
                    <p>Welcome to the staff area</p>
                    <ul>
                        <li><a href="content.php">Manage site</a></li>
                        <li><a href="new_faculty.php">Add new faculty user</a></li>
                        <li><a href="logout.php">logout</a></li>


                    </ul>
                </td>

            </tr>

        </table>

    </div>
    </div>

<?php
include("includes/footer.php");
?>