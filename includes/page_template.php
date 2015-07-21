<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 20/07/15
 * Time: 11:42 AM
 */
?>
<?php
if (!isset($new_page)) {
    $new_page = false;
}

?>
<p>
    Info Title :
    <input type="text" name="title" value="<?php echo $table2['menu'] ?>" required><br>
</p>

<p>
    Position:<select name="position" required>
        <?php

        if(!$new_page){
            $page_set=get_page($table2['information_id']);
            $page_count=mysql_num_rows($page_set);
        }
        else{
            $page_set=get_page($table2['information_id']);
            $page_count=mysql_num_rows($page_set)+1;
        }
        for($count=1;$count <= $page_count;$count++){
            echo "<option value=\"$count \"";
            if($count==$table2['position']){
                echo "selected";
            }
            echo "></option>";


        }
        ?>


    </select>
</p>

<P>
    Visible:

    <input type="radio" name="visible" value="0"

        <?php if ($table2['visible'] == 0) {
            echo "checked";
        } ?>
           required>No
    <input type="radio" name="visible" value="1"


        <?php if ($table2['visible'] == 1) {
            echo "checked";
        } ?>


           required>Yes
</P>
<input type="hidden" name="info" value="<?php echo $table2[0] ?>">
<P>
    Content: <br>
    <textarea name="content" rows="20" cols="30"><?php echo $table2['content'] ?></textarea>

</P>