<?= $page_content; ?>
<select name="courses" id="">
    <?
    foreach ($list_of_courses as $course_name) : ?>
        <option value=""><?= $course_name ?></option>
    <?
    endforeach;
    ?>
</select>